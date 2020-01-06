<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SmallFixes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_active')->default(0)->change();
            $table->text('description')->nullable()->change();
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->boolean('is_active')->default(0)->change();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_active')->default(0)->change();
            $table->string('code')->nullable();
            $table->string('article')->nullable();
            $table->string('market_id')->nullable();
            $table->text('description')->nullable()->change();
            $table->dropForeign('products_model_id_foreign');
            $table->dropColumn('model_id');
        });
        Schema::dropIfExists('models');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('article');
            $table->dropColumn('market_id');
            $table->unsignedBigInteger('model_id')->nullable()->comment('Ид модели');
        });
    }
}
