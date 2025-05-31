<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $fillable = [
        'category_id',
        'provider_id',
        'image_url',
        'title',
        'description',
        'status',
        'price',
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function handyMan()
    {
        return $this->belongsTo(HandyMen::class);
    }

    public function adminCreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function adminUpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($service) {
            $service->created_by = auth()->user()->id;
            $service->updated_by = auth()->user()->id;
        });

        self::created(function ($service) {
            // ... code here
        });

        self::updating(function ($service) {
            $service->updated_by = auth()->user()->id;
        });

        self::updated(function ($service) {
            // ... code here
        });

        self::deleting(function ($service) {
            // ... code here
        });

        self::deleted(function ($service) {
            // ... code here
        });
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }
}
