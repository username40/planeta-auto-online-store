<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('page_type_id')->default(1);
            $table->unsignedInteger('user_id');
            $table->integer('order')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->boolean('archive')->default(0);
            $table->boolean('show')->default(1);
            $table->dateTime('publicated_at');
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
