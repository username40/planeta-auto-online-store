<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutoForeignAndIndexFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->dropForeign('auto_engine_attributes_attribute_group_id_foreign');
            $table->dropForeign('auto_engine_attributes_attribute_type_id_foreign');
            $table->foreign('attribute_group_id')->references('id')->on('auto_engine_attribute_groups');
            $table->foreign('attribute_type_id')->references('id')->on('auto_engine_attribute_types');
        });

        Schema::table('auto_engines', function (Blueprint $table) {
            $table->index('tecdoc_id');
        });

        Schema::table('auto_modifications', function (Blueprint $table) {
            $table->index('tecdoc_id');
            $table->index(['tecdoc_id', 'auto_model_id']);
            $table->unsignedInteger('xml_auto_id')->nullable()->comment('ИД авто из xml');
        });

        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->index(['name', 'value', 'auto_engine_id', 'attribute_group_id', 'attribute_type_id'], 'parser_index');
        });

        Schema::table('auto_models', function (Blueprint $table) {
            $table->index(['tecdoc_id', 'auto_mark_id']);
            $table->date('date_start')->nullable()->change();
        });


        Schema::table('modification_product', function (Blueprint $table) {
            $table->unsignedBigInteger('modification_id')->change();
            $table->unsignedBigInteger('product_id')->change();
            $table->dropColumn(['id', 'created_at', 'updated_at']);
            $table->foreign('modification_id')->references('id')->on('auto_modifications');
            $table->foreign('product_id')->references('id')->on('products');
        });

        DB::statement('ALTER TABLE auto_models ADD FULLTEXT fulltext_index (description)');
        DB::statement('ALTER TABLE auto_modifications ADD FULLTEXT fulltext_index (description)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->dropForeign('auto_engine_attributes_attribute_group_id_foreign');
            $table->dropForeign('auto_engine_attributes_attribute_type_id_foreign');
            $table->foreign('attribute_group_id')->references('id')->on('auto_engine_attribute_groups');
            $table->foreign('attribute_type_id')->references('id')->on('auto_engine_attribute_types');
        });

        Schema::table('auto_engines', function (Blueprint $table) {
            $table->dropIndex(['tecdoc_id']);
        });

        Schema::table('auto_modifications', function (Blueprint $table) {
            $table->dropIndex(['tecdoc_id', 'auto_model_id']);
            $table->dropIndex(['tecdoc_id']);
            $table->dropIndex('fulltext_index');
            $table->dropColumn('xml_auto_id');
        });

        Schema::table('auto_engine_attributes', function (Blueprint $table) {
            $table->dropIndex('parser_index');
        });

        Schema::table('modification_product', function (Blueprint $table) {
            $table->dropForeign('modification_product_modification_id_foreign');
            $table->dropForeign('modification_product_product_id_foreign');
        });

        Schema::table('modification_product', function (Blueprint $table) {
            $table->unsignedInteger('modification_id')->change();
            $table->unsignedInteger('product_id')->change();
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('auto_models', function (Blueprint $table) {
            $table->dropIndex(['tecdoc_id', 'auto_mark_id']);
            $table->date('date_start')->change();
            $table->dropIndex('fulltext_index');
        });
    }
}
