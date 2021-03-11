<?php


namespace App\Shopweb_final\Order\Repositories;


use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderRepositories
{

    public function __construct()
    {

    }

    public function putCartIntoOrder($numbb,$number)
    {

            $create_order = new Order();
            $create_order->orderNumber = $numbb;
            $create_order->total = $number;
            $create_order->user_id = Auth::user()->id;
            $create_order->save();
            DB::table('carts')
                ->where('user_id','=',Auth::user()->id)
                ->update(['orders_id'=>$numbb]);


    }

    public function getUserOrder($userId)
    {

       return DB::table('orders')->where('user_id',$userId)->first();//找出orders資料表中是否有訂單
    }
    public function showOrderDetail($id)
    {
        $show=DB::table('orders')->where('orderNumber',$id)->get();
        $showProduct=Cart::onlyTrashed()
                    ->leftJoin('goods','carts.goodsId','=','goods.id')
                    ->leftJoin('users','carts.user_id','=','users.id')
                    ->where('carts.orders_id',$id)
                    ->get();


        return $show=['show'=>$show,'showProduct'=>$showProduct];
    }
}
