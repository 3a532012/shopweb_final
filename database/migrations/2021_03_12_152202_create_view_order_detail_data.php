<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewOrderDetailData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName='viewOrderDetailData';

    public function up()
    {
        DB::statement($this->createView($this->tableName));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView($this->tableName));
    }

    private function createView($tableName): string
    {

        return <<< SQL
            CREATE OR REPLACE VIEW $tableName AS
                SELECT goods.photo1,goods.goodsname1,goods.price,carts.quantity,carts.size,users.name,carts.orders_id
                from `carts`
                    left join `goods` on `carts`.`goodsId` = `goods`.`id`
                    left join `users` on `carts`.`user_id` = `users`.`id`
                where `carts`.`deleted_at` is not null
SQL;

    }

    private function dropView($tableName): string
    {

        return <<< SQL
            DROP VIEW IF EXISTS $tableName;
SQL;

    }
}
