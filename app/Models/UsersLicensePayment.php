<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLicensePayment extends Model
{
    protected $table = 'users_license_payments';
    // protected $guarded = [];
    protected $fillable = [
        'user_id',
        'plan_id',
        'order_id',
        'quantity',
        'total_pool_storage',
        'plan_subscription',
        'plan_expiry_date',
        'total_amount',
        'payment_date',
        'payment_mode',
        'status',
        'used_license',
        'remaining_license'
    ];

    public static function generateOrderId()
    {
        $lastOrder = self::whereNotNull('order_id')
            ->orderByDesc('id')
            ->value('order_id');

        return $lastOrder ? ((int) $lastOrder + 1) : 1;
    }

    public function plan()
    {
        return $this->belongsTo(UsersLicensePlan::class, 'plan_id');
    }
}
