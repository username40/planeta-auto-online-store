<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index('guid');
            $table->index('xml_id');

            $table->unsignedBigInteger('model_id')->nullable()->comment('Ид модели');
            $table->unsignedBigInteger('brand_id')->nullable()->comment('Ид бренда');
            $table->unsignedBigInteger('category_id')->nullable()->comment('Ид категории')->change();

            $table->boolean('is_active')->default(1)->comment('Активный');
            $table->string('description')->comment('Описание')->nullable();
            $table->string('name')->comment('Наименование')->nullable();

            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_guid_index');
            $table->dropIndex('products_xml_id_index');

//            $table->dropForeign('products_model_id_foreign');
            $table->dropForeign('products_brand_id_foreign');

            $table->dropColumn('model_id');
            $table->dropColumn('brand_id');
        });
    }
}
