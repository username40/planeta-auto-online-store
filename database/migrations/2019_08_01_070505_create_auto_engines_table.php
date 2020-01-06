<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_engines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tecdoc_id')->nullable();
            $table->string('name');
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
        Schema::dropIfExists('auto_engines');
    }
}
