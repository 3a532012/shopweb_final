<?php


namespace App\Shopweb_final\Order\Repositories;


use App\Cart;
use App\Order;
use App\ViewOrderDetailData;
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
            Cart::where('user_id','=',Auth::user()->id)
                ->update(['orders_id'=>$numbb]);


    }

    public function getUserOrder($userId)
    {

       return DB::table('orders')
           ->leftJoin('users','orders.user_id','=','users.id')
           ->where('user_id',$userId)
           ->get();
    }
    public function showOrderDetail($id)
    {

        $show=DB::table('orders')->where('orderNumber',$id)->get();
        $showProduct=ViewOrderDetailData::where('orders_id',$id)->get();
        return $show=['show'=>$show,'showProduct'=>$showProduct];
    }
}
