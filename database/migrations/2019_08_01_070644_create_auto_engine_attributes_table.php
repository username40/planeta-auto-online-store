<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoEngineAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_engine_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('auto_engine_id');
            $table->unsignedInteger('attribute_group_id');
            $table->unsignedInteger('attribute_type_id');
            $table->string('name');
            $table->string('value');
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
        Schema::dropIfExists('auto_engine_attributes');
    }
}
