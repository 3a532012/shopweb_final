<?php

namespace App\Http\Controllers;
use App\Good;
use App\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Integer;

class GoodController extends Controller
{
    public function show_all(){
        $data = Good::paginate(5);
        $a=Good::all()->count();


        return view('shop', ['goods' => $data,'a'=>$a]);
    }
    public function show_longsleeve(){
        $data=Good::where('type','=','長袖')->paginate(5);
        $a=Good::where('type','=','長袖')->count();


return view('shop',['goods' =>$data,'a'=>$a]);
    }
    public function show_shortsleeve(){
        $data=Good::where('type','=','短袖')->paginate(5);
        $a=Good::where('type','=','短袖')->count();

        return view('shop', ['goods' => $data,'a'=>$a]);
    }
    public function show_trousers(){
        $data=Good::where('type','=','長褲')->paginate(5);
        $a=Good::where('type','=','長褲')->count();

        return view('shop', ['goods' => $data,'a'=>$a]);
    }
    public function show_shortpants(){
        $data=Good::where('type','=','短褲')->paginate(5);
        $a=Good::where('type','=','短褲')->count();

        return view('shop', ['goods' => $data,'a'=>$a]);
    }
    public function show_coat(){
        $data=Good::where('type','=','外套')->paginate(5);
        $a=Good::where('type','=','外套')->count();

        return view('shop', ['goods' => $data,'a'=>$a]);
    }
    public function search(Request $request){
        $search = $request->input("search");
        $show=Good::where('goodsname1','like','%'.$search.'%')->paginate(5);
        $a=Good::where('goodsname1','like','%'.$search.'%')->count();

        return view('shop', ['goods' => $show,'a'=>$a,'search'=>$search]);
    }


public function details($id){

$data=Good::where('id','=',$id)->get();


return view('single-product-details',['data'=>$data]);

}


}
