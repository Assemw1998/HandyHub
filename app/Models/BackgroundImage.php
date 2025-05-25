<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  BackgroundImage extends Model
{
    use HasFactory;
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

        self::creating(function ($backgroundImage) {
            $backgroundImage->created_by = auth()->user()->id;
            $backgroundImage->updated_by = auth()->user()->id;
        });

        self::created(function ($backgroundImage) {
            // ... code here
        });

        self::updating(function ($backgroundImage) {
            $backgroundImage->updated_by = auth()->user()->id;
        });

        self::updated(function ($backgroundImage) {
            // ... code here
        });

        self::deleting(function ($backgroundImage) {
            // ... code here
        });

        self::deleted(function ($backgroundImage) {
            // ... code here
        });
    }
}
