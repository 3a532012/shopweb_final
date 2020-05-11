<?php

namespace App\Http\Controllers;
use App\Order;
use Redirect;
use App\Cart;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Good;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function __construct()
    {
       return $this->middleware('auth');

    }


    public function add(Request $request,$id){

$size=$request->size;
$quantity=$request->quantity;
$price=Good::where('id','=',$id)->value('price');
$goodsname1=Good::where('id','=',$id)->value('goodsname1');
$goodsname2=Good::where('id','=',$id)->value('goodsname2');
$photo1=Good::where('id','=',$id)->value('photo1');
$photo2=Good::where('id','=',$id)->value('photo2');
$type=Good::where('id','=',$id)->value('type');

$add=DB::table('carts')->insert(['price'=>$price,
    'size'=>$size,
    'quantity'=>$quantity,
    'goodsname1'=>$goodsname1,
    'goodsname2'=>$goodsname2,
    'photo1'=>$photo1,
    'photo2'=>$photo2,
    'type'=>$type,
    'user_id'=>$request->user()->id
    ]);
        return Redirect::to(url()->previous())->with('message','成功加入');

    }

    public function show(){

$date=Cart::where('user_id','=',Auth::user()->id)->paginate(5);
return view('cart',['carts'=>$date]);

    }

public function delete($id){

    Cart::destroy($id);
    return redirect(route('cart_show'))->with('message','成功刪除');

  }

public  function  checkout(){
        $count_cart=Cart::where('user_id','=',Auth::user()->id)->count();
        if($count_cart==0){

            return Redirect::to(url()->previous())->with('message','購物車無商品,無法下單');
        }
$number=0;
$show=Cart::where('user_id','=',Auth::user()->id)->get();

foreach($show as $abc){
    $number=$number+$abc->price*$abc->quantity;
}
return view('checkout',['data'=>$show,'a'=>$number]);

}

public function order_create(){

        $number=0;
        $show=Cart::where('user_id','=',Auth::user()->id)->get();//先抓出購物車裡和user.id相同的商品
        foreach($show as $abc){
            $number=$number+$abc->price*$abc->quantity;//計算購物車總金額
        }
        $numbb=date('ymdhis')."-".rand(0,10);//用亂數產生訂單編號

        foreach($show as $abc){//將購物車每一筆存入訂單資料表中 並賦予訂單編號欄位
            $create_order=new Order();
            $create_order->order_id=$numbb;
            $create_order->price=$abc->price;
            $create_order->size=$abc->size;
            $create_order->quantity=$abc->quantity;
            $create_order->goodsname1=$abc->goodsname1;
            $create_order->goodsname2=$abc->goodsname2;
            $create_order->photo1=$abc->photo1;
            $create_order->photo2=$abc->photo2;
            $create_order->type=$abc->type;
            $create_order->total=$number;
            $create_order->user_id=Auth::user()->id;
            $create_order->save();
        }
        Cart::where('user_id','=',Auth::user()->id)->delete();//刪除與使用者相同id的購物車商品資訊

        return  redirect(route('order_show'))->with('message','成功新增');//回傳資料

}
public function order_show1(){

        return view('order');
}

public function order_show(){

        $test=DB::table('orders')->where('user_id','=',Auth::user()->id)->first();//找出orders資料表中是否有訂單
        if($test==null){//若無

            return  redirect(route('order_show1'))->with('message','沒有訂單');
        }
    else{
        $order_show=DB::table('users')->leftJoin('orders','users.id','=','user_id')//找出users資料表中id欄位與orders資料表中user_id欄位相同的資料
        ->select('users.name','users.id','orders.order_id','orders.created_at','orders.total')//只要users資料表中name欄位和id欄位,和orders資料表中order_id欄位和created_at欄位跟total欄位
        ->where('users.id','=',Auth::user()->id)->distinct('orders.order_id')->get();//進階搜尋上述的資料進行篩選users資料表中id與現在登入的id相符者
                                                                                                          //,並且用distinct限制orders資料表中的order_id不能重複
        return view('order',['date'=>$order_show]);
    }
       }

public function order_detail($id){

        $show=DB::table('users')->leftJoin('orders','users.id','=','user_id')
            ->where('order_id','=',$id)->get();
        return view('order_detail',['data'=>$show]);



}
public function ooddr(){


    return response('123',200)->header('Content-Type','text-plain');
}

}
