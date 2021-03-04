<?php


namespace App\Shopweb_final\Goods\Service;


use App\Good;
use App\Shopweb_final\Goods\Repositories\GoodsRepositories;

class GoodsService
{
    public function __construct(GoodsRepositories $GoodsRepositories)
    {
        $this->GoodsRepositories=$GoodsRepositories;
    }

    public function findGoodsById($id)
    {
       return $this->GoodsRepositories->getGoodsById($id);


    }

}
