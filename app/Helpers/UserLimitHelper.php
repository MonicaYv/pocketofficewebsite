<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Company;
use App\Models\UsersLicensePayment;
use App\Models\UsersLicensePlan;
use App\Models\MarketPlaceAppPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserLimitHelper
{
    //create for master : check users count when user created on add btn
    public static function masterCheckUserLimit($getPaymentId, $company_id, $client_id)
    {
        $authUserId   = Auth::id();
        $authUserType = Auth::user()->usertype;

        //get company id
        // $getUserId = User::where('company_id', $company_id)->where('client_id', $client_id)->first();
        $getUserId = Company::where('id', $company_id)->first();


        //Get active payment for auth company & plan
        $payment = DB::table('users_license_payments as p')
            ->join('users_license_plans as pl', 'p.plan_id', '=', 'pl.id')
            ->where('p.user_id', $getUserId->company_head)
            ->where('p.id', $getPaymentId)
            ->where('p.status', 1)
            // ->where('p.plan_expiry_date', '>=', now())
            ->whereDate('p.plan_expiry_date', '>=', now()->toDateString())
            ->select(
                'p.id as payment_id',
                'p.order_id',
                'p.quantity',
                'p.used_license',
                'p.remaining_license',
                'p.plan_expiry_date',
                'pl.plans_license',
                'pl.plans_name'
            )
            ->first();

        if (!$payment) {
            return ['status' => false, 'error' => 'Plan has expired or no active plan was found for this company.'];
        }

        //get payment id
        $paymentId = $payment->payment_id;

        // Get all users created by this auth company (user + group types)
        $companyCreatedUsers = User::where('client_id', $client_id)
            ->where('company_id', $company_id)
            ->whereIn('usertype', ['user', 'group'])
            ->where('status', 1)
            ->pluck('id');

        // No created users yet
        if ($companyCreatedUsers->isEmpty()) {
            $createdUsers = User::where('client_id', $client_id)
                ->where('company_id', $company_id)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::where('client_id', $client_id)
                ->where('company_id', $company_id)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        } else {
            // From assign table : if user created
            $assignedUserIds = DB::table('users_license_assign')
                ->whereIn('user_id', $companyCreatedUsers)
                ->where('payment_id', $paymentId)
                ->where('status', 1)
                ->pluck('user_id');

            $createdUsers = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        }
        return [
            'status'           => true,
            'remaining'        => $allowed - $totalCreated,
            'payment_id'       => $paymentId,
            'order_id'         => $payment->order_id,
            'plan_expiry_date' => $payment->plan_expiry_date
        ];
    }

    //create for client : check users count when user created on add btn
    public static function clientCheckUserLimit($getPaymentId, $company_id)
    {
        $authUserId   = Auth::id();
        $authUserType = Auth::user()->usertype;

        //get company id
        $getUserId = User::where('company_id', $company_id)->first();

        //Get active payment for auth company & plan
        $payment = DB::table('users_license_payments as p')
            ->join('users_license_plans as pl', 'p.plan_id', '=', 'pl.id')
            ->where('p.user_id', $getUserId->id)
            ->where('p.id', $getPaymentId)
            ->where('p.status', 1)
            // ->where('p.plan_expiry_date', '>=', now())
            ->whereDate('p.plan_expiry_date', '>=', now()->toDateString())
            ->select(
                'p.id as payment_id',
                'p.order_id',
                'p.quantity',
                'p.used_license',
                'p.remaining_license',
                'p.plan_expiry_date',
                'pl.plans_license',
                'pl.plans_name'
            )
            ->first();

        if (!$payment) {
            return ['status' => false, 'error' => 'Plan has expired or no active plan was found for this company.'];
        }

        //get payment id
        $paymentId = $payment->payment_id;

        // Get all users created by this auth company (user + group types)
        $companyCreatedUsers = User::where('company_id', $company_id)
            ->whereIn('usertype', ['user', 'group'])
            ->where('status', 1)
            ->pluck('id');

        // No created users yet
        if ($companyCreatedUsers->isEmpty()) {
            $createdUsers = User::where('company_id', $company_id)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::where('company_id', $company_id)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        } else {
            // From assign table : if user created
            $assignedUserIds = DB::table('users_license_assign')
                ->whereIn('user_id', $companyCreatedUsers)
                ->where('payment_id', $paymentId)
                ->where('status', 1)
                ->pluck('user_id');

            $createdUsers = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        }
        return [
            'status'           => true,
            'remaining'        => $allowed - $totalCreated,
            'payment_id'       => $paymentId,
            'order_id'         => $payment->order_id,
            'plan_expiry_date' => $payment->plan_expiry_date
        ];
    }

    //create for company : check users count when user created on add btn
    public static function checkUserLimit($getPaymentId)
    {
        $authUserId   = Auth::id();
        $authUserType = Auth::user()->usertype;
        $clientId     = Auth::user()->client_id;
        $companyId    = Auth::user()->company_id;
        // echo $getPaymentId; die;

        //Get active payment for auth company & plan
        $payment = DB::table('users_license_payments as p')
            ->join('users_license_plans as pl', 'p.plan_id', '=', 'pl.id')
            ->where('p.user_id', $authUserId)
            ->where('p.id', $getPaymentId)
            ->where('p.status', 1)
            // ->where('p.plan_expiry_date', '>=', now())
            ->whereDate('p.plan_expiry_date', '>=', now()->toDateString())

            ->select(
                'p.id as payment_id',
                'p.order_id',
                'p.quantity',
                'p.used_license',
                'p.remaining_license',
                'p.plan_expiry_date',
                'pl.plans_license',
                'pl.plans_name'
            )
            ->first();

        if (!$payment) {
            return ['status' => false, 'error' => 'Plan has expired or no active plan was found for this company.'];
        }

        //get payment id
        $paymentId = $payment->payment_id;

        // Get all users created by this auth company (user + group types)
        $companyCreatedUsers = User::where('company_id', $companyId)
            ->whereIn('usertype', ['user', 'group'])
            ->where('status', 1)
            ->pluck('id');

        // No created users yet
        if ($companyCreatedUsers->isEmpty()) {
            $createdUsers = User::where('company_id', $companyId)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::where('company_id', $companyId)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        } else {
            // From assign table : if user created
            $assignedUserIds = DB::table('users_license_assign')
                ->whereIn('user_id', $companyCreatedUsers)
                ->where('payment_id', $paymentId)
                ->where('status', 1)
                ->pluck('user_id');

            $createdUsers = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        }
        return [
            'status'           => true,
            'remaining'        => $allowed - $totalCreated,
            'payment_id'       => $paymentId,
            'order_id'         => $payment->order_id,
            'plan_expiry_date' => $payment->plan_expiry_date
        ];
    }

    //create for group : check users count when user created on add btn
    public static function groupAndUserCheckUserLimit($getPaymentId, $company_id, $client_id)
    {
        $authUserId   = Auth::id();
        $authUserType = Auth::user()->usertype;

        //get company id
        $getUserId = User::where('company_id', $company_id)->where('client_id', $client_id)->first();

        //Get active payment for auth company & plan
        $payment = DB::table('users_license_payments as p')
            ->join('users_license_plans as pl', 'p.plan_id', '=', 'pl.id')
            ->where('p.user_id', $getUserId->id)
            ->where('p.id', $getPaymentId)
            ->where('p.status', 1)
            ->whereDate('p.plan_expiry_date', '>=', now()->toDateString())
            // ->where('p.plan_expiry_date', '>=', now())
            ->select(
                'p.id as payment_id',
                'p.order_id',
                'p.quantity',
                'p.used_license',
                'p.remaining_license',
                'p.plan_expiry_date',
                'pl.plans_license',
                'pl.plans_name'
            )
            ->first();

        if (!$payment) {
            return ['status' => false, 'error' => 'Plan has expired or no active plan was found for this company.'];
        }

        //get payment id
        $paymentId = $payment->payment_id;

        // Get all users created by this auth company (user + group types)
        $companyCreatedUsers = User::where('client_id', $client_id)
            ->where('company_id', $company_id)
            ->whereIn('usertype', ['user', 'group'])
            ->where('status', 1)
            ->pluck('id');

        // No created users yet
        if ($companyCreatedUsers->isEmpty()) {
            $createdUsers = User::where('client_id', $client_id)
                ->where('company_id', $company_id)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::where('client_id', $client_id)
                ->where('company_id', $company_id)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        } else {
            // From assign table : if user created
            $assignedUserIds = DB::table('users_license_assign')
                ->whereIn('user_id', $companyCreatedUsers)
                ->where('payment_id', $paymentId)
                ->where('status', 1)
                ->pluck('user_id');

            $createdUsers = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'user')
                ->count();

            $createdGroups = User::whereIn('id', $assignedUserIds)
                ->where('usertype', 'group')
                ->count();

            $totalCreated = $createdUsers + $createdGroups;
            $allowed = ($payment->plans_license ?? 0) * $payment->quantity;

            if ($totalCreated >= $allowed) {
                return [
                    'status' => false,
                    'error'  => "User limit exceeded for plan: {$payment->plans_name}.
                <br> Plan allows $allowed users,
                <br> Created $totalCreated (Users $createdUsers, Groups $createdGroups)."
                ];
            }

            $usedLicense = $totalCreated + 1;
            $remainLicense = $allowed - $usedLicense;

            DB::table('users_license_payments')
                ->where('id', $paymentId)
                ->update([
                    'used_license'      => $usedLicense, // only actual created users
                    'remaining_license' => $remainLicense,
                ]);
        }
        return [
            'status'           => true,
            'remaining'        => $allowed - $totalCreated,
            'payment_id'       => $paymentId,
            'order_id'         => $payment->order_id,
            'plan_expiry_date' => $payment->plan_expiry_date
        ];
    }

    //create for user : check users count when user created userCheckUserLimit
    //---------------------------------------------------------------------------------------------------------------




    //update for master: check users count when user modified on edit btn
    public static function checkAndEditUserLimit($paymentId, $getUserId)
    {
        $authUserId   = Auth::id(); 
        $authUserType = Auth::user()->usertype;

        // Get assigned plan for this user
        $assigned = DB::table('users_license_assign')
            ->where('user_id', $getUserId)
            ->where('status', 1)
            ->first();
        
        $getUsers = DB::table('users')
            ->where('id', $getUserId)
            ->where('status', 1)
            ->first();
        
        

        if (!$assigned && !$getUsers) {
            return ['status' => false, 'error' => 'Order ID not found for this user, data might be outdated.'];
        }
        elseif(!$assigned){
            return ['status' => false, 'error' => 'This user created by client without using user license.'];
            // $previousPaymentId = '';
            // $newPaymentId = (int) $paymentId;
        } else {
            $previousPaymentId = (int) $assigned->payment_id;
            $newPaymentId = (int) $paymentId;

            // If same plan, no update needed
            if ($previousPaymentId === $newPaymentId) {
                return [
                    'status'     => true,
                    'payment_id' => $assigned->payment_id,
                    'order_id'   => $assigned->order_id
                ];
            }
        }

        return DB::transaction(function () use ($authUserId, $authUserType, $getUserId, $previousPaymentId, $newPaymentId) {

            if ($authUserType == "master" || $authUserType == "client" || $authUserType == "group") {
                $findComp = User::where('id', $getUserId)->first();                
                $findCompId = Company::where('id', $findComp->company_id)->first();
                $userId = $findCompId->company_head;                
            }else{
                $userId = $authUserId;
            }

            if($previousPaymentId == ''){
            } else {
                // Step 1: Get previous payment details
                $prevPayment = UsersLicensePayment::where('id', $previousPaymentId)
                    ->where('user_id', $userId)
                    ->where('status', 1)
                    ->whereDate('plan_expiry_date', '>=', now()->toDateString())
                    ->lockForUpdate()
                    ->first();
                
                if (!$prevPayment) {
                    return ['status' => false, 'error' => 'Previous payment record not found.'];
                }
            }
            

            // Step 2: Get new payment details
            $newPayment = UsersLicensePayment::where('id', $newPaymentId)
                ->where('user_id', $userId)
                ->where('status', 1)
                ->whereDate('plan_expiry_date', '>=', now()->toDateString())
                ->lockForUpdate()
                ->first();
                
            if (!$newPayment) {
                return ['status' => false, 'error' => 'Plan has expired or no active plan was found for this company or may be inactive.'];
            }

            // Step 3: Check limit before updating
            if ((int) $newPayment->remaining_license <= 0) {
                return ['status' => false, 'error' => 'User limit exceeded for the new plan.'];
            }

            //Step 4: Get storage info from plans table
            $prevPlan = UsersLicensePlan::where('id', $prevPayment->plan_id)->first();
            $newPlan  = UsersLicensePlan::where('id', $newPayment->plan_id)->first();
            
            if (!$prevPlan || !$newPlan) {
                return ['status' => false, 'error' => 'Plan not found or is inactive. Please check your subscription.'];
            }

            // Step 5: Get user storage usage
            $userRecord = User::where('id', $getUserId)->lockForUpdate()->first();            

            if (!$userRecord) {
                return ['status' => false, 'error' => 'User record not found.'];
            }

            $currentUsage = (int) $userRecord->sizeUse;
            $oldMaxSize   = (int) $prevPlan->plans_users;
            $newMaxSize   = (int) $newPlan->plans_users;
            
            // Step 6: If switching to a smaller plan, ensure usage is within new limit
            if ($newMaxSize < $currentUsage) {
                return [
                    'status' => false,
                    'error'  => "Cannot switch plan. Current usage ({$currentUsage} GB) exceeds the new plan limit ({$newMaxSize} GB). Please free up space or upgrade your plan."
                ];
            }

            // Step 7: Update user's sizeMax to match new plan limit
            $userRecord->sizeMax = $newMaxSize;
            $userRecord->save();

            /*** Step 8: License Updates (existing code) ***/
            // Update previous payment (free up a license)
            $prevPayment->used_license = max(0, (int) $prevPayment->used_license - 1);            
            $prevPayment->remaining_license = max(0, (int) $prevPayment->remaining_license + 1);
            $prevPayment->save();

            // Update new payment (consume a license)
            $newPayment->used_license = max(0, (int) $newPayment->used_license + 1);
            $newPayment->remaining_license = max(0, (int) $newPayment->remaining_license - 1); 
            $newPayment->save();

            // Step 9: Update assignment record
            if($previousPaymentId == ''){
                // DB::table('users_license_assign')->insert([
                //     'payment_id' => $newPaymentId,
                //     'order_id'   => $newPayment->order_id,
                //     'user_id'    => $getUserId,
                //     'created_by' => auth()->id(),   // or whichever user created it
                //     'status'     => 1,
                //     'created_at' => now(),
                //     'updated_at' => now()
                // ]);                
            }else{            
                DB::table('users_license_assign')
                ->where('user_id', $getUserId)
                ->where('payment_id', $previousPaymentId)
                ->update([
                    'payment_id' => $newPaymentId,
                    'order_id'   => $newPayment->order_id
                ]);
            }

            return [
                'status'           => true,
                'remaining'        => $newPayment->remaining_license,
                'payment_id'       => $newPaymentId,
                'order_id'         => $newPayment->order_id,
                'plan_expiry_date' => $newPayment->plan_expiry_date
            ];
        });
    }

    //---------------------------------------------------------------------------------------------------------------
    


    
    //delete for company: check counts after user or group deleted
    public static function checkAndDeleteUserLimit($getUserId)
    {
        $authUserId   = Auth::id();
        $authUserType = Auth::user()->usertype;        

        // Get assigned plan for this user
        $assigned = DB::table('users_license_assign')
            ->where('user_id', $getUserId)
            ->where('status', 1)
            ->first();       

        $paymentId = $assigned->payment_id;

        if (!$paymentId) {
            return ['status' => false, 'error' => 'Payment plan not found for this user.'];
        }

        if (in_array($authUserType, ['master', 'client', 'group'])) {

            $usersData = User::find($getUserId);
            if (!$usersData) return ['status'=>false,'error'=>'User not found'];

            $compData = Company::find($usersData->company_id);
            if (!$compData) return ['status'=>false,'error'=>'Company not found'];

            $compId = $compData->company_head;

            // Delete license assignment
            DB::table('users_license_assign')
                // ->where('created_by', $authUserId)
                ->where('user_id', $getUserId)
                ->where('payment_id', $paymentId)
                ->delete();

            // Get current license details
            $licenseDetails = DB::table('users_license_payments')
                ->where('user_id', $compId)
                ->where('id', $paymentId)
                ->where('status', 1)
                ->first();

        } else {
            // Delete license assignment
            DB::table('users_license_assign')
                ->where('created_by', $authUserId)
                ->where('user_id', $getUserId)
                ->where('payment_id', $paymentId)
                ->delete();

            // Get current license details
            $licenseDetails = DB::table('users_license_payments')
                ->where('user_id', $authUserId)
                ->where('id', $paymentId)
                ->where('status', 1)
                ->first();
            }

        if (!$licenseDetails) {
            return ['status' => false, 'error' => 'License payment record not found.'];
        }

        // Calculate new values
        $updateUsed   = $licenseDetails->used_license - 1;
        $updateRemain = $licenseDetails->remaining_license + 1;

        // Update the license counts
        DB::table('users_license_payments')
            ->where('id', $paymentId)
            ->update([
                'used_license'      => $updateUsed,
                'remaining_license' => $updateRemain,
                'updated_at'        => now(),
            ]);
        return ['status' => true, 'used' => $updateUsed, 'remain' => $updateRemain];
    }   
    //---------------------------------------------------------------------------------------------------------------

}
