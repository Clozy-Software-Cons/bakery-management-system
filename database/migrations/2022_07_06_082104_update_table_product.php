<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->renameColumn('product_id', 'id');
            $table->renameColumn('product_name', 'name');
            $table->renameColumn('product_rate', 'price');
            $table->renameColumn('product_quantity', 'quantity');
            $table->renameColumn('product_unit', 'measure_unit');
            $table->renameColumn('product_brand', 'brand');
            $table->renameColumn('product_warn', 'warn_threshold');
            $table->timestamps();
            $table->dropColumn('product_check');
            $table->dropColumn('product_check_count');
            $table->dropColumn('product_date');
            $table->dropColumn('product_status');
        });
        Schema::rename('product', 'products');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function ($table) {
            $table->renameColumn('id', 'product_id');
            $table->renameColumn('name', 'product_name');
            $table->renameColumn('price', 'product_rate');
            $table->renameColumn('quantity', 'product_quantity');
            $table->renameColumn('measure_unit', 'product_unit');
            $table->renameColumn('brand', 'product_brand');
            $table->renameColumn('warn_threshold', 'product_warn');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');

            $table->string('product_status', 255);
            $table->date('product_date');
            $table->integer('product_check');
            $table->integer('product_check_count');
        });
        Schema::rename('products', 'product');
    }
}
