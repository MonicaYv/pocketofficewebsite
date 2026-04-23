<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLicenseCardDetail extends Model
{
    protected $table = 'users_license_card_details';

    protected $fillable = [
        'user_id',
        'card_holder_name',
        'card_number',
        'card_expiry_date',
        'card_cvv',
        'card_pin',
        'card_save',
        'status',
    ];
}
