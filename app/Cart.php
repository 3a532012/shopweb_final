<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function users(){

        return $this->hasOne(User::class);
    }

    public function Goods(){

        return $this->hasMany(Good::class);
    }
}
