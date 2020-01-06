<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropertyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('use_analog')->default(0);
            $table->boolean('use_filter')->default(0);
            $table->string('type')->default('string');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('use_analog');
            $table->dropColumn('use_filter');
            $table->dropColumn('type');
        });
    }
}
