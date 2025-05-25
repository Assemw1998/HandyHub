<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $fillable = [
        'service_id',
        'customer_id',
        'rate',
        'created_by',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Customer::class, 'created_by');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($rate) {
            $rate->created_by = auth()->user()->id;
        });

        self::created(function ($rate) {
            // ... code here
        });

        self::updating(function ($rate) {
            // ... code here
        });

        self::updated(function ($rate) {
            // ... code here
        });

        self::deleting(function ($rate) {
            // ... code here
        });

        self::deleted(function ($rate) {
            // ... code here
        });
    }
}
