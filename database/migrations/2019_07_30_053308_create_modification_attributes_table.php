<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modification_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('auto_modification_id');
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
        Schema::dropIfExists('modification_attributes');
    }
}
