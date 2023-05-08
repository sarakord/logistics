<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['downtown'];

    public function downtown()
    {
        return $this->hasOne(Downtown::class);
    }
}
