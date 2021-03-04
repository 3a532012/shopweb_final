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
        $this->OrderRepositories->putCartIntoOrder($show, $numbb, $number);
        $this->CartRepositories->deleteAllGoodsInCart($userId);//刪除與使用者相同id的購物車商品資訊
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
        $order_show = DB::table('users')->leftJoin('orders', 'users.id', '=', 'user_id')//找出users資料表中id欄位與orders資料表中user_id欄位相同的資料
        ->select('users.name', 'users.id', 'orders.order_id', 'orders.created_at', 'orders.total')//只要users資料表中name欄位和id欄位,和orders資料表中order_id欄位和created_at欄位跟total欄位
        ->where('users.id', '=', $userId)->distinct('orders.order_id')->get();//進階搜尋上述的資料進行篩選users資料表中id與現在登入的id相符者
        //,並且用distinct限制orders資料表中的order_id不能重複
        return view('order', ['date' => $order_show]);

    }

    public function showOrderDetail($id)
    {
        $show = $this->OrderRepositories->showOrderDetail($id);
        return view('order_detail', ['data' => $show]);
    }
}
