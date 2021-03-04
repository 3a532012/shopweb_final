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

    public function insertGoodsInCart($input, $vaule)
    {
        DB::table('carts')
            ->insert(['price' => $vaule->price,
                'size' => $input['size'],
                'quantity' => $input['quantity'],
                'goodsname1' => $vaule->goodsname1,
                'goodsname2' => $vaule->goodsname2,
                'photo1' => $vaule->photo1,
                'photo2' => $vaule->photo2,
                'type' => $vaule->type,
                'user_id' => $input['user_id']
            ]);
        return $result = '1';

    }

    public function getUserCart($id)
    {
        return DB::table('carts')->where('user_id', $id)->paginate(5);
    }

    public function deleteGoodsInCart($id)
    {

        $userId = $this->UserRepositories->getUserId();
        Cart::where('user_id', $userId)->where('id', $id)->delete();

    }


}
