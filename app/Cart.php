<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    public function User(){

        return $this->belongsTo(Cart::class);
    }

    public function Goods(){

        return $this->hasMany(Good::class);
    }
}
