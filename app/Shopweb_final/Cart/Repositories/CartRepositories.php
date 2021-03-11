<?php


namespace App\Shopweb_final\Cart\Repositories;

use App\Cart;
use App\Shopweb_final\Support\WhereSupport;
use App\Shopweb_final\User\Repositories\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartRepositories
{

    public function __construct(UserRepositories $UserRepositories)
    {
        $this->UserRepositories = $UserRepositories;


    }

    public function insertGoodsInCart($input)
    {
        DB::table('carts')
            ->insert([
                'size' => $input['size'],
                'quantity' => $input['quantity'],
                'goodsId'=>$input['goodsId'],
                'user_id' => $input['user_id']
            ]);

    }

    public function getUserCart($id)
    {

        $data= Cart::where('user_id', $id)
            ->leftJoin('goods','carts.goodsId','=','goods.id')
            ->select('goods.photo1','goods.goodsname1','goods.price','carts.size','carts.quantity','carts.id')
            ->paginate(5);
        return $data;
    }

    public function deleteGoodsInCart($id)
    {

        $userId = $this->UserRepositories->getUserId();
        DB::table('carts')->where('user_id', $userId)->where('id', $id)->delete();

    }
    public function deleteAllGoodsInCart($userId)
    {
        Cart::where('user_id',$userId)->delete();

    }


}
