<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoModificationAutoEngineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_engine_auto_modification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('auto_modification_id');
            $table->unsignedBigInteger('auto_engine_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_engine_auto_modification');
    }
}
