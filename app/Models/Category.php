<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $fillable = ['name','status','created_by', 'updated_by'];

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

        self::creating(function ($category) {
            $category->created_by = auth()->user()->id;
            $category->updated_by = auth()->user()->id;
        });

        self::created(function ($category) {
            // ... code here
        });

        self::updating(function ($category) {
            $category->updated_by = auth()->user()->id;
        });

        self::updated(function ($category) {
            // ... code here
        });

        self::deleting(function ($category) {
            // ... code here
        });

        self::deleted(function ($category) {
            // ... code here
        });
    }
    public function getStatusLabelAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }
}
