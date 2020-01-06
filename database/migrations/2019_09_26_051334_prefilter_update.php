<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrefilterUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefilters', function (Blueprint $table) {
            $table->unsignedBigInteger('property_value_id')->after('property_id')->comment('ИД значение фильтра');
            $table->renameColumn('modification_id', 'auto_modification_id')->change();
        });

        Schema::table('prefilters', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_modification_id')->change();
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('property_id')->change();

            $table->index('category_id');
            $table->index('auto_modification_id');
            $table->index('property_value_id');
            $table->index('property_id');

            $table->foreign('auto_modification_id')->references('id')->on('auto_modifications');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('property_value_id')->references('id')->on('property_values');
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prefilters', function (Blueprint $table) {
            $table->dropForeign(['auto_modification_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['property_value_id']);
            $table->dropForeign(['property_id']);
        });

        Schema::table('prefilters', function (Blueprint $table) {
            $table->dropColumn('property_value_id');
            $table->dropIndex(['auto_modification_id']);
            $table->dropIndex(['category_id']);
            $table->dropIndex(['property_id']);
        });

        Schema::table('prefilters', function (Blueprint $table) {
            $table->renameColumn('auto_modification_id', 'modification_id')->change();
        });
    }
}
