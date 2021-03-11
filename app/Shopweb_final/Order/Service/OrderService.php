<?php


namespace App\Shopweb_final\Order\Service;


use App\Shopweb_final\Cart\Repositories\CartRepositories;
use App\Shopweb_final\Cart\Service\CartService;
use App\Shopweb_final\Order\Repositories\OrderRepositories;
use App\Shopweb_final\User\Repositories\UserRepositories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderService
{

    public function __construct(
        OrderRepositories $OrderRepositories,
        CartRepositories $CartRepositories,
        UserRepositories $UserRepositories)
    {
        $this->OrderRepositories = $OrderRepositories;
        $this->CartRepositories = $CartRepositories;
        $this->UserRepositories = $UserRepositories;
    }

    public function creatOrder()
    {

        $number = 0;
        $userId = $this->UserRepositories->getUserId();
        $show = $this->CartRepositories->getUserCart($userId);//先抓出購物車裡和user.id相同的商品

        if ($show->count() == 0) {
            return redirect(route('order_show'))->with('message', '無法建立訂單');
        }
        foreach ($show as $abc) {
            $number = $number + $abc->price * $abc->quantity;//計算購物車總金額
        }
        $numbb = date('ymdhis') . "-" . rand(0, 10);//用亂數產生訂單編號
        $this->OrderRepositories->putCartIntoOrder($numbb, $number);
        $this->CartRepositories->deleteAllGoodsInCart($userId);
        return redirect(route('order_show'))->with('message', '成功新增');//回傳資料
    }

    public function getUserOrder()
    {
        $userId = $this->UserRepositories->getUserId();
        return $this->OrderRepositories->getUserOrder($userId);
    }

    public function showOrder()
    {
        $userId = $this->UserRepositories->getUserId();
        $order_show = DB::table('orders')
                    ->leftJoin('users','orders.user_id','=','users.id')
                    ->where('user_id',$userId)
                    ->get();


        return view('order', ['date' => $order_show]);

    }

    public function showOrderDetail($id)
    {
        $show = $this->OrderRepositories->showOrderDetail($id);
        $showOrder=$show['show'];
        $showProduct=$show['showProduct'];

        return view('order_detail', ['data' => $showProduct,'showOrder'=>$showOrder]);
    }
}
