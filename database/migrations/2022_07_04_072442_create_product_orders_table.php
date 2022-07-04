<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->id('cust_id');
            $table->text('cust_name');
            $table->text('cust_hpn');
            $table->integer('quantity');
            $table->text('type');
            $table->text('flavour');
            $table->text('filling');
            $table->text('shape');
            $table->text('size');
            $table->text('board');
            $table->double('price');
            $table->date('order_date');
            $table->date('dispatch_date');
            $table->time('dispatch_time');
            $table->text('dispatch_day');
            $table->text('dispatch_place');
            $table->text('remark');
            $table->text('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_orders');
    }
}
