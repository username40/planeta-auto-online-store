<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefilters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('modification_id');
            $table->unsignedInteger('property_id');
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
        Schema::dropIfExists('prefilters');
    }
}
