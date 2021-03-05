<?php

namespace Tests\Unit;

use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;


class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function testCartAdd()
    {

        $this->initDatabase();
        $a = DB::table('goods')
            ->where('id', 3)
            ->value('goodsname1');
        $this->loginWithFakeUser();
        $this->call(
            'POST',
            'membership/cart_add/3',
            ['size' => 'x', 'quantity' => '10', '_token' => csrf_token()]);
        $this->assertDatabaseHas('carts',
            ['user_id' => Auth::user()->id, 'goodsname1' => $a]);


    }

    public function testCartShow()
    {
        $this->initDatabase();
        $this->loginWithFakeUser();
        $response = $this->call('get', 'membership/cart_show');
        $response->assertViewIs('cart');
    }

    public function testCartDelete()
    {
        //$this->initDatabase();
        $this->loginWithFakeUser();
        $vaule = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->first();

        $this->call(
            'DELETE',
            "membership/cart_delete/{$vaule->id}",
            ['_token' => csrf_token()]);
        $this->assertDatabaseMissing(
            'carts',
            ['user_id' => Auth::user()->id, 'id' => $vaule->id]);

    }

    public function testCartCheckout()
    {
        Session::flush();
        $this->loginWithFakeUser();
        $respone = $this->call(
            'GET',
            "membership/checkout");
        $respone->assertSessionHas(['message' => '購物k法下單']);
        $respone->assertViewIs('checkout');
    }

    public function testCartOrderCreate()
    {
        Session::flush();
        $this->loginWithFakeUser();
        $respone = $this->call(
            'GET',
            "membership/order_create");
        $respone->assertSessionHas(['message' => '成功新增']);
    }

    public function testCartOrderShow()
    {
        Session::flush();
        $this->loginWithFakeUser();
        $respone = $this->call(
            'GET',
            "membership/order_show");
        $respone->assertSessionHas(['message' => '沒有訂單']);
        $respone->assertViewIs('order');
        $respone->assertViewHas('date');
    }



}
