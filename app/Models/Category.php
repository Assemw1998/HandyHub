<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function AdminCreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function AdminUpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($city) {
            $city->created_by = auth()->user()->id;
            $city->updated_by = auth()->user()->id;
        });

        self::created(function ($city) {
            // ... code here
        });

        self::updating(function ($city) {
            $city->updated_by = auth()->user()->id;
        });

        self::updated(function ($city) {
            // ... code here
        });

        self::deleting(function ($city) {
            // ... code here
        });

        self::deleted(function ($city) {
            // ... code here
        });
    }
}
