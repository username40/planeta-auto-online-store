<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertyValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::drop('product_property');
        Schema::create('product_property_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('property_value_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('property_value_id')->references('id')->on('property_values')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_property_value', function (Blueprint $table) {
            $table->dropForeign('product_property_value_product_id_foreign');
            $table->dropForeign('product_property_value_property_value_id_foreign');
        });
        Schema::dropIfExists('product_property_value');
    }
}
