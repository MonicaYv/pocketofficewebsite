<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Use this as the base class
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  // Ensure the model extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'client_id', 'company_id', 'group_id', 'role_id', 'usertype', 'name', 'username', 'email', 'password', 'sizeMax', 'ip_address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function setting()
    {
        return $this->hasOne(UserSettings::class);
    }
    // Get privilege requests for a Client (Indirect relationship)
       public function clientPrivileges()
       {
           return $this->hasManyThrough(UserPrivilege::class, User::class, 'client_id', 'user_id', 'id', 'id');
       }
   
       // Get privilege requests for a Company (Indirect relationship)
       public function companyPrivileges()
       {
           return $this->hasManyThrough(UserPrivilege::class, User::class, 'company_id', 'user_id', 'id', 'id');
       }
   
       // Get privilege requests for a Group (Indirect relationship)
       public function groupPrivileges()
       {
           return $this->hasManyThrough(UserPrivilege::class, User::class, 'group_id', 'user_id', 'id', 'id');
       }

    public function allocations()
    {
        return $this->hasMany(StorageAllocationUser::class, 'user_id', 'id');
    }

    public function allocatedPurchases()
    {
        return $this->hasManyThrough(
            StoragePurchase::class,
            StorageAllocationUser::class,
            'user_id',
            'id',
            'id',              
            'purchase_id'
        );
    }

   
    public function getUsedStorageValueAttribute()
    {
        $used = 0;

        foreach ($this->allocations as $allocation) {
            if (!empty($allocation->path)) {
                $result = \App\Helpers\Helper::getSizeFolders($allocation->path, $this->id); // returns string like "12 MB" or "0.5 GB"
                // dd($result);
                // Split numeric and unit
                if (preg_match('/([\d\.]+)\s*(B|KB|MB|GB)/i', $result, $matches)) {
                    $size = (float) $matches[1];
                    $unit = strtoupper($matches[2]);

                    switch ($unit) {
                        case 'B':
                            $used += $size / 1024 / 1024 / 1024;
                            break;
                        case 'KB':
                            $used += $size / 1024 / 1024;
                            break;
                        case 'MB':
                            $used += $size / 1024;
                            break;
                        case 'GB':
                            $used += $size;
                            break;
                    }
                }
            }
        }

        return round($used, 2); // always return numeric GB
    }

    public function getTotalStorageValueAttribute()
    {
        // Assuming allocated_storage in DB is stored in GB
        return round($this->allocations->sum('allocated_storage'), 2);
    }


       
}
?>