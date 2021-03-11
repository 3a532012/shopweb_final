<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cart;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //建立50筆user資料並且每一筆都有cart的關聯資料
        factory(App\User::class, 50)->create()->each(function($u) {
            $u->save();
            $a=Cart::create(['size'=>'m',
            'quantity'=>10,
            'goodsId'=>'2',
            'user_id'=>$u->id]);
            $u->carts()->save($a);
        });
    }
}
