<?php

use Illuminate\Database\Seeder;
use App\Good;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Good::class, 50)->create();
    }
}
