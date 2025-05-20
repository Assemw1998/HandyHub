<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $fillable = [
        'image_url',
        'full_name',
        'email',
        'phone_number',
        'address',
        'password',
        'status',
        'created_by',
        'updated_by'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($customer) {
            $customer->created_by = auth()?->user()?->id ?? null;
            $customer->updated_by = auth()?->user()?->id ?? null;
        });

        self::created(function ($customer) {
            // ... code here
        });

        self::updating(function ($customer) {
            $customer->updated_by = auth()?->user()?->id ?? null;
        });

        self::updated(function ($customer) {
            // ... code here
        });

        self::deleting(function ($customer) {
            // ... code here
        });

        self::deleted(function ($customer) {
            // ... code here
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function adminUpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function adminCreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }
}
