<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Good::class, function (Faker $faker) {
    return [
        'price'=>$faker->numberBetween(10,100),
        'goodsname1'=>Str::random(4),
        'photo1'=>Str::random(4),
        'photo2'=>Str::random(4),
        'type'=>$faker->randomElement(['長袖','短袖','長褲','短褲','外套']),




    ];
});
