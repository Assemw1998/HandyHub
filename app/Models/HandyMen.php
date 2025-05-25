<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandyMen extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $table = 'handy_men';
    protected $fillable = ['full_name', 'email', 'phone_number', 'address','status', 'created_by', 'updated_by'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function adminUpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function adminCreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($handyMan) {
            $handyMan->created_by = auth()?->user()?->id ?? null;
            $handyMan->updated_by = auth()?->user()?->id ?? null;
        });

        self::created(function ($handyMan) {
            // ... code here
        });

        self::updating(function ($handyMan) {
            $handyMan->updated_by = auth()?->user()?->id ?? null;
        });

        self::updated(function ($handyMan) {
            // ... code here
        });

        self::deleting(function ($handyMan) {
            // ... code here
        });

        self::deleted(function ($handyMan) {
            // ... code here
        });
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }
}
