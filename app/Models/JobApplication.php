<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'job_slug',
        'job_title',
        'first_name',
        'email',
        'phone',
        'position',
        'portfolio',
        'message',
        'resume_path',
        'status',
    ];
}
