<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->index('guid');
            $table->string('name')->nullable()->change();
            $table->string('description')->after('slug')->comment('Описание')->nullable();
            $table->boolean('is_active')->default(1)->comment('Активный');
            $table->unsignedBigInteger('parent_id')->nullable()->change();
            $table->integer('order')->default(0)->comment('Порядок для сортировки')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_guid_index');
            $table->dropColumn('description');
        });
    }
}
