<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeActive(Builder $query): void
    {
        $query->where('in_downtown', 1);
    }

    public function consignment()
    {
        return $this->hasMany(Consignment::class);
    }

    public function getLocationAttribute()
    {
        return $this->in_downtown ? 'in downtown':'on the way';
    }
}
