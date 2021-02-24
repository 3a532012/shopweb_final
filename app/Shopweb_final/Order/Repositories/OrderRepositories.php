<?php


namespace App\Shopweb_final\Order\Repositories;


use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderRepositories
{

    public function __construct()
    {

    }

    public function putCartIntoOrder($show,$numbb,$number)
    {
        foreach ($show as $abc) {//將購物車每一筆存入訂單資料表中 並賦予訂單編號欄位
            $create_order = new Order();
            $create_order->order_id = $numbb;
            $create_order->price = $abc->price;
            $create_order->size = $abc->size;
            $create_order->quantity = $abc->quantity;
            $create_order->goodsname1 = $abc->goodsname1;
            $create_order->goodsname2 = $abc->goodsname2;
            $create_order->photo1 = $abc->photo1;
            $create_order->photo2 = $abc->photo2;
            $create_order->type = $abc->type;
            $create_order->total = $number;
            $create_order->user_id = Auth::user()->id;
            $create_order->save();
        }
    }

    public function getUserOrder($userId)
    {

       return DB::table('orders')->where('user_id',$userId)->first();//找出orders資料表中是否有訂單
    }
    public function showOrderDetail($id)
    {
        $show=DB::table('users')
            ->leftJoin('orders','users.id','=','user_id')
            ->where('order_id','=',$id)
            ->get();
        return $show;
    }
}
