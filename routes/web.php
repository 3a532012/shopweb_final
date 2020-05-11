<?php
use App\Good;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//基本標籤列的連結
Route::get('/', function () {
    return view('blog');
})->name('index');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('about', function () {
    return view('regular-page');
})->name('about');




Route::get('ooddr','CartController@ooddr')->name('ooddr');

//不用登入就能使用的路由
Route::get('shop','GoodController@show_all')->name('shop');//購物首頁
Route::get('show_shortsleeve','GoodController@show_shortsleeve')->name('show_shortsleeve');//顯示短袖
Route::get('show_longsleeve','GoodController@show_longsleeve')->name('show_longsleeve');//顯示長袖
Route::get('show_trousers','GoodController@show_trousers')->name('show_trousers');//顯示長褲
Route::get('show_shortpants','GoodController@show_shortpants')->name('show_shortpants');//顯示短褲
Route::get('show_coat','GoodController@show_coat')->name('show_coat');//顯示外套
Route::get('search','GoodController@search')->name('search');//顯示查詢結果
Route::get('details/{id}','GoodController@details')->name('details');//顯示商品details



//購物車路由
Route::group(['prefix' => 'membership'], function() {
    Route::post('cart_add/{id}', 'CartController@add')->name('cart_add');//購物車新增商品功能
    Route::get('cart_show', 'CartController@show')->name('cart_show');//顯示購物車內容物
    Route::delete('cart_delete/{id}', 'CartController@delete')->name('cart_delete');//刪除購物車內容物功能
    Route::get('checkout', 'CartController@checkout')->name('checkout');//結帳功能
    Route::get('order_show', 'CartController@order_show')->name('order_show');//顯示已下單的訂單(不包含訂單為空)
    Route::get('order_show1', 'CartController@order_show1')->name('order_show1');//顯示已下單的訂單

    Route::get('order_create', 'CartController@order_create')->name('order_create');//訂單建立功能
    Route::get('order_detail/{id}', 'CartController@order_detail')->name('order_detail');//訂單details
});


//會員路由,註冊,登入
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//中介層auth,guest所使用的route



//後台路由,必須為使用者才可進入
Route::group(['prefix' => 'admin'], function() {
Route::get('AdminDashboard.order_index','AdminDashboardController@order_index')->name('AdminDashboardController_order_index');//訂單管理頁面
Route::delete('AdminDashboard.order_delete/{id}','AdminDashboardController@order_delete')->name('AdminDashboardController_order_delete');//訂單刪除功能
Route::get('AdminDashboard.goods_create','AdminDashboardController@goods_create')->name('AdminDashboardController_goods_create');//顯示商品新增頁面
Route::post('AdminDashboard.goods_create1','AdminDashboardController@goods_create1')->name('AdminDashboardController_goods_create1');//處理商品新增功能
Route::get('AdminDashboard.goods_show','AdminDashboardController@goods_show')->name('AdminDashboardController_goods_show');//顯示已新增的商品
Route::delete('AdminDashboard.goods_delete/{id}','AdminDashboardController@goods_delete')->name('AdminDashboardController_goods_delete');//刪除功能,可使已新增之商品進行刪除
});




        Route::get('{provider}/redirect',[
            'as' => 'social.redirect',
            'uses' => 'SocialController@getSocialRedirect'
        ]);
        Route::get('{provider}/callback',[
            'as' => 'social.handle',
            'uses' => 'SocialController@getSocialCallback'
        ]);













