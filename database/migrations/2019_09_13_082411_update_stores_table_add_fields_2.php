<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStoresTableAddFields2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function(Blueprint $table) {
            $table->json('delivery_schedule')->nullable()->comment('Расписание доставок');
        });

        Schema::table('departments', function(Blueprint $table) {
            $table->json('delivery_schedule')->nullable()->comment('Расписание доставок');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function(Blueprint $table) {
            $table->dropColumn('delivery_schedule');
        });

        Schema::table('departments', function(Blueprint $table) {
            $table->dropColumn('delivery_schedule');
        });
    }
}
