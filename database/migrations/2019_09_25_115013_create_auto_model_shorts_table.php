<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoModelShortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_model_shorts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('full_name');
            $table->integer('auto_mark_id');
            $table->timestamps();
        });
        Schema::table('auto_models', function (Blueprint $table) {
            $table->integer('auto_model_short_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_model_shorts');
        Schema::table('auto_models', function (Blueprint $table) {
            $table->dropColumn('auto_model_short_id');
        });
    }
}
