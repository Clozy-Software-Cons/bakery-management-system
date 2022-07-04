<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemUsedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_used', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 255);
            $table->decimal('product_quantity', 65, 2);
            $table->string('product_unit', 255);
            $table->string('product_brand', 255);
            $table->date('product_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_useds');
    }
}
