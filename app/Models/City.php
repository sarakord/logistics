<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['downtown'];

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', 1);
    }

    public function downtown()
    {
        return $this->hasOne(Downtown::class);
    }
}
