<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStoresTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function(Blueprint $table) {
            $table->string('guid')->nullable();
            $table->boolean('is_pvz')->default(0)->comment('Является ли пунктом выдачи заказов');
            $table->json('schedule')->nullable()->comment('Расписание');
        });

        Schema::table('departments', function(Blueprint $table) {
            $table->string('guid')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->dropColumn('photos');

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
            $table->dropColumn('guid');
            $table->dropColumn('is_pvz');
            $table->dropColumn('schedule');
        });

        Schema::table('departments', function(Blueprint $table) {
            $table->dropColumn('store_id');
            $table->json('photos')->nullable()->comment('Массив фотографии');
            $table->dropColumn('guid');
        });
    }
}
