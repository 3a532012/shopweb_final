<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;


class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $repositoryMock = null;

    public function test_Cart_add()
    {
        $this->initDatabase();
        $a=DB::table('goods')
            ->where('id',3)
            ->value('goodsname1');
        $this->loginWithFakeUser();
        $this->call('POST','membership/cart_add/3',
            ['size'=>'x','quantity'=>'10','_token'=>csrf_token()]);
        $this->assertDatabaseHas('carts',
            ['user_id'=>Auth::user()->id,
            'goodsname1'=>$a]);


    }
}
