<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function Cart(){

        return $this->belongsTo(Cart::class);
    }


}
