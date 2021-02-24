<?php


namespace App\Shopweb_final\Goods\Service;


use App\Good;

class GoodsService
{
    public function __construct()
    {
    }

    public function findGoodsById($id)
    {
       return Good::where('id','=',$id)->first();

    }
}
