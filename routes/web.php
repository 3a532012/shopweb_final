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
















