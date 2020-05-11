<a href="https://imgur.com/Sn3lDsa"><img src="https://i.imgur.com/Sn3lDsa.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/eqVRozJ"><img src="https://i.imgur.com/eqVRozJ.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/l2WHFKx"><img src="https://i.imgur.com/l2WHFKx.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/QdXzD9r"><img src="https://i.imgur.com/QdXzD9r.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/YVm8N3F"><img src="https://i.imgur.com/YVm8N3F.jpg" title="source: imgur.com" /></a>
<a href="https://imgur.com/OUQd7iF"><img src="https://i.imgur.com/OUQd7iF.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/OmZg4pE"><img src="https://i.imgur.com/OmZg4pE.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/YAUmaNy"><img src="https://i.imgur.com/YAUmaNy.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/EI2jgum"><img src="https://i.imgur.com/EI2jgum.jpg?1" title="source: imgur.com" /></a>
<a href="https://imgur.com/PqNE85k"><img src="https://i.imgur.com/PqNE85k.jpg?1" title="source: imgur.com" /></a>

## 衣服商城購物車系統
## 網站功能
//不用登入就能使用的路由</br>
Route::get('shop','GoodController@show_all')->name('shop');//購物首頁
Route::get('show_shortsleeve','GoodController@show_shortsleeve')->name('show_shortsleeve');//顯示短袖
Route::get('show_longsleeve','GoodController@show_longsleeve')->name('show_longsleeve');//顯示長袖
Route::get('show_trousers','GoodController@show_trousers')->name('show_trousers');//顯示長褲
Route::get('show_shortpants','GoodController@show_shortpants')->name('show_shortpants');//顯示短褲
Route::get('show_coat','GoodController@show_coat')->name('show_coat');//顯示外套
Route::get('search','GoodController@search')->name('search');//顯示查詢結果
Route::get('details/{id}','GoodController@details')->name('details');//顯示商品details

//購物車路由</br>
Route::group(['prefix' => 'membership'], function() {</br>
    Route::post('cart_add/{id}', 'CartController@add')->name('cart_add');//購物車新增商品功能</br>
    Route::get('cart_show', 'CartController@show')->name('cart_show');//顯示購物車內容物</br>
    Route::delete('cart_delete/{id}', 'CartController@delete')->name('cart_delete');//刪除購物車內容物功能</br>
    Route::get('checkout', 'CartController@checkout')->name('checkout');//結帳功能</br>
    Route::get('order_show', 'CartController@order_show')->name('order_show');//顯示已下單的訂單(不包含訂單為空)</br>
    Route::get('order_show1', 'CartController@order_show1')->name('order_show1');//顯示已下單的訂單</br>
    Route::get('order_create', 'CartController@order_create')->name('order_create');//訂單建立功能</br>
    Route::get('order_detail/{id}', 'CartController@order_detail')->name('order_detail');//訂單details</br>
});

//會員路由,註冊,登入</br>
Auth::routes();</br>
Route::get('/home', 'HomeController@index')->name('home');//中介層auth,guest所使用的route


//後台路由,必須為使用者才可進入</br>
Route::group(['prefix' => 'admin'], function() {</br>
Route::get('AdminDashboard.order_index','AdminDashboardController@order_index')->name('AdminDashboardController_order_index');//訂單管理頁面</br>
Route::delete('AdminDashboard.order_delete/{id}','AdminDashboardController@order_delete')->name('AdminDashboardController_order_delete');//訂單刪除功能</br>
Route::get('AdminDashboard.goods_create','AdminDashboardController@goods_create')->name('AdminDashboardController_goods_create');//顯示商品新增頁面</br>
Route::post('AdminDashboard.goods_create1','AdminDashboardController@goods_create1')->name('AdminDashboardController_goods_create1');//處理商品新增功能</br>
Route::get('AdminDashboard.goods_show','AdminDashboardController@goods_show')->name('AdminDashboardController_goods_show');//顯示已新增的商品</br>
Route::delete('AdminDashboard.goods_delete/{id}','AdminDashboardController@goods_delete')->name('AdminDashboardController_goods_delete');//刪除功能,可使已新增之商品進行刪除</br>
});</br>
## 網站初始專案以及樣板
套用bootstrap(網路商店模板)(http://link.zhihu.com/?target=https%3A//colorlib.com/download/1023/)</br>
後台樣板(https://startbootstrap.com/templates/simple-sidebar/)</br>
## 網站系統復原步驟
1.複製https://github.com/WISD-2019/final07-1.git本系統在GitHub的專案，打開Source tree，點選clone後，輸入以下資料</br>
--Source Path:https://github.com/WISD-2019/final07-1.git</br>
--Destination Path:C:\wagon\uwamp\www\final07-1</br>
2.打開cmder，切換至專案所在資料夾，cd final07-1</br>
--在cmder輸入以下命令，以復原此系統：</br>
--composer install</br>
--composer run‐script post‐root‐package‐install</br></br>
--composer run‐script post‐create‐project‐cmd</br>
3.將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：</br>
--DB_HOST=127.0.0.1</br>
--DB_PORT=33060</br>
--DB_DATABASE=final07-1</br>
--DB_USERNAME=root</br>
--DB_PASSWORD=root</br>
4.在cmder輸入以下命令，將所有資料表產生至final07-1資料庫內</br>
--php artisan migrate</br>
--php artisan </br>
5.開啟UwAmp，點選PHPMyAdmin，輸入以下資料後並點擊登入，進入MySQL後，建立新資料庫，名稱為final07-1，將final07-1.sql(C:\wagon\uwamp\www\final07-1\database\final07-1.sql)匯入</br>
--資料庫系統:MYSQL</br>
--伺服器:localhost:33060</br>
--帳號:root</br>
--密碼:root</br>
--進入mysql之後 把goods,cart,order欄位的
6.在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final07-1/public</br>
## 使用者帳號與後台帳號
1.前台帳號請自行申請</br>
2.後台帳號為前台帳號之延伸</br>
--進入Mysql admin頁面後</br>
--進入user資料表 將欲成為管理員使用者role欄位值改為1</br>
<a href="https://imgur.com/YI0CGYT"><img src="https://i.imgur.com/YI0CGYT.jpg" title="source: imgur.com" /></a>
--接著在前端使用者就可以在登出那裏找到通往後端的連接和權限</br>
<a href="https://imgur.com/HZGZow0"><img src="https://i.imgur.com/HZGZow0.jpg" title="source: imgur.com" /></a>
## 系統開發人員
3A532012林璟柏
