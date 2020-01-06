<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso')->nullable()->comment('iso');
            $table->string('country')->comment('Страна');
            $table->string('name_en')->comment('Имя на английском');
            $table->string('name_ru')->comment('Имя на русском');
            $table->string('timezone')->comment('Временная зона');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->comment('sypexgeo ID');
            $table->unsignedInteger('region_id')->comment('ИД Региона');
            $table->string('name_en')->comment('Имя на английском');
            $table->string('name_ru')->comment('Имя на русском');
            $table->float('lat')->comment('Широта');
            $table->float('lon')->comment('Долгота');
            $table->index('region_id', 'region_id_key');
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
        Schema::dropIfExists('cities');
        Schema::dropIfExists('regions');
    }
}
