<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getLocationAttribute()
    {
        $downtown = $this->customer?->city?->downtown;
        return $downtown->lat.','.$downtown->long;
    }

    public function getCustomerLocationAttribute()
    {
        $customer = $this->customer;
        return $customer->lat.','.$customer->long;
    }

    public function getCityAttribute()
    {
        $city = $this->customer?->city;
        return $city->name;
    }
}
