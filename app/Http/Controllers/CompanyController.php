<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\User;
use App\Models\UsersLicenseCardDetail;
use App\Models\UsersLicensePayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivationMail;


class CompanyController extends Controller
{

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

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $checkClient = Client::where('name', 'Aibuzzclient')->first();

            if (!$checkClient) {

                $createClient = Client::create([
                    'name'      => 'Aibuzzclient',
                    'email'     => 'aibuzz@gmail.com',
                    'logo'      => 'www.aibuzz.com',
                    'website'   => 'www.aibuzz.com',
                    'industry'  => 'IT',
                    'country'   => 'India',
                    'contact'   => '12345',
                    'status'    => 1
                ]);

                $clientId = $createClient->id;

                $createUser = User::create([
                    'client_id' => $clientId,
                    'usertype'  => 'client',
                    'name'      => 'Aibuzzclient',
                    'email'     => 'aibuzz@gmail.com',
                    'username'  => 'Aibuzzclient',
                    'password'  => Hash::make('PASSWORD@123'),
                    'phone'     => '12345',
                    'status'    => 1
                ]);

                $userId = $createUser->id;

                Client::where('id', $clientId)->update([
                    'client_head' => $userId,
                    'updated_at'  => now(),
                ]);

                $company = Company::create([
                    'client_id'     => $clientId,
                    'name'          => $request->companyName,
                    'email'         => $request->companyEmail,
                    'website'       => $request->website,
                    'industry'      => $request->industryType,
                    'country'       => $request->address,
                    'company_head'  => $userId,
                    'contact'       => $request->phone,
                    'status'        => 1
                ]);

                $companyId = $company->id;
                $plainPassword = 'PASSWORD@123';
                $user = User::create([
                    'client_id'   =>  $clientId,
                    'company_id'  => $companyId,
                    'usertype'    => 'company',
                    'name'        => $request->contactPerson,
                    'username'    => $request->username,
                    'email'       => $request->email,
                    'password'    => Hash::make($plainPassword),
                    'phone'       => $request->phone,
                    'status'      => 1
                ]);
            } else {

                $clientId = $checkClient->id; // already exists

                $company = Company::create([
                    'client_id'     => $clientId,
                    'name'          => $request->companyName,
                    'email'         => $request->companyEmail,
                    'website'       => $request->website,
                    'industry'      => $request->industryType,
                    'country'       => $request->address,
                    'company_head'  => $request->contactPerson,
                    'contact'       => $request->phone,
                    'status'        => 1
                ]);

                $companyId = $company->id;

                $user = User::create([
                    'client_id'   =>  $clientId,
                    'company_id'  => $companyId,
                    'usertype'    => 'company',
                    'name'        => $request->contactPerson,
                    'username'    => $request->username,
                    'email'       => $request->email,
                    'password'    => Hash::make('PASSWORD@123'),
                    'phone'       => $request->phone,
                    'status'      => 1
                ]);
            }


            // Auth::login($user);

            DB::commit();

            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'company_id' => $company->id
            ]);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

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
    public function savePayment(Request $request)
    {
        // dd($request);
        $cardNumber = $request->input('card_number');
        $cardExpiry = $request->input('expiry');
        $cardCvv = $request->input('cvv');
        // $cardPin = $request->input('card_pin');
        $cardHolderName = $request->input('card_name');

        $userId = $request->user_id;
        $planId = $request->input('plan_id');
        $now = Carbon::now();
        $subscriptionType =  $request->subscription;


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
        $totalPoolStorageInGB = ($storageInGB * $request->quantity) * $licenseCount;
        $formattedStorage = $this->formatStorageUL($totalPoolStorageInGB);
        $startDate = $now;

        $expiryDate = $this->calculateExpiryDate($startDate, $getSubscriptionType);
        $getUsersDetails = UsersLicenseCardDetail::where('user_id', $userId)->first();

        if (!$getUsersDetails) {
            // Save new card
            UsersLicenseCardDetail::create([
                'user_id' => $userId,
                'card_holder_name' => $cardHolderName,
                'card_number' => Crypt::encryptString($cardNumber),
                'card_cvv' => Crypt::encryptString($cardCvv),
                // 'card_pin' => Crypt::encryptString($cardPin),
                'card_expiry_date' => $cardExpiry,
                'card_save' => 1,
                'status' => 1,
            ]);
        }


        $payment = UsersLicensePayment::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            'order_id' => UsersLicensePayment::generateOrderId(),
            'quantity' => $request->quantity,
            'total_pool_storage' =>  $formattedStorage,
            'plan_expiry_date' => $expiryDate->format('Y-m-d'),
            'total_amount' => $request->total_amount,
            'payment_date' => $now->format('Y-m-d H:i:s'),
            'plan_subscription' => $getSubscriptionType,
            'payment_mode' => 'card',
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

            $remainLicense = (($request->quantity * $totalUserCounts) - 1);
            $usedLicense   = 1;

            // Step 3: Insert into users_license_assign
            DB::table('users_license_assign')->insert([
                'payment_id' => $paymentId,
                'order_id'   => $orderId,
                'user_id'    => $userId,
                'created_by' => $userId,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {

            $remainLicense = $request->quantity * $totalUserCounts;
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
        $user = $checkUser;

        try {
            if ($user) {
                Mail::to($user->email)->send(
                    new AccountActivationMail(
                        $user,
                        $user->username,
                        'PASSWORD@123'
                    )
                );
            }
        } catch (\Exception $e) {
            \Log::error('Mail Error: ' . $e->getMessage());
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 200);
    }
    public function paymentSuccess(Request $request)
    {
        return view('pages.thankyou');
    }
}
