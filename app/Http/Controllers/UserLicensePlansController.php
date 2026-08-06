<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\CurrencyRate;
use App\Models\UsersLicensePayment;
use App\Models\UsersLicensePlan;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CardEncryption;

class UserLicensePlansController extends Controller
{
    private const CURRENCY_DETECTION_VERSION = 2;

    public function index(Request $request)
    {
        // Auto-detect on the first visit and once after detection logic changes.
        // A currency explicitly selected by the visitor always wins.
        $shouldDetectCurrency = !session('market_currency_manually_selected', false)
            && (
                !session()->has('market_ul_country_id')
                || session('market_currency_detection_version') !== self::CURRENCY_DETECTION_VERSION
            );

        if ($shouldDetectCurrency) {

            $currencyRow = $this->detectMarketPlaceCurrencyFromNetwork();

            if (!$currencyRow) {
                $currencyRow = DB::table('currency_rates')
                    ->where('is_base_currency', 1)
                    ->first();
            }

            $this->storeMarketPlaceCurrencySession($currencyRow);
        }
        // Currency list
        $currencies = CurrencyRate::orderBy(
            'country_name'
        )->get();

        // Get base currency dynamically
        $baseCurrency = CurrencyRate::where(
            'is_base_currency',
            1
        )->first();

        // Selected currency
        $selectedCurrency = session(
            'currency',
            $baseCurrency->currency_code ?? 'USD'
        );

        // Selected currency data
        $currencyData = CurrencyRate::where(
            'currency_code',
            $selectedCurrency
        )->first();

        // Amount & symbol
        $actualAmount = round(
            $currencyData->actual_amount ?? 0
        );

        $currencySymbol = $currencyData->currency_symbol ?? '$';

        // Bind data
        $userLicenseData = [
            'getPlanList' => $this->getPlanList($request),
        ];


        $additional_disc_year = UsersLicensePlan::where('yearly_extra_disc', '>', 0)
            ->where('is_single_user', '!=', 1)
            ->where('is_team_extraY_discount_apply', 1)
            ->where('pof_plan_status', 1)
            ->max('yearly_extra_disc') ?? 0;

        $additional_disc_month = UsersLicensePlan::where('monthly_extra_disc', '>', 0)
            // ->where('is_single_user', '!=', 1)
            ->where('is_team_extraM_discount_apply', 1)
            ->where('pof_plan_status', 1)
            ->max('monthly_extra_disc') ?? 0;

        $additional_disc_year_single = UsersLicensePlan::where('single_user_yearly_discount', '>', 0)
            ->where('is_single_user', 1)
            ->where('pof_plan_status', 1)
            ->max('single_user_yearly_discount') ?? 0;

        $additional_disc_month_single = UsersLicensePlan::where('single_user_monthly_discount', '>', 0)
            ->where('is_single_user', 1)
            ->where('pof_plan_status', 1)
            ->max('single_user_monthly_discount') ?? 0;

        return view(
            'marketplace.pricing',
            compact(
                'userLicenseData',
                'currencies',
                'selectedCurrency',
                'actualAmount',
                'currencySymbol',
                'additional_disc_year',
                'additional_disc_month',
                'additional_disc_year_single',
                'additional_disc_month_single',
            )
        );
    }

    //session data for country and currency 
    private function storeMarketPlaceCurrencySession($currencyRow): void
    {
        if (!$currencyRow) {
            return;
        }

        session([
            'currency' => $currencyRow->currency_code ?? config('constants.CURRENCY', 'USD'),
            'market_ul_country_id' => $currencyRow->id ?? null,
            'market_currency' => $currencyRow->currency_symbol ?? $currencyRow->currency_code ?? config('constants.CURRENCY', 'USD'),
            'market_currency_detection_version' => self::CURRENCY_DETECTION_VERSION,
        ]);
    }

