<?php

namespace Tests\Unit;

use App\Cart;
use App\Shopweb_final\Cart\Repositories\CartRepositories;
use App\Shopweb_final\Cart\Service\CartService;
use App\Shopweb_final\Goods\Repositories\GoodsRepositories;
use App\Shopweb_final\Order\Repositories\OrderRepositories;
use App\Shopweb_final\User\Repositories\UserRepositories;
use Tests\TestCase;

class CartServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function testAddGoodsInCart()
    {


        $input = ['size' => 'x', 'quantity' => '87', 'user_id' => '2'];
        $URMock = $this->initMock(UserRepositories::class);
        $ORMock = $this->initMock(OrderRepositories::class);
        $GRMock = new GoodsRepositories();
        $CRMock = new CartRepositories($URMock);
        $cartService = new CartService($GRMock, $CRMock, $URMock, $ORMock);
        $actutal = $cartService->addGoodsInCart($input, 3);
        $makeResultIsTure = Cart::where(['size' => 'x', 'quantity' => '87', 'user_id' => '2',])->exists();
        $this->assertSame(TRUE, $actutal);
        $this->assertSame(TRUE, $makeResultIsTure);

    }
}
