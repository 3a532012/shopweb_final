<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('size');
            $table->dropColumn('quantity');
            $table->dropColumn('goodsname1');
            $table->dropColumn('goodsname2');
            $table->dropColumn('photo1');
            $table->dropColumn('photo2');
            $table->dropColumn('type');
            $table->dropColumn('order_id');
            $table->string('orderNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
