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
            $table->double('price');
            $table->dateTime('order_datetime');
            $table->dateTime('dispatch_datetime')->nullable();
            $table->text('dispatch_place');
            $table->text('remark')->nullable();
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_order');
    }
}