    //location based country and currency selection
    private function detectMarketPlaceCurrencyFromNetwork(): ?object
    {
        $ip = (string) request()->ip();

        if ($ip === '' || in_array($ip, ['127.0.0.1', '::1'], true)) {
            $ip = Cache::remember('marketplace:public-ip', now()->addHours(6), function () {
                try {
                    $response = Http::connectTimeout(2)
                        ->timeout(3)
                        ->acceptJson()
                        ->get('https://api.ipify.org', ['format' => 'json']);

                    $publicIp = (string) $response->json('ip', '');

                    return filter_var(
                        $publicIp,
                        FILTER_VALIDATE_IP,
                        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                    ) ? $publicIp : null;
                } catch (\Throwable $e) {
                    Log::warning('Unable to resolve the public IP for local currency detection.', [
                        'error' => $e->getMessage(),
                    ]);

                    return null;
                }
            });

            if (!$ip) {
                return null;
            }
        }

        $cacheKey = 'marketplace:network-currency:' . md5($ip);

        return Cache::remember($cacheKey, now()->addHours(6), function () use ($ip) {
            try {
                $location = Location::get($ip);
                if (!$location) {
                    return null;
                }

                $countryName = trim((string) ($location->countryName ?? $location->country_name ?? ''));
                $currencyCode = strtoupper(trim((string) ($location->currencyCode ?? $location->currency_code ?? '')));

                if ($currencyCode !== '') {
                    $currency = DB::table('currency_rates')
                        ->whereRaw('UPPER(currency_code) = ?', [$currencyCode])
                        ->first();

                    if ($currency) {
                        return $currency;
                    }
                }

                if ($countryName === '') {
                    return null;
                }

                $currency = DB::table('currency_rates')
                    ->whereRaw('LOWER(country_name) = ?', [strtolower($countryName)])
                    ->first();

                if ($currency) {
                    return $currency;
                }

                return DB::table('currency_rates')
                    ->where('country_name', 'LIKE', '%' . $countryName . '%')
                    ->first();
            } catch (\Throwable $e) {
                Log::warning('Marketplace currency auto-detection failed.', [
                    'ip_hash' => hash('sha256', $ip),
                    'error' => $e->getMessage(),
                ]);

                return null;
            }
        });
    }


