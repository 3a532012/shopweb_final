<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //建立50筆carts並且和users和goods有關聯
        factory(\App\Cart::class,50)->create();
    }
}
