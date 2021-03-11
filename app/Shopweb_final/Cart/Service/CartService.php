<?php
/**
 * 主要處理CartService的商業邏輯(第1行使用中文敘述整個檔案(整個class)的功能。22不建議使用英文寫註解，因為註解主要是給人看的，易懂是其目的)
 * @version (目前程式的版本，一開始為0.1.0。建議採用Major.Minor.Patch的版本命名方式，也就是Breaks.Features.Fixes。)
 * @author 林璟柏 kirs@gmail.com(程式一開始建立的原作者。第1個參數為姓名，第2個參數為email。)
 * @date 2021/03/03(程式一開始建立的日期。)
 * @since(程式的改版紀錄。第1個參數為版本號，第2個參數為修改日期，第3個參數為修改者名稱，後見加上:，再加上簡易註解。若有很多版本，就繼續加上多個@since。)
 *
 */

namespace App\Shopweb_final\Cart\Service;


/**
 * @method CartService addGoodsInCart($input, $id)
 * @method CartService getGoodsInCart()
 * @method CartService deleteGoodsInCart($id)
 */

use App\Cart;
use App\Good;
use App\Order;
use App\Shopweb_final\Goods\Repositories\GoodsRepositories;
use App\Shopweb_final\Cart\Repositories\CartRepositories;
use App\Shopweb_final\Order\Repositories\OrderRepositories;
use App\Shopweb_final\User\Repositories\UserRepositories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


/**
 * Class CartService
 * @package App\Shopweb_final\Cart\Service(描述class所屬的namespace)
 * @PROPERTY (class類別下宣告的變數）型別 ＄變數
 */

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

    /**
     * 新增商品到購物車
     * @param array $input 傳入使用者在頁面上所選取的商品資訊EX:size,quantity...
     * @param  var $id 商品ID
     * @return bool 用來測試程式時的return
     * @throw (要拋出的例外)
     * @todo (若method尚有功能未完成，可寫在@todo裡)
     * @DEPRECATED (若該API或public method即將在未來版本停用，可加上@depricated，後面加上註解，PhpStorm對於@depricated有特別的支援。)
     */
    public function addGoodsInCart($input)
    {

            $this->CartRepositories->insertGoodsInCart($input);

        return TRUE;
    }

    /**
     * 取得購物車裡的商品資訊
     * @return $date回傳商品資訊
     */

    public function getGoodsInCart()
    {

        $userId=$this->UserRepositories->getUserId();
        $date=$this->CartRepositories->getUserCart($userId);
        return $date;
    }

    /**
     * 刪除購物車裡的商品(一次一筆)
     * @param var $id 購物車裡的商品ID
     */
    public function deleteGoodsInCart($id)
    {

        $this->CartRepositories->deleteGoodsInCart($id);
    }


}
