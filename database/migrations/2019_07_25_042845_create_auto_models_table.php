<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tecdoc_id')->nullable();
            $table->unsignedInteger('auto_mark_id');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('description')->nullable();
            $table->string('full_description')->nullable();
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
        Schema::dropIfExists('auto_models');
    }
}
