<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandyMen extends Model
{
    protected $fillable = ['full_name', 'email', 'phone_number', 'address', 'created_by', 'updated_by'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
