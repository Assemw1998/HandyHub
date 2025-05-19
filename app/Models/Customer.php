<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['full_name', 'email', 'phone_number', 'address', 'password', 'created_by', 'updated_by'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
