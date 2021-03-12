<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'size'=>$faker->randomElement(['S','M','X','Xl']),
        'quantity'=>$faker->numberBetween(1,4),
        'user_id'=>function(){
        return factory(\App\User::class)->create()->id;
        },
        'goodsId'=>function(){
        return factory(\App\Good::class)->create()->id;
        }
    ];
});
