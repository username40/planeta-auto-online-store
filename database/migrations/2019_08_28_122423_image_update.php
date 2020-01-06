<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImageUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function(Blueprint $table)  {
            $table->string('guid')->after('id')->nullable();
            $table->string('name')->after('path')->nullable();
            $table->string('path')->nullable()->change();
            $table->unsignedBigInteger('model_id')->comment('ИД связанной модели')->nullable()->change();
            $table->string('model_type')->comment('Тип подели (класс)')->nullable()->change();;
            $table->index(['model_id', 'model_type'], 'products_model_index');
            $table->index('guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function(Blueprint $table)  {
            $table->dropColumn('guid');
            $table->dropColumn('name');
            $table->string('name')->change();
            $table->dropIndex('products_model_index');
        });
    }
}
