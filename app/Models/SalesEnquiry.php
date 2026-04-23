<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesEnquiry extends Model
{
    protected $table = 'sales_enquiries';

    protected $fillable = [
        'company_name',
        'industry',
        'first_name',
        'last_name',
        'country_code',
        'phone_number',
        'email',
        'website',
        'company_address',
        'country',
        'city',
        'services',
        'message'
    ];

    protected $casts = [
        'services' => 'array'
    ];
}
