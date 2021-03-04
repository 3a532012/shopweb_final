<?php


namespace App\Shopweb_final\Goods\Repositories;


use App\Good;
use Illuminate\Support\Facades\DB;

class GoodsRepositories
{

    public function __construct()
    {
    }

    public function getGoodsById($id)
    {
       $vaule= Good::where('id','=',$id)->first();;
       return $vaule;
    }
}
