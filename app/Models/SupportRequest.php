<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    protected $table = 'support_requests';

    protected $fillable = [
        'department',
        'customer_id',
        'name',
        'country_code',
        'phone_number',
        'email',
        'message',
        'attachment_paths',
        'status',
    ];

    protected $casts = [
        'attachment_paths' => 'array',
    ];
}
