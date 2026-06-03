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

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Services\OfficelesSsoService;

class UserLicensePlansController extends Controller
{
    protected OfficelesSsoService $officelesSsoService;

    public function __construct(OfficelesSsoService $officelesSsoService)
    {
        $this->officelesSsoService = $officelesSsoService;
    }

    public function index(Request $request)
    {
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

        // // Extra discount
        // $additional_disc_year = (float) config(
        //     'constants.EXTRA_DISC_YEAR'
        // );

        // $additional_disc_month = (float) config(
        //     'constants.EXTRA_DISC_MONTH'
        // );

        $additional_disc_year = UsersLicensePlan::where('yearly_extra_disc', '>', 0)
            ->where('is_single_user', '!=', 1)
            ->where('pof_plan_status', 1)
            ->max('yearly_extra_disc') ?? 0;

        $additional_disc_month = UsersLicensePlan::where('monthly_extra_disc', '>', 0)
            ->where('is_single_user', '!=', 1)
            ->where('pof_plan_status', 1)
            ->max('monthly_extra_disc') ?? 0;

        $additional_disc_year_single = UsersLicensePlan::where('yearly_discount', '>', 0)
            ->where('is_single_user', 1)
            ->where('pof_plan_status', 1)
            ->max('yearly_discount') ?? 0;

        $additional_disc_month_single = UsersLicensePlan::where('monthly_discount', '>', 0)
            ->where('is_single_user', 1)
            ->where('pof_plan_status', 1)
            ->max('monthly_discount') ?? 0;

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
            'currency' => $currencyData->currency_code
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
        $planLists = UsersLicensePlan::where('pof_plan_status', 1)->get();

        return view('marketplace.payment', compact('planLists'));
    }

