<?php


namespace App\Shopweb_final\Cart\Service;


use App\Good;
use App\Shopweb_final\Goods\Service\GoodsService;
use App\Shopweb_final\Cart\Repositories\CartRepositories;
use App\Shopweb_final\Order\Repositories\OrderRepositories;
use App\Shopweb_final\User\Repositories\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function __construct(
        GoodsService $GoodsService,
        CartRepositories $CartRepositories,
        UserRepositories $UserRepositories,
        OrderRepositories $OrderRepositories

    )
    {
        $this->GoodsService=$GoodsService;
        $this->CartRepositories=$CartRepositories;
        $this->OrderRepositories=$OrderRepositories;
        $this->UserRepositories=$UserRepositories;

    }
    public function addGoodsInCart(Request $request, $id)
    {

            $vaule = $this->GoodsService->findGoodsById($id);
            $this->CartRepositories->insertGoodsInCart($request, $vaule);
    }

    public function getGoodsInCart()
    {

        $userId=$this->UserRepositories->getUserId();
        $date=$this->CartRepositories->getUserCart($userId);
        return $date;
    }
    public function deleteGoodsInCart($id)
    {

        $this->CartRepositories->deleteGoodsInCart($id);
    }


}
