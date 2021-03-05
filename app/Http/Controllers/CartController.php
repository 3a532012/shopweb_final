<?php

namespace App\Http\Controllers;
use App\Shopweb_final\Cart\Service\CartService;
use App\Shopweb_final\Order\Service\OrderService;
use Redirect;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function __construct(
        CartService $CartService,
        OrderService $OrderService
    )
    {
        $this->CartService=$CartService;
        $this->OrderService=$OrderService;
       return $this->middleware('auth');
    }

    public function add(Request $request, $id)
    {
        $input=['size'=>$request->size,'quantity'=>$request->quantity,'user_id'=>$request->user()->id];

        try {
            $this->CartService->addGoodsInCart($input, $id);
        } catch (\Exception $exception){
            throw $exception;
        }
        return Redirect::to(url()->previous())->with('message','成功加入');
    }

    public function show()
    {
        $date= $this->CartService->getGoodsInCart();
        return view('cart',['carts'=>$date]);
    }

    public function delete($id)
    {
        $this->CartService->deleteGoodsInCart($id);
        return redirect(route('cart_show'))->with('message','成功刪除');
    }

    public  function  checkout()
    {
        $count_cart=$this->CartService->getGoodsInCart()->count();
        if ($count_cart==0) {
            return Redirect::to(url()->previous())->with('message','購物車無商品,無法下單');
        }
        $number=0;
        $show=$this->CartService->getGoodsInCart();
        foreach ($show as $abc) {
            $number=$number+$abc->price*$abc->quantity;
        }
        return view('checkout',['data'=>$show,'a'=>$number]);
    }

    public function order_create()
    {
       return $this->OrderService->creatOrder();

    }

    public function order_show1()
    {
        return view('order');
    }

    public function order_show()
    {
        $test=$this->OrderService->getUserOrder();

        if ($test==null) {

            return  redirect(route('order_show1'))->with('message','沒有訂單');
        }
        else {

            return $this->OrderService->showOrder();

        }
    }

    public function order_detail($id)
    {
       return $this->OrderService->showOrderDetail($id);
    }
}

