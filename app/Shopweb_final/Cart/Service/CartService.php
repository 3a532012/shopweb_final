<?php


namespace App\Shopweb_final\Cart\Service;


use App\Good;
use App\Shopweb_final\Goods\Repositories\GoodsRepositories;
use App\Shopweb_final\Cart\Repositories\CartRepositories;
use App\Shopweb_final\Order\Repositories\OrderRepositories;
use App\Shopweb_final\User\Repositories\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function __construct(
        GoodsRepositories $GoodsRepositories,
        CartRepositories $CartRepositories,
        UserRepositories $UserRepositories,
        OrderRepositories $OrderRepositories

    )
    {
        $this->GoodsRepositories=$GoodsRepositories;
        $this->CartRepositories=$CartRepositories;
        $this->OrderRepositories=$OrderRepositories;
        $this->UserRepositories=$UserRepositories;

    }
    public function addGoodsInCart($input, $id)
    {


            $vaule = $this->GoodsRepositories->getGoodsById($id);
            $this->CartRepositories->insertGoodsInCart($input, $vaule);

        return TRUE;
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