Route::get('/qq',function (){
    $first=new \App\Good;
    $first->price=60;
    $first->goodsname1='黑長袖';
    $first->goodsname2='blacklongsleeve';
    $first->photo1='longsleeve1';
    $first->photo2='longsleeve1-1';
    $first->type='longsleeve';
    $first->save();

    $first1=new \App\Good();
    $first1->price=70;
    $first1->goodsname1='咖啡長袖';
    $first1->goodsname2='brownlongsleeve';
    $first1->photo1='longsleeve2';
    $first1->photo2='longsleeve2-2';
    $first1->type='longsleeve';
    $first1->save();

    $first3=new \App\Good();
    $first3->price=80;
    $first3->goodsname1='白長袖';
    $first3->goodsname2='whitelongsleeve';
    $first3->photo1='longsleeve3';
    $first3->photo2='longsleeve3-3';
    $first3->type='longsleeve';
    $first3->save();

    $first4=new \App\Good();
    $first4->price=90;
    $first4->goodsname1='酒紅長袖';
    $first4->goodsname2='redwinelongsleeve';
    $first4->photo1='longsleeve4';
    $first4->photo2='longsleeve4-4';
    $first4->type='longsleeve';
    $first4->save();

    $first5=new \App\Good();
    $first5->price=100;
    $first5->goodsname1='紅長袖';
    $first5->goodsname2='redlongsleeve';
    $first5->photo1='longsleeve5';
    $first5->photo2='longsleeve5-5';
    $first5->type='longsleeve';
    $first5->save();
//-----------------------------------------------------------------------------------------//
    $first6=new \App\Good();
    $first6->price=60;
    $first6->goodsname1='黑短袖';
    $first6->goodsname2='blackshortsleeve';
    $first6->photo1='shortsleeve1';
    $first6->photo2='shortsleeve1-1';
    $first6->type='shortsleeve';
    $first6->save();

    $first7=new \App\Good();
    $first7->price=70;
    $first7->goodsname1='黃短袖';
    $first7->goodsname2='yellowshortsleeve';
    $first7->photo1='shortsleeve2';
    $first7->photo2='shortsleeve2-2';
    $first7->type='shortsleeve';
    $first7->save();

    $first8=new \App\Good();
    $first8->price=80;
    $first8->goodsname1='條紋短袖';
    $first8->goodsname2='stripeshortsleeve';
    $first8->photo1='shortsleeve3';
    $first8->photo2='shortsleeve3-3';
    $first8->type='shortsleeve';
    $first8->save();

    $first9=new \App\Good();
    $first9->price=90;
    $first9->goodsname1='白短袖';
    $first9->goodsname2='whiteshortsleeve';
    $first9->photo1='shortsleeve4';
    $first9->photo2='shortsleeve4-4';
    $first9->type='shortsleeve';
    $first9->save();

    $first10=new \App\Good();
    $first10->price=100;
    $first10->goodsname1='咖啡短袖';
    $first10->goodsname2='brownshortsleeve';
    $first10->photo1='shortsleeve5';
    $first10->photo2='shortsleeve5-5';
    $first10->type='shortsleeve';
    $first10->save();

    //----------------------------------------------------------------------------------//

    $first11=new \App\Good();
    $first11->price=60;
    $first11->goodsname1='綠色長褲';
    $first11->goodsname2='greentrousers';
    $first11->photo1='trousers1';
    $first11->photo2='trousers1-1';
    $first11->type='trousers';
    $first11->save();

    $first12=new \App\Good();
    $first12->price=70;
    $first12->goodsname1='白色長褲';
    $first12->goodsname2='whitetrousers';
    $first12->photo1='trousers2';
    $first12->photo2='trousers2-2';
    $first12->type='trousers';
    $first12->save();

    $first13=new \App\Good();
    $first13->price=80;
    $first13->goodsname1='運動長褲';
    $first13->goodsname2='sporttrousers';
    $first13->photo1='trousers3';
    $first13->photo2='trousers3-3';
    $first13->type='trousers';
    $first13->save();

    $first14=new \App\Good();
    $first14->price=90;
    $first14->goodsname1='藍色長褲';
    $first14->goodsname2='bluetrousers';
    $first14->photo1='trousers4';
    $first14->photo2='trousers4-4';
    $first14->type='trousers';
    $first14->save();

    $first15=new \App\Good();
    $first15->price=100;
    $first15->goodsname1='灰色長褲';
    $first15->goodsname2='graytrousers';
    $first15->photo1='trousers5';
    $first15->photo2='trousers5-5';
    $first15->type='trousers';
    $first15->save();

    //------------------------------------------------------------------------------//
    $first16=new \App\Good();
    $first16->price=60;
    $first16->goodsname1='黑色短褲';
    $first16->goodsname2='blackshortpants';
    $first16->photo1='shortpants1';
    $first16->photo2='shortpants1-1';
    $first16->type='shortpants';
    $first16->save();

    $first17=new \App\Good();
    $first17->price=70;
    $first17->goodsname1='藍色短褲';
    $first17->goodsname2='blueshortpants';
    $first17->photo1='shortpants2';
    $first17->photo2='shortpants2-2';
    $first17->type='shortpants';
    $first17->save();

    $first18=new \App\Good();
    $first18->price=80;
    $first18->goodsname1='灰色短褲';
    $first18->goodsname2='grayshortpants';
    $first18->photo1='shortpants3';
    $first18->photo2='shortpants3-3';
    $first18->type='shortpants';
    $first18->save();

    $first19=new \App\Good();
    $first19->price=90;
    $first19->goodsname1='條紋短褲';
    $first19->goodsname2='stripeshortpants';
    $first19->photo1='shortpants4';
    $first19->photo2='shortpants4-4';
    $first19->type='shortpants';
    $first19->save();

    $first20=new \App\Good();
    $first20->price=100;
    $first20->goodsname1='黑色短褲';
    $first20->goodsname2='blackshortpants';
    $first20->photo1='shortpants5';
    $first20->photo2='shortpants5-5';
    $first20->type='shortpants';
    $first20->save();

    //--------------- -----------------------------------------------------------------------//

    $first21=new \App\Good();
    $first21->price=60;
    $first21->goodsname1='白色外套';
    $first21->goodsname2='whitecoat';
    $first21->photo1='coat1';
    $first21->photo2='coat1-1';
    $first21->type='coat';
    $first21->save();


    $first22=new \App\Good();
    $first22->price=70;
    $first22->goodsname1='黑色外套';
    $first22->goodsname2='blackcoat';
    $first22->photo1='coat2';
    $first22->photo2='coat2-2';
    $first22->type='coat';
    $first22->save();

    $first23=new \App\Good();
    $first23->price=80;
    $first23->goodsname1='藍色外套';
    $first23->goodsname2='bluecoat';
    $first23->photo1='coat3';
    $first23->photo2='coat3-3';
    $first23->type='coat';
    $first23->save();

    $first24=new \App\Good();
    $first24->price=90;
    $first24->goodsname1='灰色外套';
    $first24->goodsname2='graycoat';
    $first24->photo1='coat4';
    $first24->photo2='coat4-4';
    $first24->type='coat';
    $first24->save();

    $first25=new \App\Good();
    $first25->price=100;
    $first25->goodsname1='粉色外套';
    $first25->goodsname2='pinkcoat';
    $first25->photo1='coat5';
    $first25->photo2='coat5-5';
    $first25->type='coat';
    $first25->save();
    return view('blog');



});
