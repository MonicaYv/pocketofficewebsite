<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyTracker extends Model
{
    protected $table = 'currency_trackers';

    protected $fillable = [

        'base_currency',

        'changed_data',

        'source',

        'synced_at'
    ];

    protected $casts = [

        'changed_data' => 'array'
    ];
}