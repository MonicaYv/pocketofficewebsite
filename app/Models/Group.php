<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'client_id', 'company_id', 'name',
    ];

    /**
     * Relationship: Each group belongs to one client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relationship: Each group belongs to one company.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function groupHead()
    {
        return $this->belongsTo(User::class, 'group_head');
    }

    public function getUsedStorageValueAttribute()
    {
        return $this->groupHead
            ? $this->groupHead->used_storage_value
            : 0;
    }

    public function getTotalStorageValueAttribute()
    {
        return $this->groupHead
            ? $this->groupHead->total_storage_value
            : 0;
    }


}
