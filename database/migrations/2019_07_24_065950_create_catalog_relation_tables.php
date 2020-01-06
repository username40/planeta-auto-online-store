<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogRelationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('property_id');
        });

        Schema::create('product_store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('store_id');
            $table->float('price')->nullable();
            $table->float('old_price')->nullable();
            $table->unsignedInteger('quantity')->default(0);
        });

        Schema::create('product_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('property_id');
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_property');
        Schema::dropIfExists('product_store');
        Schema::dropIfExists('product_property');
    }
}
