<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('brand_id');
            $table->boolean('is_active')->default(1)->comment('Активный');
            $table->string('guid')->comment('ИД 1с');
            $table->index('guid');

            $table->foreign('brand_id')->references('id')->on('brands');

            $table->index('brand_id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
//            $table->string('img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
