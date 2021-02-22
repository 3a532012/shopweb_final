<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function User(){

        return $this->belongsTo(Cart::class);
    }

    public function Goods(){

        return $this->hasMany(Good::class);
    }
}
