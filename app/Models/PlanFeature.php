<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $table = 'plan_features';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'single_user',
        'basic',
        'standard',
        'advance',
        'premium',
        'status',
    ];

    protected $casts = [
        'single_user' => 'boolean',
        'basic'       => 'boolean',
        'standard'    => 'boolean',
        'advance'     => 'boolean',
        'premium'     => 'boolean',
        'status'      => 'boolean',
    ];
}