<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        return $this->middleware('dashboard');
    }

    public function order_index(){
        $order_show=DB::table('orders')->leftJoin('users','user_id','=','users.id')
            ->select('users.name','users.id','orders.order_id','orders.created_at','orders.total')
            ->distinct('orders.order_id')->get();
        return view('admin.dashboard.index',['data'=>$order_show]);

    }
    public function goods_create(){



    return view('admin.posts.create');
}

public function goods_create1(Request $request){

    $name1=iconv("UTF-8","BIG-5",$_FILES['photo1']['name']);//更改編碼 以免遇到中文字存取不了
    $file=explode(".",$name1); //將檔案名稱和檔案類型逕行分隔微陣列[0],[1]
    $new_name=$file[0]."-".date('ymdhis')."-".rand(0,10);//陣列[0]為檔名
    $chi_name=iconv("BIG-5","UTF-8",$new_name);//新檔名為=舊檔名-時間-隨機1~10數字.舊檔案名稱的類型

    $name2=iconv("UTF-8","BIG-5",$_FILES['photo2']['name']);
    $file2=explode(".",$name2);
    $new_name2=$file2[0]."-".date('ymdhis')."-".rand(0,10);
    $chi_name2=iconv("BIG-5","UTF-8",$new_name2);

    $creat= new Good();//使用Good物件存商品資訊進Good資料表
    $creat->price=$request->price;
    $creat->goodsname1=$request->goodsname1;
    $creat->photo1=$chi_name;
    $creat->photo2=$chi_name2;
    $creat->type=$request->type;
    $creat->save();
    $destinationPath = public_path().'/img/product-img';
   $request->file('photo1')->move($destinationPath,$chi_name);
    $request->file('photo2')->move($destinationPath,$chi_name2);

    return redirect(route('AdminDashboardController_goods_create'))->with('message','新增成功');
}
public function goods_show()
{
$show=DB::table('goods')->get();
return view('admin.posts.goods_show',['data'=>$show]);
}

public function goods_delete($id)
{
    Good::destroy($id);

    return redirect(route('AdminDashboardController_goods_show'))->with('message','刪除成功');


}

public function order_delete($id)
{
    Order::where('order_id','=',$id)->delete();

    return redirect(route('AdminDashboardController_order_index'))->with('message','刪除成功');

}



}