    //on change currency 
    public function changeCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required|string'
        ]);

        $currencyData = CurrencyRate::where(
            'currency_code',
            $request->currency
        )->first();

        if (!$currencyData) {
            return response()->json([
                'status' => 'error',
                'message' => 'Currency not found'
            ], 404);
        }

        // save in session
        session([
            'currency' => $currencyData->currency_code,
            'market_ul_country_id' => $currencyData->id,
            'market_currency' => $currencyData->currency_symbol ?? $currencyData->currency_code,
            'market_currency_manually_selected' => true,
            'market_currency_detection_version' => self::CURRENCY_DETECTION_VERSION,
        ]);

        return response()->json([
            'status' => 'success',
            'currency' => $currencyData->currency_code,
            'symbol' => $currencyData->currency_symbol,
            'amount' => round($currencyData->actual_amount)
        ]);
    }

    //call payment page
    public function payment(Request $request)
    {
        $selectedPlanType = $request->plan_type;
        $billing_type = $request->billing_type;

        $currencyData = CurrencyRate::where('currency_code', $request->currency_code)->first();

        if (!$currencyData) {
            abort(400, "Invalid currency selected");
        }

        $rate = round($currencyData->actual_amount);

        // =========================
        // GET PLANS BY TYPE
        // =========================
        $planLists = UsersLicensePlan::where('pof_plan_status', 1)
            ->when($selectedPlanType === 'single', function ($query) {
                $query->where('is_single_user', 1);
            })
            ->when($selectedPlanType === 'team', function ($query) {
                $query->where('is_team_allowed', 1);
            })
            ->get();

        // =========================
        // SINGLE USER PRICING
        // =========================
        if ($selectedPlanType === 'single') {

            foreach ($planLists as $plan) {

                $base = $rate * ($plan->plans_license ?? 1);

                $monthly = $base;
                $yearly  = $base * 12;

                $plan->original_monthly_price = $monthly;
                $plan->original_yearly_price  = $yearly;

$monthlyTotalDisc = ($plan->single_user_monthly_discount ?? 0)
                    + ($plan->single_user_monthly_extra_disc ?? 0);

                $yearlyTotalDisc = ($plan->single_user_yearly_discount ?? 0)
                    + ($plan->single_user_yearly_extra_disc ?? 0);

                $plan->final_monthly_price =
                    $monthly
                    * (1 - $monthlyTotalDisc / 100);

                $plan->final_yearly_price =
                    $yearly
                    * (1 - $yearlyTotalDisc / 100);

                $plan->active_price = ($billing_type === 'yearly')
                    ? round($plan->final_yearly_price)
                    : round($plan->final_monthly_price);

                $plan->currency_symbol = $currencyData->currency_symbol ?? '$';
            }
        }

        // =========================
        // TEAM PRICING

        // =========================
        // TEAM PRICING
        // =========================
        if ($selectedPlanType === 'team') {

            foreach ($planLists as $plan) {

                $base = $rate * ($plan->plans_license ?? 1);

                $monthly = $base;
                $yearly  = $base * 12;

                $plan->original_monthly_price = $monthly;
                $plan->original_yearly_price  = $yearly;

                // =========================
                // APPLY TEAM DISCOUNT FLAGS
                // =========================

                $monthlyDiscount = ($plan->is_team_discount_apply == 1)
                    ? ($plan->monthly_discount ?? 0)
                    : 0;

                $yearlyDiscount = ($plan->is_team_discount_apply == 1)
                    ? ($plan->yearly_discount ?? 0)
                    : 0;

                $monthlyExtraDiscount = ($plan->is_team_extraM_discount_apply == 1)
                    ? ($plan->monthly_extra_disc ?? 0)
                    : 0;

                $yearlyExtraDiscount = ($plan->is_team_extraY_discount_apply == 1)
                    ? ($plan->yearly_extra_disc ?? 0)
                    : 0;

                // =========================
                // SEND CORRECT VALUES TO BLADE
                // =========================

                $plan->monthly_discount = $monthlyDiscount;
                $plan->yearly_discount = $yearlyDiscount;

                $plan->monthly_extra_disc = $monthlyExtraDiscount;
                $plan->yearly_extra_disc = $yearlyExtraDiscount;

// =========================
                // CALCULATE FINAL PRICES (ADDITIVE)
                // =========================

                $monthlyTotalDisc = $monthlyDiscount + $monthlyExtraDiscount;
                $yearlyTotalDisc = $yearlyDiscount + $yearlyExtraDiscount;

                $plan->final_monthly_price =
                    $monthly
                    * (1 - $monthlyTotalDisc / 100);

                $plan->final_yearly_price =
                    $yearly
                    * (1 - $yearlyTotalDisc / 100);

                // =========================
                // ACTIVE PRICE
                // =========================

                $plan->active_price = ($billing_type === 'yearly')
                    ? round($plan->final_yearly_price)
                    : round($plan->final_monthly_price);

                $plan->currency_symbol = $currencyData->currency_symbol ?? '$';

                // =========================
                // ORIGINAL PRICE
                // =========================

                $plan->original_monthly_price = $monthly;
                $plan->original_yearly_price = $yearly;
            }
        }


        // if ($selectedPlanType === 'team') {

        //     foreach ($planLists as $plan) {

        //         $base = $rate * ($plan->plans_license ?? 1);

        //         $monthly = $base;
        //         $yearly  = $base * 12;

        //         // Monthly discounts
        //         $monthlyDiscount = ($plan->is_team_discount_apply == 1)
        //             ? ($plan->monthly_discount ?? 0)
        //             : 0;

        //         $monthlyExtraDiscount = ($plan->is_team_extraM_discount_apply == 1)
        //             ? ($plan->monthly_extra_disc ?? 0)
        //             : 0;

        //         // Yearly discounts
        //         $yearlyDiscount = ($plan->is_team_discount_apply == 1)
        //             ? ($plan->yearly_discount ?? 0)
        //             : 0;

        //         $yearlyExtraDiscount = ($plan->is_team_extraY_discount_apply == 1)
        //             ? ($plan->yearly_extra_disc ?? 0)
        //             : 0;

        //         // Apply monthly price
        //         $plan->final_monthly_price =
        //             $monthly
        //             * (1 - $monthlyDiscount / 100)
        //             * (1 - $monthlyExtraDiscount / 100);

        //         // Apply yearly price
        //         $plan->final_yearly_price =
        //             $yearly
        //             * (1 - $yearlyDiscount / 100)
        //             * (1 - $yearlyExtraDiscount / 100);

        //         $plan->active_price = ($billing_type === 'yearly')
        //             ? round($plan->final_yearly_price)
        //             : round($plan->final_monthly_price);

        //         $plan->currency_symbol = $currencyData->currency_symbol ?? '$';
        //     }
        // }

        return view('marketplace.payment', compact('planLists', 'selectedPlanType', 'billing_type'));
    }


    //get plan data
    public function getPlanList(Request $request)
    {
        try {

            $planLists = UsersLicensePlan::where('pof_plan_status', 1)->where('is_team_allowed', 1)->get();
            $planListsSingle = UsersLicensePlan::where('pof_plan_status', 1)->where('is_single_user', 1)->get();


            return [
                'planLists'      => $planLists,
                'planListsSingle'      => $planListsSingle,
            ];
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Something went wrong! Please contact support.'
            ], 500);
        }
    }

    //apply promocode
    public function applyPromocode(Request $request)
    {
        $promocode = DB::table('promocodes')
            ->where('code', $request->code)
            ->where('status', 1)
            ->first();

        if (!$promocode) {
            return response()->json(['status' => false, 'message' => 'Invalid promocode']);
        }

        if ($promocode->expiry_date && now()->gt($promocode->expiry_date)) {
            return response()->json(['status' => false, 'message' => 'Promocode expired']);
        }

        if ((float) $request->amount < (float) $promocode->min_amount) {
            return response()->json(['status' => false, 'message' => 'Minimum amount not met']);
        }

        if ($promocode->usage_limit && $promocode->used_count >= $promocode->usage_limit) {
            return response()->json(['status' => false, 'message' => 'Usage limit reached']);
        }

        $amount = (float) $request->amount;
        $discount = 0;

        if ($promocode->discount_type == 'percent') {
            $discount = ($amount * (float) $promocode->discount_value) / 100;

            if ($promocode->max_discount && $discount > $promocode->max_discount) {
                $discount = (float) $promocode->max_discount;
            }
        } else {
            $discount = (float) $promocode->discount_value;
        }

        if ($discount > $amount) {
            $discount = $amount;
        }


        return response()->json([
            'status' => true,
            'discount' => round($discount, 2),
            'discount_type' => $promocode->discount_type,
            'discount_value' => $promocode->discount_value,
            'promodiscount' => $promocode->discount_value,
            'promocode_id' => $promocode->id,
            'type' => $promocode->discount_type,
            'value' => $promocode->discount_value
        ]);
    }

    //save payment-------------------------------------------    
    public function saveUserPayment(Request $request)
    {
        $paymentLockKey = $this->getPaymentLockKey($request);

        if (!Cache::add($paymentLockKey, 'processing', now()->addMinutes(2))) {
            return response()->json([
                'status' => false,
                'message' => 'Payment is already being processed. Please wait a moment and do not click twice.',
            ], 429);
        }

        DB::beginTransaction();

        try {

            $clientData = $this->createClients($request);

            $companyId = $this->createCompany($request, $clientData['client_id'] ?? null);

            $userId = $this->createUser(
                $request,
                $companyId,
                $clientData['client_id'] ?? null
            );

            // update company head
            $this->updateCompanyHead($companyId, $userId);

            // update client head (IMPORTANT FIX)
            if (!empty($clientData['client_id']) && !empty($clientData['client_head_user_id'])) {
                DB::table('clients')
                    ->where('id', $clientData['client_id'])
                    ->update([
                        'client_head' => $clientData['client_head_user_id']
                    ]);
            }

            $this->saveCardDetails($request, $userId);

            $promocodeId = $this->getPromocodeId($request);

            $paymentData = $this->preparePaymentData($request, $userId, $promocodeId);

            $payment = UsersLicensePayment::create($paymentData);

            DB::table('users_license_assign')->insert([
                'payment_id' => $payment->id,
                'order_id'   => $payment->order_id,
                'user_id'    => $userId,
                'created_by' => $userId,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->updatePromocodeUsage($promocodeId);

            if (
                !in_array(request()->getHost(), ['localhost', '127.0.0.1'])
            ) {
                // $pdfPath = $this->generateInvoice($request, $userId, $paymentData['total_amount']);
                $pdfPath = $this->generateInvoice($payment->id);
                $this->sendAdminMail($request, $pdfPath);
                $this->sendUserMail($request, $pdfPath);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Payment saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Cache::forget($paymentLockKey);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function getPaymentLockKey(Request $request): string
    {
        $dedupePayload = [
            'email' => strtolower(trim((string) $request->input('email'))),
            'username' => strtolower(trim((string) $request->input('username'))),
            'plan_id' => (string) $request->input('plan_id'),
            'plan_type' => (string) $request->input('plan_type'),
            'quantity' => (string) $request->input('quantity', 1),
            'total_amount' => (string) $request->input('total_amount'),
            'subscription_type' => (string) $request->input('subscription_type'),
            'currencyid' => (string) $request->input('currencyid'),
        ];

        return 'payment-submit:' . hash('sha256', json_encode($dedupePayload));
    }

    private function createClients($request)
    {
        if ($request->plan_type != 'team') {
            return null;
        }

        $name = 'Aib Client';
        $username = 'AibClient';
        $email = 'officelescloud@gmail.com';

        //STEP 1 : CHECK CLIENT

        $client = DB::table('clients')
            ->where('pof_flag', 'for_team')
            ->first();

        // CLIENT NOT FOUND
        if (!$client) {

            // CREATE CLIENT
            $clientId = DB::table('clients')->insertGetId([
                'name' => $name,
                'pof_flag' => 'for_team',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {

            // USE EXISTING CLIENT ID
            $clientId = $client->id;
        }

        //STEP 2 : CHECK CLIENT USER  

        $clientUser = DB::table('users')
            ->where('client_id', $clientId)
            ->where('usertype', 'client')
            ->first();

        // USER NOT FOUND
        if (!$clientUser) {

            // CREATE USER ONLY ONE TIME
            $clientHeadUserId = DB::table('users')->insertGetId([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make('Password@123'),
                'client_id' => $clientId,
                'usertype' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // UPDATE CLIENT HEAD
            DB::table('clients')
                ->where('id', $clientId)
                ->update([
                    'client_head' => $clientHeadUserId
                ]);
        } else {

            // USE EXISTING USER
            $clientHeadUserId = $clientUser->id;
        }

        return [
            'client_id' => $clientId,
            'client_head_user_id' => $clientHeadUserId
        ];
    }

    private function createCompany($request, $clientId = null)
    {
        if ($request->plan_type != 'team') {
            return null;
        }

        return DB::table('companies')->insertGetId([
            'client_id' => $clientId,   // ✅ FIX ADDED
            'name' => $request->company_name,
            'company_type' => $request->company_type,
            'industry' => $request->industry_type,
            'company_address' => $request->address,
            'contact' => $request->company_number,
            'email' => $request->company_email,
            'website' => $request->website,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function createUser($request, $companyId, $clientId = null)
    {
        // CHECK USERNAME EXIST
        $usernameExists = DB::table('users')
            ->where('username', $request->username)
            ->exists();

        if ($usernameExists) {
            throw new \Exception('Username already exists');
            // return response()->json(['status' => false, 'message' => 'Username already exists']);
        }

        $useremailExists = DB::table('users')
            ->where('email', $request->email)
            ->exists();

        if ($useremailExists) {
            throw new \Exception('Email already exists');
        }

        return DB::table('users')->insertGetId([
            'name' => $request->contactPerson,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'designation' => $request->designation,
            'sizeMax' => '10',
            'password' => Hash::make('Password@123'),
            'client_id' => $clientId,
            'company_id' => $companyId,
            'is_support_face' => 1,
            'usertype' => $request->plan_type == 'team' ? 'company' : 'special_user',
            'security_question' => $request->security_question,
            'security_ans' => $request->security_answer,
            'term_condition' => $request->term_condition,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function updateClientHead($clientId, $userId)
    {
        if (!$clientId || !$userId) {
            return;
        }

        DB::table('clients')
            ->where('id', $clientId)
            ->update([
                'client_head' => $userId
            ]);
    }

    private function updateCompanyHead($companyId, $userId)
    {
        if (!$companyId) {
            return;
        }

        DB::table('companies')
            ->where('id', $companyId)
            ->update([
                'company_head' => $userId
            ]);
    }

    private function saveCardDetails($request, $userId)
    {
        DB::table('users_license_card_details')->insert([

            'user_id' => $userId,

            'card_holder_name' => $request->card_name,

            'card_number' => CardEncryption::encrypt($request->card_number),

            'card_expiry_date' => $request->card_expiry,

            'card_cvv' => CardEncryption::encrypt($request->card_cvv),

            'card_pin' => null,
            'card_save' => 1,
            'status' => 1,

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function getPromocodeId($request)
    {
        if (!$request->promocode_id) {
            return null;
        }

        $promocode = DB::table('promocodes')
            ->where('id', $request->promocode_id)
            ->first();

        return $promocode ? $promocode->id : null;
    }

    private function preparePaymentData($request, $userId, $promocodeId)
    {
        //plans data
        $plan = DB::table('users_license_plans')
            ->where('id', $request->plan_id)
            ->first();

        if (!$plan) {
            throw new \Exception("Invalid plan");
        }

        //currency data 
        $currency = DB::table('currency_rates')
            ->where('currency_code', $request->currencyid)
            ->first();

        if (!$currency) {
            throw new \Exception("Invalid currency");
        }

        //discount data
        $isYearly = ($request->subscription_type === 'year');

        if ($request->plan_type === 'single') {

            $discount = $isYearly
                ? ($plan->single_user_yearly_discount ?? 0)
                : ($plan->single_user_monthly_discount ?? 0);

            $extraDiscount = $isYearly
                ? ($plan->single_user_yearly_extra_disc ?? 0)
                : ($plan->single_user_monthly_extra_disc ?? 0);
        } else {

            $discount = $isYearly
                ? ($plan->yearly_discount ?? 0)
                : ($plan->monthly_discount ?? 0);

            $extraDiscount = $isYearly
                ? ($plan->yearly_extra_disc ?? 0)
                : ($plan->monthly_extra_disc ?? 0);
        }

        // $discount = $isYearly
        //     ? ($plan->yearly_discount ?? 0)
        //     : ($plan->monthly_discount ?? 0);

        // $extraDiscount = $isYearly
        //     ? ($plan->yearly_extra_disc ?? 0)
        //     : ($plan->monthly_extra_disc ?? 0);


        //subscription type 
        $subscriptionType = $request->subscription_type;

        //EXPIRY
        $expiryDate =
            $subscriptionType == 'year'
            ? Carbon::now()->addYear()
            : Carbon::now()->addMonth();

        //check used and remaining lisence
        $planLicense = (($request->license) * ($request->quantity));
        if ($request->plan_type == 'team') {
            $usedLisence = 1;
            $remainLisence = $planLicense - $usedLisence;
        } else {
            $usedLisence = 1;
            $remainLisence = ($request->license) - 1;
        }

        return [
            'user_id' => $userId,
            'plan_id' => $request->plan_id,
            'order_id' => UsersLicensePayment::generateOrderId(),
            'promocode_id' => $promocodeId,
            'currency_id' => $currency->id,
            'currency_symbol' => $currency->currency_symbol,
            'quantity' => $request->quantity,
            'base_amount' => $currency->actual_amount,
            'real_amount' => $request->price,
            'total_amount' => $request->total_amount,
            'discount' => $discount,
            'extra_discount' => $extraDiscount,
            'total_pool_storage' => $request->storage . ' ' . $request->storage_unit,
            'plan_subscription' => $subscriptionType,
            'plan_expiry_date' => $expiryDate,
            'payment_date' => now(),
            'payment_mode' => 'card',
            'status' => 1,
            'used_license' => $usedLisence,
            'remaining_license' => $remainLisence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function updatePromocodeUsage($promocodeId)
    {
        if (!$promocodeId) {
            return;
        }

        DB::table('promocodes')
            ->where('id', $promocodeId)
            ->increment('used_count');
    }

    private function generateInvoice($paymentId)
    {
        //Master data        
        $masterData = DB::table('users')
            ->where('usertype', 'master')
            ->first();

        // PAYMENT DETAILS
        $payment = UsersLicensePayment::find($paymentId);

        if (!$payment) {
            throw new \Exception('Payment not found.');
        }

        // USER
        $user = DB::table('users')
            ->where('id', $payment->user_id)
            ->first();

        // PLAN
        $plan = DB::table('users_license_plans')
            ->where('id', $payment->plan_id)
            ->first();

        //order id format
        $orderIdFormat = 'ORDERID#LIC2025';

        // PROMOCODE
        $promocode = null;

        if (!empty($payment->promocode_id)) {
            $promocode = DB::table('promocodes')
                ->where('id', $payment->promocode_id)
                ->first();
        }

        // COMPANY
        $company = null;

        if (!empty($user->company_id)) {
            $company = DB::table('companies')
                ->where('id', $user->company_id)
                ->first();
        }

        // CALCULATIONS
        $price = (float) $payment->total_amount;
        $qty = (int) $payment->quantity;

        $subtotal = $price * $qty;

        $discount = $payment->discount;
        $discountExtra = $payment->extra_discount;

        $currency = $payment->currency_symbol;

        $pdf = Pdf::loadView('marketplace.invoices', [

            //master data
            'masterData' => $masterData,

            'user' => $user,

            // PLAN
            'plan_name' => $plan->plans_name ?? '',
            'subscription_type' => $payment->plan_subscription,
            'license' => $payment->quantity,
            'storage' => $payment->total_pool_storage,
            'unit' => '',

            // PRICE
            'price' => number_format($price, 2),
            'qty' => $qty,
            'subtotal' => number_format($subtotal, 2),
            'discount' => $discount,
            'discountExtra' => $discountExtra,
            'finalAmount' => number_format($payment->total_amount, 2),
            'total_amount' => number_format($payment->total_amount, 2),

            // CURRENCY
            'currency' => $currency,

            // PROMO
            'promocode' => $promocode->code ?? 'N/A',
            'promocodeValue' => $promocode->discount_value ?? 'N/A',
            'promocodeType' => $promocode->discount_type ?? 'N/A',

            // COMPANY
            'plan_type' => $company ? 'team' : 'single',
            'company' => $company,

            // PAYMENT
            'payment_mode' => ucfirst($payment->payment_mode),
            'payment_status' => 'Paid',
            'payment_date' => Carbon::parse($payment->payment_date)->format('d M Y'),

            // INVOICE META
            'invoice_no' => $orderIdFormat . $payment->order_id,
            'invoice_date' => Carbon::parse($payment->payment_date)->format('d M Y'),
            'billing_period' => ucfirst($payment->plan_subscription),

        ])
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'DejaVu Sans',
            ]);

        $fileName = 'invoice_' . time() . '_' . Str::random(6) . '.pdf';

        $filePath = storage_path('app/invoices/' . $fileName);

        $invoiceDir = storage_path('app/invoices');

        if (!file_exists($invoiceDir)) {
            mkdir($invoiceDir, 0775, true);
        }

        $pdf->save($filePath);

        return $filePath;
    }

    private function sendAdminMail($request, $pdfPath)
    {
        $adminEmail = 'officelescloud@gmail.com';
        $companyEmail = null;

        if ($request->plan_type == 'team') {

            $userData = User::where('username', $request->username)->first();

            if ($userData) {
                $companyData = Company::find($userData->company_id);

                if ($companyData) {
                    $companyFinalData = User::find($companyData->company_head);
                    $companyEmail = $companyFinalData?->email;
                }
            }
        }

        $recipients = [$adminEmail];

        if (!empty($companyEmail)) {
            $recipients[] = $companyEmail;
        }

        Mail::send(
            'mail-templates.purchase-email-admin',
            [
                'name' => $request->contactPerson,
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'designation' => $request->designation,
                'password' => 'Password@123',
                'usertype' => $request->plan_type == 'team' ? 'company' : 'special_user',
            ],
            function ($message) use ($request, $pdfPath, $recipients) {

                $message->to($recipients)
                    ->replyTo($request->email)
                    ->subject('Purchase Details');

                if (file_exists($pdfPath)) {
                    $message->attach($pdfPath, [
                        'as' => 'invoice.pdf',
                        'mime' => 'application/pdf',
                    ]);
                }
            }
        );
    }

    private function sendUserMail($request, $pdfPath)
    {
        Mail::send(
            'mail-templates.purchase-email',
            [
                'name' => $request->contactPerson,
                'username' => $request->username,
                'password' => 'Password@123',
            ],
            function ($message) use ($request, $pdfPath) {

                $message->to($request->email)
                    ->subject('Thank you for purchasing our plan');

                // ✅ SAFE ATTACHMENT
                if (file_exists($pdfPath)) {
                    $message->attach($pdfPath, [
                        'as' => 'invoice.pdf',
                        'mime' => 'application/pdf',
                    ]);
                }
            }
        );
    }

    //on change username check for ajax
    public function checkUsername(Request $request)
    {
        $exists = DB::table('users')
            ->where('username', $request->username)
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }

    //on change email check for ajax
    public function checkUserEmail(Request $request)
    {
        $exists = DB::table('users')
            ->where('email', $request->userEmail)
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
}
