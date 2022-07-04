<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 255);
            $table->decimal('product_rate', 65, 2);
            $table->decimal('product_quantity', 65, 2);
            $table->string('product_unit', 255);
            $table->string('product_brand', 255);
            $table->string('product_status', 255);
            $table->decimal('product_warn', 60, 2);
            $table->date('product_date');
            $table->integer('product_check');
            $table->integer('product_check_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
