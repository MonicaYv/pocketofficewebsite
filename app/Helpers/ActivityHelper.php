<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\Activity;
use App\Models\User;

class ActivityHelper
{
    public static function log($action, $flag, $old_data = null, $new_data = null, $location_data = null, $filetype = null)
    {
        $user = Auth::user();
        $agent = new Agent();

        $system = $agent->platform();
        $browser = $agent->browser();
        $systemVersion = $agent->version($system);
        $browserVersion = $agent->version($browser);
        $details = "$system $systemVersion $browser $browserVersion";

        $activity = [
            'old_data' => $old_data,
            'new_data' => $new_data,
            'filetype' => $filetype,
            'date' => now(),
            'action' => $action,
            'flag' => $flag,
            'details' => $details,
            'address' => 'India',
            'opened_at'  => now(),        
            'closed_at'  => null,       
            'time_spent' => null, 
        ];

        // Set location data if provided
        if ($location_data) {
            $activity['location_data'] = $location_data;
        }

        // Set user info
        if ($user) {
            $activity['user_id'] = $user->id;
            $activity['client_id'] = $user->client_id;
            $activity['company_id'] = $user->company_id;
            $activity['group_id'] = $user->group_id;
            $activity['role_id'] = $user->role_id;
            $activity['usertype'] = $user->usertype;
        } elseif (is_array($new_data) && isset($new_data['user_id'])) {
            $activity['user_id'] = $new_data['user_id'];
        }

        Activity::create($activity);
    }
}
