<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UsersLicensePayment;
use App\Models\UsersLicenseCardDetail;
use App\Models\UsersLicensePlan;
use Illuminate\Support\Facades\Crypt;
use App\Models\Company;
use App\Models\User;
use App\Models\Client;
use App\Models\Group;
use App\Models\Role;
use App\Helpers\UserLimitHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;


class UserLicenseController extends Controller
{
    public function index(Request $request)
    {
        $userType = 'company';
        //start plan updation code 
        $currency = config('constants.CURRENCY');
        $price_per_user = (float) config('constants.PRICE_PER_USER');
        $additional_disc_year = (float) config('constants.EXTRA_DISC_YEAR');
        $additional_disc_month = (float) config('constants.EXTRA_DISC_MONTH');

        $tracker = DB::table('users_license_plans_tracker')
            ->orderByDesc('id')
            ->first();

        $currentPlans = DB::table('users_license_plans')
            ->where('plans_status', 1)
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'plans_name' => $p->plans_name,
                    'subscription_type' => $p->plans_subscription_type,
                    'plans_license' => $p->plans_license,
                    'plans_users' => $p->plans_users,
                    'discount' => $p->discount,
                    'extra_disc' => $p->extra_disc,
                    'plans_amount' => $p->plans_amount,
                    'currency' => $p->currency,
                    'storage_unit' => $p->storage_unit,
                    'pool_storage' => $p->pool_storage
                ];
            })
            ->toArray();

        $currentPlansJson = json_encode($currentPlans);

        // Check if constants or plans data changed
        $constantsChanged = !$tracker ||
            $tracker->price_per_user != $price_per_user ||
            $tracker->additional_disc_year != $additional_disc_year ||
            $tracker->additional_disc_month != $additional_disc_month ||
            $tracker->currency != $currency;

        $planDataChanged = false;
        if ($tracker && $tracker->plan_data !== null) {
            if ($tracker->plan_data !== $currentPlansJson) {
                $planDataChanged = true;
            }
        } else {
            $planDataChanged = true;
        }

        if ($constantsChanged || $planDataChanged) {
            $monthPlans = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'company')
                ->where('plans_subscription_type', 'month')
                ->get();

            foreach ($monthPlans as $plan) {
                // ---- MONTH CALCULATION ----
                $baseAmount = $price_per_user * (int)$plan->plans_license;
                $discountPercent = $baseAmount - ($baseAmount * ($plan->discount / 100));
                $finalAmount = round($discountPercent - ($discountPercent * ($additional_disc_month / 100)));

                $poolStorageMonthData = $plan->plans_license * $plan->plans_users;
                $poolStorageMonth = $this->formatStorageUL($poolStorageMonthData);

                DB::table('users_license_plans')
                    ->where('id', $plan->id)
                    ->update([
                        'plans_amount' => $finalAmount,
                        'currency' => $currency,
                        'extra_disc' => $additional_disc_month,
                        'pool_storage' => $poolStorageMonth,
                        'updated_at' => now(),
                    ]);
            }

            $yearPlans = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'company')
                ->where('plans_subscription_type', 'year')
                ->get();

            foreach ($yearPlans as $plan) {
                // ---- YEAR CALCULATION ----
                $baseAmountYear = $price_per_user * (int)$plan->plans_license;
                $yearBaseAmount = $baseAmountYear * 12;

                $amountAfterFirstDiscount = $yearBaseAmount - ($yearBaseAmount * ($plan->discount / 100));
                $finalYearAmount = round($amountAfterFirstDiscount - ($amountAfterFirstDiscount * ($additional_disc_year / 100)));

                $poolStorageYearData = $plan->plans_license * $plan->plans_users;
                $poolStorageYear = $this->formatStorageUL($poolStorageYearData);

                DB::table('users_license_plans')->updateOrInsert(
                    [
                        'plans_name' => $plan->plans_name,
                        'extra_disc' => $additional_disc_year,
                        'plans_subscription_type' => 'year',
                    ],
                    [
                        'plans_amount' => $finalYearAmount,
                        'plans_license' => $plan->plans_license,
                        'discount' => $plan->discount,
                        'extra_disc' => $additional_disc_year,
                        'currency' => $currency,
                        'pool_storage' => $poolStorageYear,
                        'plans_status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }



            $updatedPlans = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->get()
                ->map(function ($p) {
                    return [
                        'id' => $p->id,
                        'plans_name' => $p->plans_name,
                        'subscription_type' => $p->plans_subscription_type,
                        'plans_license' => $p->plans_license,
                        'plans_users' => $p->plans_users,
                        'discount' => $p->discount,
                        'extra_disc' => $p->extra_disc,
                        'plans_amount' => $p->plans_amount,
                        'currency' => $p->currency,
                        'storage_unit' => $p->storage_unit,
                        'pool_storage' => $p->pool_storage
                    ];
                })
                ->toArray();

            DB::table('users_license_plans_tracker')->insert([
                'user_id' => Auth::id(),
                'price_per_user' => $price_per_user,
                'currency' => $currency,
                'additional_disc_month' => $additional_disc_month,
                'additional_disc_year' => $additional_disc_year,
                'plan_data' => json_encode($updatedPlans),
                'last_update' => now(),
            ]);
        }
        //end plan updation code 

        $userLicenseData = [
            'userLicenseDetails' => $this->getUserLicenseDetails($request),
            'allAppsDetailsMaster' => $this->getAllAppsDetailsMaster($request),
            'allAppsDetails' => $this->getAllAppsDetails($request),
            'freeAppsDetails' => $this->getFreeAppsDetails($request),
            'inAppsDetails' => $this->getInAppsDetails($request),
            'essAppsDetails' => $this->getEssAppsDetails($request),
        ];

        return view('marketplace.pricing', compact('userLicenseData', 'userType', 'additional_disc_month', 'additional_disc_year'));
    }

    public function getUserLicenseDetails(Request $request)
    {
        try {

            $userObj = User::find(Auth::id());

            $planLists = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'company')
                ->where('plans_subscription_type', 'month')
                ->get();

            $planListsYear = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'company')
                ->where('plans_subscription_type', 'year')
                ->get();

            $monthPlansForSingleUser = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'special_user')
                ->where('plans_subscription_type', 'month')
                ->get();

            $yearPlansForSingleUser = DB::table('users_license_plans')
                ->where('plans_status', 1)
                ->where('for_usertype', 'special_user')
                ->where('plans_subscription_type', 'year')
                ->get();

            // Latest plan → UI message only
            $latestPlan = UsersLicensePayment::where('user_id', Auth::id())
                ->orderByDesc('payment_date')
                ->with('plan')
                ->first();

            // All plans → notifications
            $plans = UsersLicensePayment::where('user_id', Auth::id())
                ->orderByDesc('payment_date')
                ->with('plan')
                ->get();

            $expiringSoonDays = 3;

            $subscriptionMap = [
                'month' => 'Monthly',
                'year'  => 'Annually',
            ];

            //SEND NOTIFICATIONS            
            foreach ($plans as $plan) {

                $planName   = $plan->plan->plans_name ?? 'Your Plan';
                $orderIdFormat = 'ORDERID#LIC2025';
                $orderId   = $orderIdFormat . $plan->order_id;
                $planExpiry = Carbon::parse($plan->plan_expiry_date);

                $daysRemaining = now()
                    ->startOfDay()
                    ->diffInDays($planExpiry->startOfDay(), false);

                $showSubs = $subscriptionMap[$plan->plan_subscription] ?? '';

                //EXPIRED
                if ($daysRemaining < 0) {
                    Notification::send(
                        $userObj,
                        new GeneralNotification(
                            "{$orderId} | {$planName} ({$showSubs}) plan expired",
                            "{$orderId} | {$planName} ({$showSubs}) plan expired on " . $planExpiry->format('d M Y')
                        )
                    );
                }

                //EXPIRING SOON
                elseif ($daysRemaining >= 0 && $daysRemaining <= $expiringSoonDays) {
                    Notification::send(
                        $userObj,
                        new GeneralNotification(
                            "{$orderId} | {$planName} ({$showSubs}) plan expiring soon",
                            "{$orderId} | {$planName} ({$showSubs}) plan will expire in {$daysRemaining} days."
                        )
                    );
                }
            }

            //UI MESSAGE (LATEST PLAN ONLY)
            $expiryMessage = 'Choose the perfect plan to unlock premium features and enhance your experience.';
            $bgColorClass  = 'bg-c-light-green';

            if ($latestPlan) {
                $orderIdFormat = 'ORDERID#LIC2025';
                $orderId   = $orderIdFormat . $latestPlan->order_id;

                $planName   = $latestPlan->plan->plans_name ?? 'Your Plan';
                $planExpiry = Carbon::parse($latestPlan->plan_expiry_date);

                $daysRemaining = now()
                    ->startOfDay()
                    ->diffInDays($planExpiry->startOfDay(), false);

                $showSubs = $subscriptionMap[$latestPlan->plan_subscription] ?? '';

                if ($daysRemaining < 0) {
                    $bgColorClass = 'bg-light-pink';
                    $expiryMessage = "Your current plan <strong>{$planName} ({$showSubs})</strong> with Order ID {$orderId}  expired on <strong>{$planExpiry->format('d M Y')}</strong>.";
                } elseif ($daysRemaining <= $expiringSoonDays) {
                    $bgColorClass = 'bg-light-pink';
                    $expiryMessage = "Your current plan <strong>{$planName} ({$showSubs})</strong> with Order ID {$orderId} will expire in <strong>{$daysRemaining} days</strong>.";
                } else {
                    $expiryMessage = "Your current plan <strong>{$planName} ({$showSubs})</strong> with Order ID {$orderId} is active until <strong>{$planExpiry->format('d M Y')}</strong>.";
                }
            }

            return [
                'planLists'      => $planLists,
                'planListsYear'  => $planListsYear,
                'monthPlansForSingleUser'  => $monthPlansForSingleUser,
                'yearPlansForSingleUser'  => $yearPlansForSingleUser,
                'latestPlan'     => $latestPlan,
                'expiryMessage'  => $expiryMessage,
                'bgColorClass'   => $bgColorClass,
            ];
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Something went wrong! Please contact support.'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $planId = $request->input('plan_id');
        $now = Carbon::now();
        $subscriptionType =  $request->subscription;

        // Get subscription type of selected plan (e.g. month, year)
        // $subscriptionType = DB::table('users_license_plans')
        //     ->where('id', $planId)
        //     ->value('plans_subscription_type');

        $totalUserCounts = DB::table('users_license_plans')
            ->where('id', $planId)
            ->value('plans_license');

        $getSubscriptionType = DB::table('users_license_plans')
            ->where('id', $planId)
            ->value('plans_subscription_type');

        $getStorage = DB::table('users_license_plans')
            ->where('id', $planId)
            ->select('plans_users', 'storage_unit', 'plans_license')
            ->first();
        $storageInGB = $getStorage->plans_users;
        $storageUnit = $getStorage->storage_unit;
        $licenseCount = $getStorage->plans_license;


        $unit = strtoupper($getStorage->storage_unit);
        switch ($unit) {
            case 'TB':
                $storageInGB *= 1024;
                break;
            case 'PB':
                $storageInGB *= 1024 * 1024;
                break;
            case 'EB':
                $storageInGB *= 1024 * 1024 * 1024;
                break;
            case 'GB':
            default:
                // already in GB
                break;
        }
        $totalPoolStorageInGB = ($storageInGB * $request->input('quantity')) * $licenseCount;
        $formattedStorage = $this->formatStorageUL($totalPoolStorageInGB);

        // Step 1: Handle Card Saving
        if ($request->input('card_save') == 1) {
            $this->saveCardIfNotExists($request, $userId);
        }

        // Step 2: Calculate Start Date & Expiry Date for new subscription
        $startDate = $now;

        // Calculate expiry date based on subscription type
        // $expiryDate = $this->calculateExpiryDate($startDate, $subscriptionType);
        $expiryDate = $this->calculateExpiryDate($startDate, $getSubscriptionType);

        // //update storage size for company
        // $checkUser = User::where('id', $userId)->first();
        // if ($checkUser->sizeMax == null || $checkUser->sizeMax == '' || $checkUser->sizeMax == 0) {
        //     $checkUser->sizeMax = $storageInGB;
        //     $checkUser->save();

        //     $remainLicense = (($request->input('quantity') * $totalUserCounts) - 1);
        //     $usedLicense = 1;

        //     DB::table('users_license_assign')->insert([
        //         'payment_id' => $paymentId,          // make sure variable exists
        //         'order_id'   => $orderId,            // make sure variable exists
        //         'user_id'    => $userId,
        //         'created_by' => auth()->id(),         // or $createdBy
        //         'status'     => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // } else {
        //     $remainLicense = $request->input('quantity') * $totalUserCounts;
        //     $usedLicense = null;
        // }


        // Step 3: Create new payment record
        $payment = UsersLicensePayment::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            'order_id' => UsersLicensePayment::generateOrderId(),
            'quantity' => $request->input('quantity'),
            'total_pool_storage' =>  $formattedStorage,
            'plan_expiry_date' => $expiryDate->format('Y-m-d'),
            'total_amount' => $request->input('totalAmount'),
            'payment_date' => $now->format('Y-m-d H:i:s'),
            'plan_subscription' => $getSubscriptionType,
            'payment_mode' => $request->input('payment_mode'),
            'status' => 1,
            'used_license' => null,
            'remaining_license' => null,
        ]);

        $paymentId = $payment->id;
        $orderId   = $payment->order_id;

        $checkUser = User::where('id', $userId)->first();

        if (empty($checkUser->sizeMax)) {

            // update size
            $checkUser->sizeMax = $storageInGB;
            $checkUser->save();

            $remainLicense = (($request->input('quantity') * $totalUserCounts) - 1);
            $usedLicense   = 1;

            // Step 3: Insert into users_license_assign
            DB::table('users_license_assign')->insert([
                'payment_id' => $paymentId,
                'order_id'   => $orderId,
                'user_id'    => $userId,
                'created_by' => auth()->id(),
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {

            $remainLicense = $request->input('quantity') * $totalUserCounts;
            $usedLicense   = null;
        }

        // Step 4: Update license counts in payment table
        $payment->update([
            'used_license'      => $usedLicense,
            'remaining_license' => $remainLicense,
        ]);

        // Step 4: Prepare response message
        // $message = 'Payment stored and plan activated.';
        $message = "Payment successful! <br> Order ID : ORDERID#LIC2025{$payment->order_id}";
        $status = 'success';

        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 200);
    }

    public function getSavedCard()
    {
        $userId = Auth::id();

        $card = UsersLicenseCardDetail::where('user_id', $userId)
            ->where('status', 1)
            ->first();

        if ($card) {
            return response()->json([
                'success' => true,
                'data' => [
                    'card_holder_name' => $card->card_holder_name,
                    'card_number' => Crypt::decryptString($card->card_number),
                    'card_expiry_date' => $card->card_expiry_date,
                    'card_cvv' => Crypt::decryptString($card->card_cvv)
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No saved card found.']);
    }

    //show purchased plan 
    public function getUserLicenseLists(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $authUser = Auth::user();
        $userId = $authUser->id;
        $userType = $authUser->usertype;
        $orderIdFormat = 'ORDERID#LIC2025';

        $clients = collect();   // Default empty
        $companies = collect(); // Default empty

        $query = UsersLicensePayment::with('plan');

        switch ($userType) {
            case 'master':
                $clients = Client::all();
                $companies = Company::with('client')->get();
                break;

            case 'client':
                $clientId = User::where('id', $userId)->value('client_id');
                $userIds = User::where('client_id', $clientId)->pluck('id');
                $query->whereIn('user_id', $userIds);
                $companies = Company::where('client_id', $clientId)->get();
                break;

            case 'company':
                $companyId = User::where('id', $userId)->value('company_id');

                $userIds = User::where('company_id', $companyId)->pluck('id');
                $query->whereIn('user_id', $userIds);
                break;
            case 'group':
            case 'user':
            default:
                return abort(403, 'Access denied');
        }

        // Search filter
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->whereHas('plan', function ($q) use ($search) {
                $q->where('plans_name', 'like', "%$search%");
            });
        }

        // Apply filters only if provided
        if ($request->filled('client_id') && $request->filled('company_id')) {
            // Both client & company selected
            $userIds = User::where('client_id', $request->client_id)
                ->where('company_id', $request->company_id)
                ->pluck('id');
            $query->whereIn('user_id', $userIds);
        } elseif ($request->filled('company_id')) {
            // Only company selected
            $userIds = User::where('company_id', $request->company_id)->pluck('id');
            $query->whereIn('user_id', $userIds);
        } elseif ($request->filled('client_id')) {
            // Only client selected
            $userIds = User::where('client_id', $request->client_id)->pluck('id');
            $query->whereIn('user_id', $userIds);
        }


        $query->orderBy('id', 'desc');
        $data = $query->paginate(10);

        // echo "<pre>"; print_r($data);die;
        if ($request->ajax()) {
            return response()->json($data);
        }

        return view('market-place.userLicenseLists', compact('data', 'clients', 'companies', 'orderIdFormat', 'userType'));
    }

    //used users list drill down
    public function getUsedUserLicenseLists(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $authUser = Auth::user();
        $licenseId = $request->license_id;
        $userType = $authUser->usertype;

        // Get selected plan payment
        $getPlan = UsersLicensePayment::where('id', $licenseId)->where('status', 1)->first();

        if (!$getPlan) {
            return response()->json(['message' => 'Data not found']);
        }

        $getPlanName = UsersLicensePlan::where('id', $getPlan->plan_id)
            ->where('plans_status', 1)
            ->first();

        $planName = $getPlanName->plans_name ?? '';
        $orderIdFormat = 'ORDERID#LIC2025' . $getPlan->order_id;

        // ✅ Fetch only users who have been assigned licenses under this payment_id
        $assignedUsers = DB::table('users_license_assign as ula')
            ->join('users as u', 'u.id', '=', 'ula.user_id')
            ->where('ula.payment_id', $licenseId)
            ->where('ula.status', 1)
            ->select(
                'u.id',
                'u.name',
                'u.usertype',
                'u.email',
                'u.status',
                'ula.created_at as assigned_date'
            )
            ->get()
            ->map(function ($item) use ($orderIdFormat, $planName) {
                return [
                    'id'            => $item->id,
                    'name'          => $item->name,
                    'usertype'      => $item->usertype,
                    'email'         => $item->email,
                    'status'        => $item->status,
                    'order_id'      => $orderIdFormat,
                    'planName'      => $planName,
                    'assigned_date' => date('d-m-Y', strtotime($item->assigned_date)),
                ];
            });

        return response()->json(['users' => $assignedUsers, 'userType' => $userType]);
    }

    //get edit user details
    public function getEditUserLicenseDetails(Request $request)
    {
        $userid = base64_decode($request->id);
        $user = User::findOrFail($userid);

        // Base variables
        $authUser   = Auth::user();
        $client_id  = $authUser->client_id ?? $user->client_id;
        $company_id = $authUser->company_id ?? $user->company_id;
        $group_id   = $authUser->group_id ?? $user->group_id;
        $usertype   = $authUser->usertype ?? $user->usertype;

        // Groups filter by usertype / route
        $groups = Group::when((request()->is('company/users*') || request()->is('client/company/users*')), function ($q) use ($client_id, $company_id) {
            $q->where('client_id', $client_id)->where('company_id', $company_id);
        })
            ->when(request()->is('client/users*'), function ($q) use ($client_id) {
                $q->where('client_id', $client_id)->whereNull('company_id');
            })
            ->when(request()->is('users*'), function ($q) use ($client_id, $company_id, $group_id, $usertype) {
                if (is_null($client_id) && is_null($company_id)) {
                    $q->whereNull('client_id')->whereNull('company_id');
                } else {
                    $q->where('client_id', $client_id)->where('company_id', $company_id);
                }
                if (in_array($usertype, ['group', 'user'])) {
                    $q->where('id', $group_id);
                }
            })
            ->get();

        // Roles filter by usertype / route
        $roles = Role::when((request()->is('company/users*') || request()->is('client/company/users*') || request()->is('users*')), function ($q) use ($client_id, $company_id) {
            $q->where('client_id', $client_id)->where('company_id', $company_id);
        })
            ->when(request()->is('client/users*'), function ($q) use ($client_id) {
                $q->where('client_id', $client_id)->whereNull('company_id');
            })
            ->when(request()->is('users*'), function ($q) use ($client_id, $company_id) {
                if (is_null($client_id) && is_null($company_id)) {
                    $q->whereNull('client_id')->whereNull('company_id');
                } else {
                    $q->where('client_id', $client_id)->where('company_id', $company_id);
                }
            })
            ->get();

        // License plans of the logged-in user
        if ($usertype == "master" || $usertype == "client") {
            $compIdd = User::where('company_id', $user->company_id)->first();

            $planPurchases = DB::table('users_license_plans as pl')
                ->join('users_license_payments as p', 'pl.id', '=', 'p.plan_id')
                ->where('p.user_id', $compIdd->id)
                ->select(
                    'p.id as payment_id',
                    'pl.plans_name',
                    'p.remaining_license',
                    'p.order_id',
                    DB::raw('DATE_FORMAT(p.plan_expiry_date, "%Y-%m-%d") as plan_expiry_date'),
                    DB::raw('(p.quantity * pl.plans_license) as total_licenses')
                )
                ->orderByDesc('p.order_id')
                ->get();
        } elseif ($usertype == "company") {
            $planPurchases = DB::table('users_license_plans as pl')
                ->join('users_license_payments as p', 'pl.id', '=', 'p.plan_id')
                ->where('p.user_id', Auth::id())
                ->select(
                    'p.id as payment_id',
                    'pl.plans_name',
                    'p.remaining_license',
                    'p.order_id',
                    DB::raw('DATE_FORMAT(p.plan_expiry_date, "%Y-%m-%d") as plan_expiry_date'),
                    DB::raw('(p.quantity * pl.plans_license) as total_licenses')
                )
                ->orderByDesc('p.order_id')
                ->get();
        } elseif ($usertype == "group") {
            $getCompId = User::where('company_id', $company_id)->first();
            $planPurchases = DB::table('users_license_plans as pl')
                ->join('users_license_payments as p', 'pl.id', '=', 'p.plan_id')
                ->where('p.user_id', $getCompId->id)
                ->select(
                    'p.id as payment_id',
                    'pl.plans_name',
                    'p.remaining_license',
                    'p.order_id',
                    DB::raw('DATE_FORMAT(p.plan_expiry_date, "%Y-%m-%d") as plan_expiry_date'),
                    DB::raw('(p.quantity * pl.plans_license) as total_licenses')
                )
                ->orderByDesc('p.order_id')
                ->get();
        } elseif ($usertype == "user") {
            $getCompId = User::where('company_id', $company_id)->first();
            $planPurchases = DB::table('users_license_plans as pl')
                ->join('users_license_payments as p', 'pl.id', '=', 'p.plan_id')
                ->where('p.user_id', $getCompId->id)
                ->select(
                    'p.id as payment_id',
                    'pl.plans_name',
                    'p.remaining_license',
                    'p.order_id',
                    'p.plan_expiry_date',
                    DB::raw('(p.quantity * pl.plans_license) as total_licenses')
                )
                ->orderByDesc('p.order_id')
                ->get();
        }

        // $planPurchases = DB::table('users_license_plans as pl')
        //     ->join('users_license_payments as p', 'pl.id', '=', 'p.plan_id')
        //     ->where('p.user_id', Auth::id())
        //     ->select(
        //         'p.id as payment_id',
        //         'pl.plans_name',
        //         'p.order_id',
        //         'p.remaining_license',
        //         DB::raw('DATE_FORMAT(p.plan_expiry_date, "%Y-%m-%d") as plan_expiry_date'),
        //         DB::raw('(p.quantity * pl.plans_license) as total_licenses')
        //     )
        //     ->orderByDesc('p.order_id')
        //     ->get();

        // Active assignment for this user
        $userAssign = DB::table('users_license_assign')
            ->where('user_id', $user->id)
            ->where('status', 1)
            ->orderByDesc('id')
            ->first();

        return response()->json([
            'username'   => $user->username,
            'id'         => $user->id,
            'name'       => $user->name,
            'size'       => $user->sizeMax,
            'email'      => $user->email,
            'role_id'    => $user->role_id,
            'group_id'   => $user->group_id,
            'roles'      => $roles,
            'groups'     => $groups,
            'payment_id' => $userAssign->payment_id ?? null,
            'plans'      => $planPurchases,
        ]);
    }

    //edit user details
    public function editUserLicenseDetails(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'edit_user_license_payId' => 'required|exists:users_license_payments,id',
            'role_id' => 'required|exists:roles,id',
            'group_id' => 'required|exists:groups,id',
            'name' => 'required|string|max:20|regex:/^[a-zA-Z ]+$/',
            'username' => 'required|string|max:20|unique:users,username,' . $user->id . '|regex:/^[a-zA-Z][a-zA-Z0-9]*$/',
            'email' => 'required|email|max:30|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|max:20|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#]).+$/'
        ], [
            'password.regex' => 'Password must contain uppercase, number, special character.',
            'username.regex' => 'Username must start with a letter and contain letters/numbers only.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check user limit before editing and creating user
        $getUserId = $user->id;
        $paymentId = $request->edit_user_license_payId;
        $limitCheck = UserLimitHelper::checkAndEditUserLimit($paymentId, $getUserId);
        if (!$limitCheck['status']) {
            return response()->json(['error' => $limitCheck['error']], 403);
        }

        // Update user
        $user->update([
            'role_id' => $request->role_id,
            'group_id' => $request->group_id,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json(['success' => 'User updated successfully', 'user' => $user]);
    }

    //delete user license
    public function deleteUserLicenseDetails(Request $request)
    {
        $authUser = Auth::user();
        $userId   = $authUser->id;
        $userType = $authUser->usertype;

        $getUserId = base64_decode($request->assignId);

        DB::transaction(function () use ($getUserId) {

            // Step 1: Check license and update counts first
            $limitCheck = UserLimitHelper::checkAndDeleteUserLimit($getUserId);
            if (!$limitCheck['status']) {
                return response()->json(['error' => $limitCheck['error']], 403);
                // throw new \Exception($limitCheck['error']);
            }

            // Step 2: Delete user record
            $user = User::findOrFail($getUserId);
            $user->delete();

            // Step 3: Handle assigned paid apps
            $assignedApps = DB::table('market_place_app_assign')
                ->where('user_id', $getUserId)
                ->get();

            foreach ($assignedApps as $app) {
                // Increment remaining app balance for each app
                DB::table('market_place_app_payments')
                    ->where('id', $app->app_payment_id)
                    ->increment('remain_app_balance', 1);
            }

            // Step 4: Delete assigned paid apps
            DB::table('market_place_app_assign')
                ->where('user_id', $getUserId)
                ->delete();

            // Step 5: Delete assigned free apps (no balance update)
            DB::table('market_place_app_free')
                ->where('user_id', $getUserId)
                ->delete();
        });

        return response()->json(['message' => 'User deleted successfully. Assigned apps and freed apps were also removed.']);
    }

    //get Companies By Client
    public function getCompaniesByClient(Request $request)
    {
        $client_id = $request->input('client_id');
        $companies = Company::where('client_id', $client_id)->get(['id', 'name']);
        return response()->json($companies);
    }


    //getAllAppsDetailsMaster for master
    public function getAllAppsDetailsMaster(Request $request)
    {
        try {
            $currentUserType = Auth::user()->usertype;
            $apps = DB::table('market_place_apps')
                ->where('status', 1)
                // ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
                ->get();

            // $apps = DB::table('market_place_apps')->get();

            $resolvedApps = $apps->map(function ($app) {
                try {
                    $related = DB::table($app->tbl_name)->find($app->tbl_id);
                    $app->related = $related;

                    // Flatten fields from related
                    $app->icon = $related->icon;
                    // $app->categories = $app->categories ?? 'free_app'; 
                } catch (\Exception $e) {
                    $app->related = null;
                    $app->icon = 'default.png';
                }

                // Check if app is installed by user (status = 1)
                // $installed = DB::table('market_place_app_free')
                //     ->where('user_id', Auth::user()->id)
                //     ->where('mp_app_id', $app->id)
                //     ->where('status', 1)
                //     ->exists();

                // $app->installed = $installed;

                return $app;
            });

            return $resolvedApps;
        } catch (\Exception $e) {
            return collect(); // return empty collection if something fails
        }
    }

    //all apps code ----------------------------------------------------
    public function getAllAppsDetails(Request $request)
    {
        try {
            $currentUserType = Auth::user()->usertype;
            $apps = DB::table('market_place_apps')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
                ->get();

            // $apps = DB::table('market_place_apps')->get();

            $resolvedApps = $apps->map(function ($app) {
                try {
                    $related = DB::table($app->tbl_name)->find($app->tbl_id);
                    $app->related = $related;

                    // Flatten fields from related
                    $app->icon = $related->icon;
                    // $app->categories = $app->categories ?? 'free_app'; 
                } catch (\Exception $e) {
                    $app->related = null;
                    $app->icon = 'default.png';
                }

                // Check if app is installed by user (status = 1)
                $installed = DB::table('market_place_app_free')
                    ->where('user_id', Auth::user()->id)
                    ->where('mp_app_id', $app->id)
                    ->where('status', 1)
                    ->exists();

                $app->installed = $installed;

                return $app;
            });

            return $resolvedApps;
        } catch (\Exception $e) {
            return collect(); // return empty collection if something fails
        }
    }

    //free apps code ----------------------------------------------------
    public function getFreeAppsDetails(Request $request)
    {
        try {
            $currentUserType = Auth::user()->usertype;
            $currentUserId = Auth::user()->id;

            $apps = collect();

            // if ($currentUserType == 'group' || $currentUserType == 'user') {

            // 1 Get assigned apps
            $assignedApps = DB::table('market_place_app_assign as mpa')
                ->join('market_place_apps as apps', 'apps.id', '=', 'mpa.app_id')
                ->where('mpa.user_id', $currentUserId)
                // ->where('mpa.status', 1)
                ->select('apps.*', 'mpa.id as assign_id', 'mpa.status as assign_status')
                ->get()
                ->map(function ($app) {
                    // Assigned apps are always installed
                    // $app->installed = true;
                    // $app->button_label = 'Uninstall';
                    $app->installed = ($app->assign_status == 1);
                    $app->button_label = $app->assign_status == 1 ? 'Uninstall' : 'Install';
                    return $app;
                });

            // 2 Get free apps
            $freeApps = DB::table('market_place_apps')
                ->where('categories', 'free_app')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
                ->get()
                ->map(function ($app) use ($currentUserId) {
                    // Check if user installed free app
                    $isInstalled = DB::table('market_place_app_free')
                        ->where('user_id', $currentUserId)
                        ->where('mp_app_id', $app->id)
                        ->where('status', 1)
                        ->exists();

                    $app->installed = $isInstalled;
                    $app->button_label = $isInstalled ? 'Uninstall' : 'Install';

                    return $app;
                });

            // Merge both
            $apps = $assignedApps->merge($freeApps)->unique('id')->values();

            // } 

            // if ($currentUserType == 'group' || $currentUserType == 'user') {

            //     // 1 Get assigned apps
            //     $assignedApps = DB::table('market_place_app_assign as mpa')
            //         ->join('market_place_apps as apps', 'apps.id', '=', 'mpa.app_id')
            //         ->where('mpa.user_id', $currentUserId)
            //         // ->where('mpa.status', 1)
            //         ->select('apps.*', 'mpa.id as assign_id', 'mpa.status as assign_status')
            //         ->get()
            //         ->map(function ($app) {
            //             // Assigned apps are always installed
            //             // $app->installed = true;
            //             // $app->button_label = 'Uninstall';
            //             $app->installed = ($app->assign_status == 1);
            //             $app->button_label = $app->assign_status == 1 ? 'Uninstall' : 'Install';
            //             return $app;
            //         });

            //     // 2 Get free apps
            //     $freeApps = DB::table('market_place_apps')
            //         ->where('categories', 'free_app')
            //         ->where('status', 1)
            //         ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
            //         ->get()
            //         ->map(function ($app) use ($currentUserId) {
            //             // Check if user installed free app
            //             $isInstalled = DB::table('market_place_app_free')
            //                 ->where('user_id', $currentUserId)
            //                 ->where('mp_app_id', $app->id)
            //                 ->where('status', 1)
            //                 ->exists();

            //             $app->installed = $isInstalled;
            //             $app->button_label = $isInstalled ? 'Uninstall' : 'Install';

            //             return $app;
            //         });

            //     // Merge both
            //     $apps = $assignedApps->merge($freeApps)->unique('id')->values();

            // } else {
            //     // Other user types (no change)
            //     $apps = DB::table('market_place_apps')
            //         ->where('categories', 'free_app')
            //         ->where('status', 1)
            //         ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
            //         ->get()
            //         ->map(function ($app) use ($currentUserId) {
            //             $isInstalled = DB::table('market_place_app_free')
            //                 ->where('user_id', $currentUserId)
            //                 ->where('mp_app_id', $app->id)
            //                 ->where('status', 1)
            //                 ->exists();

            //             $app->installed = $isInstalled;
            //             $app->button_label = $isInstalled ? 'Uninstall' : 'Install';

            //             return $app;
            //         });
            // }

            // Optional: resolve icons / related table
            $resolvedApps = $apps->map(function ($app) {
                try {
                    $related = DB::table($app->tbl_name)->find($app->tbl_id);
                    $app->related = $related;
                    $app->icon = $related->icon ?? 'default.png';
                } catch (\Exception $e) {
                    $app->related = null;
                    $app->icon = 'default.png';
                }

                return $app;
            });

            return $resolvedApps;
        } catch (\Exception $e) {
            return collect(); // fallback empty collection
        }
    }

    //inapp apps code ----------------------------------------------------
    public function getInAppsDetails(Request $request)
    {
        try {
            // $apps = DB::table('market_place_apps')->where('categories', 'in_app')->get();

            $currentUserType = Auth::user()->usertype;

            $apps = DB::table('market_place_apps')
                ->where('categories', 'in_app')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
                ->get();

            $resolvedApps = $apps->map(function ($app) {
                try {
                    $related = DB::table($app->tbl_name)->find($app->tbl_id);
                    $app->related = $related;

                    // Flatten fields from related
                    $app->icon = $related->icon;
                    $app->categories = $app->categories ?? 'in_app'; // Optional fallback
                } catch (\Exception $e) {
                    $app->related = null;
                    $app->icon = 'default.png';
                }
                // Check if app is installed by user (status = 1)
                $installed = DB::table('market_place_app_free')
                    ->where('user_id', Auth::user()->id)
                    ->where('mp_app_id', $app->id)
                    ->where('status', 1)
                    ->exists();

                $app->installed = $installed;

                return $app;
            });

            return $resolvedApps;
        } catch (\Exception $e) {
            return collect(); // return empty collection if something fails
        }
    }

    //essential apps code ----------------------------------------------------
    public function getEssAppsDetails(Request $request)
    {
        try {
            // $apps = DB::table('market_place_apps')->where('categories', 'ess_app')->get();
            $currentUserType = Auth::user()->usertype;

            $apps = DB::table('market_place_apps')
                ->where('categories', 'ess_app')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET(?, for_usertype)", [$currentUserType])
                ->get();


            $resolvedApps = $apps->map(function ($app) {
                try {
                    $related = DB::table($app->tbl_name)->find($app->tbl_id);
                    $app->related = $related;

                    // Flatten fields from related
                    $app->icon = $related->icon;
                    $app->categories = $app->categories ?? 'ess_app'; // Optional fallback
                } catch (\Exception $e) {
                    $app->related = null;
                    $app->icon = 'default.png';
                }

                // Check if app is installed by user (status = 1)
                $installed = DB::table('market_place_app_free')
                    ->where('user_id', Auth::user()->id)
                    ->where('mp_app_id', $app->id)
                    ->where('status', 1)
                    ->exists();

                $app->installed = $installed;

                return $app;
            });

            return $resolvedApps;
        } catch (\Exception $e) {
            return collect(); // return empty collection if something fails
        }
    }

    //upload ul plan csv
    public function uploadCsv(Request $request)
    {
        if (!$request->hasFile('csv_file')) {
            return response()->json(['message' => 'No file uploaded'], 400);
        }

        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');

        // Read header
        $header = fgetcsv($handle);
        $expected = [
            'plans_name',
            'plans_amount',
            'plans_subscription_type',
            'plans_content',
            'plans_users',
            'plans_license',
            'plans_status'
        ];

        // Validate CSV header
        if (array_map('strtolower', $header) !== array_map('strtolower', $expected)) {
            return response()->json([
                'message' => 'Invalid CSV format. Expected columns: ' . implode(', ', $expected)
            ], 400);
        }

        $count = 0;
        while (($row = fgetcsv($handle)) !== FALSE) {
            if (count($row) < 7) continue;

            UsersLicensePlan::create([
                'plans_name' => $row[0],
                'plans_amount' => $row[1],
                'plans_subscription_type' => $row[2],
                'plans_content' => $row[3],
                'plans_users' => $row[4],
                'plans_license' => $row[5],
                'plans_status' => $row[6],
            ]);
            $count++;
        }

        fclose($handle);

        return response()->json([
            'message' => "$count plans imported successfully."
        ]);
    }

    //edit user details via manage settings
    public function editLicenseViaManageSettings(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Check user limit before editing and creating user
        $getUserId = $user->id;
        $paymentId = $request->edit_user_license_payId;
        $limitCheck = UserLimitHelper::checkAndEditUserLimit($paymentId, $getUserId);
        if (!$limitCheck['status']) {
            return response()->json(['error' => $limitCheck['error']], 403);
        }
        return response()->json(['success' => 'License plan updated successfully']);
    }

    //using for stoarge 
    public function formatStorage($bytes)
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        } elseif ($bytes < 1048576) {
            return round($bytes / 1024, 2) . ' KB';
        } elseif ($bytes < 1073741824) {
            return round($bytes / 1048576, 2) . ' MB';
        } else {
            return round($bytes / 1073741824, 2) . ' GB';
        }
    }

    //using for user license --- L
    public function formatStorageUL($storageInGB)
    {
        $units = ['GB', 'TB', 'PB', 'EB']; // Extendable for very large storage
        $index = 0;
        $storage = $storageInGB;

        while ($storage >= 1024 && $index < count($units) - 1) {
            $storage = $storage / 1024;
            $index++;
        }

        return round($storage, 2) . ' ' . $units[$index];
    }

    /**
     * Save card details if it doesn't already exist.
     */
    private function saveCardIfNotExists(Request $request, int $userId)
    {
        $cardNumber = $request->input('card_number');
        $cardExpiry = $request->input('card_expiry_date');
        $cardCvv = $request->input('card_cvv');
        $cardPin = $request->input('card_pin');

        // Check for existing card by decrypting stored card details
        $existingCard = UsersLicenseCardDetail::where('user_id', $userId)
            ->get()
            ->filter(function ($card) use ($cardNumber, $cardExpiry, $cardCvv) {
                try {
                    return Crypt::decryptString($card->card_number) === $cardNumber &&
                        Crypt::decryptString($card->card_cvv) === $cardCvv &&
                        $card->card_expiry_date === $cardExpiry;
                } catch (\Exception $e) {
                    return false;
                }
            })->first();

        if (!$existingCard) {
            // Deactivate previous cards
            UsersLicenseCardDetail::where('user_id', $userId)->update(['status' => 0]);

            // Save new card
            UsersLicenseCardDetail::create([
                'user_id' => $userId,
                'card_holder_name' => $request->input('card_holder_name'),
                'card_number' => Crypt::encryptString($cardNumber),
                'card_cvv' => Crypt::encryptString($cardCvv),
                'card_pin' => Crypt::encryptString($cardPin),
                'card_expiry_date' => $cardExpiry,
                'card_save' => 1,
                'status' => 1,
            ]);
        }
    }

    private function normalizeSubscriptionType(string $type): string
    {
        $type = strtolower(trim($type));

        // Yearly variations
        $yearWords = ['year', 'yearly', 'annually', 'annual'];

        // Monthly variations
        $monthWords = ['month', 'monthly'];

        if (in_array($type, $yearWords)) {
            return 'year';
        }

        if (in_array($type, $monthWords)) {
            return 'month';
        }

        // Default fallback (optional)
        return 'month';  // you can change default
    }

    /**
     * Calculate expiry date based on start date and subscription type.
     */
    private function calculateExpiryDate(Carbon $startDate, string $subscriptionType): Carbon
    {
        $subscriptionType = $this->normalizeSubscriptionType($subscriptionType);

        $expiryDate = $startDate->copy();

        switch ($subscriptionType) {
            case 'month':
                $expiryDate->addMonth();
                break;

            case 'year':
                $expiryDate->addYear();
                break;
        }

        return $expiryDate;
    }

    //single user form submit 
    public function saveSubscription(Request $request)
    {

        DB::beginTransaction();

        try {

            // =========================
            // 1. CREATE USER
            // =========================
            $userId = DB::table('users')->insertGetId([
                'name' => $request->contactPerson,
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'designation' => $request->designation,
                'password' => Hash::make('Password@123'),
                'usertype' => 'special_user',
                'created_at' => now()
            ]);

            DB::table('users_license_card_details')->insert([
                'user_id' => $userId,
                'card_holder_name' => $request->card_name,
                'card_number' => Crypt::encryptString($request->card_number),
                'card_expiry_date' => $request->card_expiry,
                'card_cvv' => Crypt::encryptString($request->card_cvv),
                'card_pin' => null,
                'card_save' => 1,
                'status' => 1,
                'created_at' => now()
            ]);

            // =========================
            // 2. GENERATE ORDER ID
            // =========================
            $orderId = UsersLicensePayment::generateOrderId();


            // =========================
            // 3. CALCULATE EXPIRY DATE
            // =========================
            $subscriptionType = $request->subscription_type;

            if ($subscriptionType == 'month') {
                $expiryDate = Carbon::now()->addMonth();
            } else {
                $expiryDate = Carbon::now()->addYear();
            }


            // =========================
            // 4. CALCULATE FINAL AMOUNT
            // =========================
            $amount = $request->price * $request->quantity;
            $discount = $request->discount ?? 0;

            $finalAmount = $amount - $discount;


            // =========================
            // 5. INSERT PAYMENT
            // =========================

            $couponData = DB::table('coupons')->where('code', $request->coupon_id)->first();
            // $couponId = $couponData->id;
            if ($couponData) {
                $couponId = $couponData->id;
            } else {
                $couponId = null;
            }

            UsersLicensePayment::create([
                'user_id' => $userId,
                'plan_id' => $request->planId,
                'order_id' => $orderId,
                'quantity' => $request->quantity,
                'total_pool_storage' => $request->storage . ' ' . $request->storage_unit,
                'plan_subscription' => $subscriptionType,
                'plan_expiry_date' => $expiryDate,
                'total_amount' => $finalAmount,
                'payment_date' => now(),
                'payment_mode' => 'card',
                'status' => 1,
                'used_license' => 0,
                'remaining_license' => $request->license,
                'coupon_id' => $couponId,
                'created_at' => now()
            ]);

            // 6. UPDATE COUPON USAGE ✅
            if ($request->coupon_id) {
                DB::table('coupons')
                    ->where('id', $couponId)
                    ->increment('used_count');
            }

            //generate pdf
            $user = DB::table('users')->where('id', $userId)->first();

            $pdf = Pdf::loadView('marketplace.invoices', [
                'user' => $user,
                'plan_name' => $request->plan_name,
                'price' => $request->price,
                'subscription_type' => $request->subscription_type,
                'license' => $request->license,
                'storage' => $request->storage,
                'unit' => $request->storage_unit,
                'qty' => $request->quantity,
                'total_amount' => $finalAmount,
                'promocode' => $request->coupon_id ?? 'N/A',
                'company_email' => 'support@sizaf.com',
                'company_phone' => '9999999999',
                'payment_mode' => 'Card',
                'payment_status' => 'Paid',
                'payment_date' => now()->format('d M Y'),
            ])->setPaper('a4', 'portrait');

            //Send to admin
            
            // officelescloud@gmail.com
            $pdfPath = storage_path('app/invoice.pdf');
            file_put_contents($pdfPath, $pdf->output());

            Mail::send(
                'mail-templates.purchase-email-admin',
                [
                    'name' => $request->contactPerson,
                    'username' => $request->username,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'designation' => $request->designation,
                    'password' => 'Password@123',
                    'usertype' => 'special_user',
                ],
                function ($message) use ($request, $pdfPath) {
                    $message->to('officelescloud@gmail.com');
                    $message->replyTo($request->email);
                    $message->subject('Purchase Details');
                    $message->attach($pdfPath);
                }
            );

            //Send to user
            Mail::send(
                'mail-templates.purchase-email',
                [
                    'name' => $request->contactPerson,
                    'username' => $request->username,
                    'password' => 'Password@123',
                ],
                function ($message) use ($request, $pdfPath) {
                    $message->to($request->email);
                    $message->subject('We received your enquiry');
                    $message->attach($pdfPath);
                }
            );

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Subscription saved successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            // dd($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    //apply coupon
    public function applyCoupon(Request $request)
    {
        $coupon = DB::table('coupons')
            ->where('code', $request->code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            return response()->json(['status' => false, 'message' => 'Invalid coupon']);
        }

        if ($coupon->expiry_date && now()->gt($coupon->expiry_date)) {
            return response()->json(['status' => false, 'message' => 'Coupon expired']);
        }

        if ($request->amount < $coupon->min_amount) {
            return response()->json(['status' => false, 'message' => 'Minimum amount not met']);
        }

        if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
            return response()->json(['status' => false, 'message' => 'Usage limit reached']);
        }

        $discount = 0;

        if ($coupon->discount_type == 'percent') {
            $discount = ($request->amount * $coupon->discount_value) / 100;

            if ($coupon->max_discount) {
                $discount = min($discount, $coupon->max_discount);
            }
        } else {
            $discount = $coupon->discount_value;
        }

        return response()->json([
            'status' => true,
            'discount' => round($discount, 2),
            'coupon_id' => $coupon->id,
            'type' => $coupon->discount_type,
            'value' => $coupon->discount_value
        ]);
    }

    //for team -------------------------------------
    // public function paymentForTeam(Request $request)
    // {
    //     $planLists = DB::table('users_license_plans')
    //         ->where('plans_status', 1)
    //         ->where('for_usertype', 'company')
    //         ->where('plans_subscription_type', 'month')
    //         ->get();

    //     $planListsYear = DB::table('users_license_plans')
    //         ->where('plans_status', 1)
    //         ->where('for_usertype', 'company')
    //         ->where('plans_subscription_type', 'year')
    //         ->get();

    //     return view('marketplace.payment', [
    //         'planLists' => $planLists,
    //         'planListsYear' => $planListsYear
    //     ]);
    // }

    // public function applyCouponForTeam(Request $request)
    // {
    //     $coupon = DB::table('coupons')
    //         ->where('code', $request->code)
    //         ->where('status', 1)
    //         ->first();

    //     if (!$coupon) {
    //         return response()->json(['success' => false, 'message' => 'Invalid code']);
    //     }

    //     if ($coupon->expiry_date && now()->gt($coupon->expiry_date)) {
    //         return response()->json(['success' => false, 'message' => 'Expired']);
    //     }

    //     if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
    //         return response()->json(['success' => false, 'message' => 'Limit reached']);
    //     }

    //     if ($request->amount < $coupon->min_amount) {
    //         return response()->json(['success' => false, 'message' => 'Minimum amount not met']);
    //     }

    //     // calculate discount
    //     if ($coupon->discount_type == 'percent') {
    //         $discount = ($request->amount * $coupon->discount_value) / 100;
    //     } else {
    //         $discount = $coupon->discount_value;
    //     }

    //     if ($coupon->max_discount && $discount > $coupon->max_discount) {
    //         $discount = $coupon->max_discount;
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'discount' => $discount,
    //         'coupon_id' => $coupon->id
    //     ]);
    // }


    // public function savePaymentForTeam(Request $request)
    // {
    //     try {

    //         $user_id = auth()->id() ?? 1; // temporary if not logged in

    //         // --------------------------
    //         // PLAN DETAILS
    //         // --------------------------
    //         $plan = DB::table('users_license_plans')
    //             ->where('id', $request->plan_id)
    //             ->first();

    //         if (!$plan) {
    //             return response()->json(['success' => false, 'message' => 'Invalid plan']);
    //         }

    //         // --------------------------
    //         // CALCULATIONS
    //         // --------------------------
    //         $quantity = $request->quantity;
    //         $total_amount = $request->total;
    //         $subscription = $request->subscription;

    //         // expiry date
    //         $expiry_date = $subscription == 'year'
    //             ? Carbon::now()->addYear()
    //             : Carbon::now()->addMonth();

    //         // --------------------------
    //         // ORDER ID (simple)
    //         // --------------------------
    //         $order_id = 'ORD-' . time();

    //         // --------------------------
    //         // SAVE PAYMENT
    //         // --------------------------
    //         $payment_id = DB::table('users_license_payments')->insertGetId([
    //             'user_id' => $user_id,
    //             'plan_id' => $request->plan_id,
    //             'order_id' => $order_id,
    //             'quantity' => $quantity,
    //             'total_pool_storage' => $request->storage,
    //             'plan_subscription' => $subscription,
    //             'plan_expiry_date' => $expiry_date,
    //             'total_amount' => $total_amount,
    //             'payment_date' => now(),
    //             'payment_mode' => 'card',
    //             'status' => 1,
    //             'used_license' => 0,
    //             'remaining_license' => $quantity,
    //             'coupon_id' => $request->coupon_id,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);

    //         // --------------------------
    //         // UPDATE COUPON USAGE
    //         // --------------------------
    //         if ($request->coupon_id) {
    //             DB::table('coupons')
    //                 ->where('id', $request->coupon_id)
    //                 ->increment('used_count');
    //         }

    //         // --------------------------
    //         // SAVE CARD DETAILS
    //         // --------------------------
    //         DB::table('users_license_card_details')->insert([
    //             'user_id' => $user_id,
    //             'card_holder_name' => $request->card_name,
    //             'card_number' => encrypt($request->card_number),
    //             'card_expiry_date' => $request->card_expiry,
    //             'card_cvv' => encrypt($request->card_cvv),
    //             'card_pin' => null,
    //             'card_save' => 1,
    //             'status' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Payment saved successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }







    public function paymentForTeam(Request $request)
    {
        $planLists = DB::table('users_license_plans')
            ->where('plans_status', 1)
            ->where('for_usertype', 'company')
            ->where('plans_subscription_type', 'month')
            ->get();

        $planListsYear = DB::table('users_license_plans')
            ->where('plans_status', 1)
            ->where('for_usertype', 'company')
            ->where('plans_subscription_type', 'year')
            ->get();

        return view('marketplace.payment', compact('planLists', 'planListsYear'));
    }

    // =========================================
    // APPLY COUPON (TEAM)
    // =========================================
    public function applyCouponForTeam(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'amount' => 'required|numeric|min:0'
        ]);

        $coupon = DB::table('coupons')
            ->where('code', $request->code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code']);
        }

        // expiry check
        if ($coupon->expiry_date && now()->gt($coupon->expiry_date)) {
            return response()->json(['success' => false, 'message' => 'Coupon expired']);
        }

        // usage limit
        if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
            return response()->json(['success' => false, 'message' => 'Coupon usage limit reached']);
        }

        // minimum amount
        if ($request->amount < $coupon->min_amount) {
            return response()->json(['success' => false, 'message' => 'Minimum amount not met']);
        }

        // calculate discount
        $discount = 0;

        if ($coupon->discount_type == 'percent') {
            $discount = ($request->amount * $coupon->discount_value) / 100;
        } else {
            $discount = $coupon->discount_value;
        }

        // max discount cap
        if ($coupon->max_discount && $discount > $coupon->max_discount) {
            $discount = $coupon->max_discount;
        }

        return response()->json([
            'success' => true,
            'discount' => round($discount, 2),
            'coupon_id' => $coupon->id
        ]);
    }

    // =========================================
    // SAVE TEAM PAYMENT
    // =========================================
    public function savePaymentForTeam(Request $request)
    {
        try {

            DB::beginTransaction(); // 🔥 important

            // =========================
            // VALIDATION
            // =========================
            // $request->validate([
            //     'plan_id' => 'required|integer',
            //     'quantity' => 'required|integer|min:1',
            //     'total' => 'required|numeric',
            //     'subscription' => 'required|in:month,year',

            //     // company
            //     'company_name' => 'required',
            //     'address' => 'required',

            //     // contact (user)
            //     'contactPerson' => 'required',
            //     'phone' => 'required',
            //     'email' => 'required|email',
            //     'username' => 'required',

            //     // card
            //     'card_name' => 'required',
            //     'card_number' => 'required',
            //     'card_expiry' => 'required',
            //     'card_cvv' => 'required'
            // ]);

            // =========================
            // 1. CREATE COMPANY
            // =========================
            $company_id = DB::table('companies')->insertGetId([
                'name' => $request->company_name,
                // 'company_type' => $request->company_type,
                'industry' => $request->industry_type,
                // 'address' => $request->address,
                'contact' => $request->company_number,
                'email' => $request->company_email,
                'website' => $request->website,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // =========================
            // 2. CREATE USER (COMPANY HEAD)
            // =========================
            $user_id = DB::table('users')->insertGetId([
                'name' => $request->contactPerson,
                // 'email' => $request->email,
                'email' => 'duummymail@mail.com',
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => Hash::make('123456'), // 🔥 change if needed
                'company_id' => $company_id,
                'designation' => $request->designation,
                // 'security_question' => $request->security_question,
                // 'security_answer' => $request->security_answer,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // =========================
            // 3. UPDATE COMPANY HEAD
            // =========================
            DB::table('companies')
                ->where('id', $company_id)
                ->update([
                    'company_head' => $user_id
                ]);

            // =========================
            // 4. PLAN
            // =========================
            $plan = DB::table('users_license_plans')
                ->where('id', $request->plan_id)
                ->first();

            if (!$plan) {
                throw new \Exception("Invalid plan");
            }

            // =========================
            // 5. CALCULATION
            // =========================
            $quantity = $request->quantity;
            $total_amount = $request->total;

            $expiry_date = $request->subscription == 'year'
                ? Carbon::now()->addYear()
                : Carbon::now()->addMonth();

            $order_id = 'TEAM-' . time();

            // =========================
            // 6. SAVE PAYMENT
            // =========================
            $payment_id = DB::table('users_license_payments')->insertGetId([
                'user_id' => $user_id,
                'plan_id' => $request->plan_id,
                'order_id' => $order_id,
                'quantity' => $quantity,
                'total_pool_storage' => $request->storage,
                'plan_subscription' => $request->subscription,
                'plan_expiry_date' => $expiry_date,
                'total_amount' => $total_amount,
                'payment_date' => now(),
                'payment_mode' => 'card',
                'status' => 1,
                'used_license' => 0,
                'remaining_license' => $quantity,
                'coupon_id' => $request->coupon_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // =========================
            // 7. UPDATE COUPON
            // =========================
            if ($request->coupon_id) {
                DB::table('coupons')
                    ->where('id', $request->coupon_id)
                    ->increment('used_count');
            }

            // =========================
            // 8. SAVE CARD
            // =========================
            DB::table('users_license_card_details')->insert([
                'user_id' => $user_id,
                'card_holder_name' => $request->card_name,
                'card_number' => encrypt($request->card_number),
                'card_expiry_date' => $request->card_expiry,
                'card_cvv' => encrypt($request->card_cvv),
                'card_pin' => null,
                'card_save' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             // officelescloud@gmail.com
            $pdfPath = storage_path('app/invoice_' . time() . '.pdf');
            file_put_contents($pdfPath, $pdf->output());

            Mail::send(
                'mail-templates.purchase-email-admin',
                [
                    'name' => $request->contactPerson,
                    'username' => $request->username,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'designation' => $request->designation,
                    'password' => 'Password@123',
                    'usertype' => 'company',
                ],
                function ($message) use ($request, $pdfPath) {
                    $message->to('officelescloud@gmail.com');
                    $message->replyTo($request->email);
                    $message->subject('Purchase Details');
                    $message->attach($pdfPath);
                }
            );

            //Send to user
            Mail::send(
                'mail-templates.purchase-email',
                [
                    'name' => $request->contactPerson,
                    'username' => $request->username,
                    'password' => 'Password@123',
                ],
                function ($message) use ($request, $pdfPath) {
                    $message->to($request->email);
                    $message->subject('We received your enquiry');
                    $message->attach($pdfPath);
                }
            );
            

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Company + User + Payment saved successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
