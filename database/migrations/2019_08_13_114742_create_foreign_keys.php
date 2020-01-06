<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('actions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedInteger('city_id')->comment('ИД Города')->change();
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_engine_id')->change();
            $table->unsignedBigInteger('attribute_group_id')->change();
            $table->unsignedBigInteger('attribute_type_id')->change();
            $table->foreign('auto_engine_id')->references('id')->on('auto_engines');
            $table->foreign('attribute_group_id')->references('id')->on('attribute_groups');
            $table->foreign('attribute_type_id')->references('id')->on('attribute_types');
        });

        Schema::table('auto_engine_auto_modification', function (Blueprint $table) {
            $table->foreign('auto_modification_id')->references('id')->on('auto_modifications')->onDelete('cascade');
            $table->foreign('auto_engine_id')->references('id')->on('auto_engines')->onDelete('cascade');
        });

        Schema::table('auto_models', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_mark_id')->change();
            $table->foreign('auto_mark_id')->references('id')->on('auto_marks');
        });

        Schema::table('auto_modifications', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_model_id')->change();
            $table->foreign('auto_model_id')->references('id')->on('auto_models');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('property_values', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->change();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('news_user_id_foreign');
        });

        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign('actions_user_id_foreign');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('departments_city_id_foreign');
        });

        //

        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->dropForeign('auto_engine_attributes_attribute_group_id_foreign');
            $table->dropForeign('auto_engine_attributes_attribute_type_id_foreign');
            $table->dropForeign('auto_engine_attributes_auto_engine_id_foreign');
        });

        Schema::table('auto_engine_auto_modification', function (Blueprint $table) {
            $table->dropForeign('auto_engine_auto_modification_auto_engine_id_foreign');
            $table->dropForeign('auto_engine_auto_modification_auto_modification_id_foreign');
        });

        Schema::table('auto_models', function (Blueprint $table) {
            $table->dropForeign('auto_models_auto_mark_id_foreign');
        });

        Schema::table('auto_modifications', function (Blueprint $table) {
            $table->dropForeign('auto_modifications_auto_model_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::table('property_values', function (Blueprint $table) {
            $table->dropForeign('property_values_property_id_foreign');
        });
    }
}
