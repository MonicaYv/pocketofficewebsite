<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

class CsrfWithoutCookie extends ValidateCsrfToken
{
    protected $addHttpCookie = false;
}