    //get plan data
    public function getPlanList(Request $request)
    {
        try {

            $planLists = UsersLicensePlan::where('pof_plan_status', 1)->get();
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

        if ($request->amount < $promocode->min_amount) {
            return response()->json(['status' => false, 'message' => 'Minimum amount not met']);
        }

        if ($promocode->usage_limit && $promocode->used_count >= $promocode->usage_limit) {
            return response()->json(['status' => false, 'message' => 'Usage limit reached']);
        }

        $discount = 0;

        if ($promocode->discount_type == 'percent') {
            $discount = ($request->amount * $promocode->discount_value) / 100;

            if ($promocode->max_discount) {
                $discount = min($discount, $promocode->max_discount);
            }
        } else {
            $discount = $promocode->discount_value;
        }

        return response()->json([
            'status' => true,
            'discount' => round($discount, 2),
            'promocode_id' => $promocode->id,
            'type' => $promocode->discount_type,
            'value' => $promocode->discount_value
        ]);
    }

    //save payment-------------------------------------------    
    public function saveUserPayment(Request $request)
    {
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

            UsersLicensePayment::create($paymentData);

            $this->updatePromocodeUsage($promocodeId);

            $pdfPath = $this->generateInvoice($request, $userId, $paymentData['total_amount']);

            $this->sendAdminMail($request, $pdfPath);
            $this->sendUserMail($request, $pdfPath);

            DB::commit();

            $ssoSync = [];

            if (!empty($clientData['client_head_user_id']) && !empty($clientData['client_head_created'])) {
                $clientUser = User::find($clientData['client_head_user_id']);
                if ($clientUser) {
                    $ssoSync['client'] = $this->officelesSsoService->syncUser(
                        $clientUser,
                        'Password@123',
                        3,
                        'user-license.saveUserPayment.client'
                    );
                }
            }

            $createdUser = User::find($userId);
            if ($createdUser) {
                $createdType = strtolower((string) $createdUser->usertype);
                $syncKey = in_array($createdType, ['company', 'client'], true) ? $createdType : 'user';
                $ssoSync[$syncKey] = $this->officelesSsoService->syncUser(
                    $createdUser,
                    'Password@123',
                    3,
                    'user-license.saveUserPayment.' . $syncKey
                );
            }

            return response()->json([
                'status' => true,
                'message' => 'Payment saved successfully',
                'sso_sync' => $ssoSync,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
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
            ->where('name', $name)
            ->where('email', $email)
            ->first();

        // CLIENT NOT FOUND
        if (!$client) {

            // CREATE CLIENT
            $clientId = DB::table('clients')->insertGetId([
                'name' => $name,
                'email' => $email,
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

            $clientHeadCreated = true;
        } else {

            // USE EXISTING USER
            $clientHeadUserId = $clientUser->id;
            $clientHeadCreated = false;
        }

        return [
            'client_id' => $clientId,
            'client_head_user_id' => $clientHeadUserId,
            'client_head_created' => $clientHeadCreated,
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
            'industry' => $request->industry_type,
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

        return DB::table('users')->insertGetId([
            'name' => $request->contactPerson,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make('Password@123'),

            'client_id' => $clientId,
            'company_id' => $companyId,

            'usertype' => $request->plan_type == 'team' ? 'company' : 'special_user',

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

            'card_number' =>
            Crypt::encryptString($request->card_number),

            'card_expiry_date' => $request->card_expiry,

            'card_cvv' =>
            Crypt::encryptString($request->card_cvv),

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
        $currencyCode = $request->currencyid ?? ($plan->currency ?? '');
        $currency = (object) [
            'id' => null,
            'currency_symbol' => $plan->currency ?? ($currencyCode ?? ''),
        ];

        //discount data
        $isYearly = ($request->subscription_type === 'year');

        $discount = $isYearly
            ? ($plan->yearly_discount ?? 0)
            : ($plan->monthly_discount ?? 0);

        $extraDiscount = $isYearly
            ? ($plan->yearly_extra_disc ?? 0)
            : ($plan->monthly_extra_disc ?? 0);


        //subscription type 
        $subscriptionType = $request->subscription_type;

        //EXPIRY
        $expiryDate =
            $subscriptionType == 'year'
            ? Carbon::now()->addYear()
            : Carbon::now()->addMonth();

        return [
            'user_id' => $userId,
            'plan_id' => $request->plan_id,
            'order_id' => UsersLicensePayment::generateOrderId(),
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,
            'total_pool_storage' => $request->storage . ' ' . $request->storage_unit,
            'plan_subscription' => $subscriptionType,
            'plan_expiry_date' => $expiryDate,
            'payment_date' => now(),
            'payment_mode' => 'card',
            'status' => 1,
            'used_license' => 0,
            'remaining_license' => $request->license,
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

    private function generateInvoice($request, $userId, $finalAmount)
    {
        $user = DB::table('users')
            ->where('id', $userId)
            ->first();

        // PLAN
        $plan = DB::table('users_license_plans')
            ->where('id', $request->plan_id)
            ->first();

        // CURRENCY
        $currencyCode = $request->currencyid ?? ($plan->currency ?? '');
        $currency = (object) [
            'currency_symbol' => $plan->currency ?? ($currencyCode ?? ''),
        ];

        // COMPANY DETAILS
        $company = null;

        if ($request->plan_type == 'team' && $user->company_id) {
            $company = DB::table('companies')
                ->where('id', $user->company_id)
                ->first();
        }

        // DISCOUNT
        $isYearly = ($request->subscription_type === 'year');

        $discount = $isYearly
            ? ($plan->yearly_discount ?? 0)
            : ($plan->monthly_discount ?? 0);

        $price = (float)$request->price;
        $qty = (int)$request->quantity;

        $subtotal = $price * $qty;

        $discountAmount = ($subtotal * $discount) / 100;

        $pdf = Pdf::loadView('marketplace.invoices', [

            'user' => $user,

            // PLAN
            'plan_name' => $request->plan_name,
            'subscription_type' => $request->subscription_type,
            'license' => $request->license,
            'storage' => $request->storage,
            'unit' => $request->storage_unit,

            // PRICE
            'price' => number_format($price, 2),
            'qty' => $qty,
            'subtotal' => number_format($subtotal, 2),
            'discount' => $discount,
            'discountAmount' => number_format($discountAmount, 2),
            'finalAmount' => number_format($finalAmount, 2),
            'total_amount' => number_format($finalAmount, 2),

            // CURRENCY
            'currency' => $currency->currency_symbol ?? '',

            // PROMO
            'promocode' => $request->promocode_id ?? 'N/A',

            // COMPANY
            'plan_type' => $request->plan_type,
            'company' => $company,

            // PAYMENT
            'payment_mode' => 'Card',
            'payment_status' => 'Paid',
            'payment_date' => now()->format('d M Y'),

            // INVOICE META
            'invoice_no' => 'INV-' . date('Y') . '-' . rand(1000, 9999),
            'invoice_date' => now()->format('d M Y'),
            'billing_period' => ucfirst($request->subscription_type),

        ])->setPaper('a4', 'portrait')
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
            function ($message) use ($request, $pdfPath) {

                //officelescloud@gmail.com
                $message->to('officelescloud@gmail.com')
                    ->replyTo($request->email)
                    ->subject('Purchase Details');

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
                    ->subject('We received your enquiry');

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
}
