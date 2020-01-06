<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->comment('ИД Города');
            $table->index('city_id', 'city_id_key');
            $table->string('address')->comment('Адрес (без города)');
            $table->string('type')->comment('Тип отделения');
            $table->index('type', 'type_key');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('email')->nullable()->comment('Email');
            $table->json('schedule')->nullable()->comment('Расписание');
            $table->text('text')->nullable()->comment('HTML текст');
            $table->json('photos')->nullable()->comment('Массив фотографии');
            $table->timestamps();
        });

        Schema::create('specializations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Название');
            $table->string('code')->comment('Уникальный код');
            $table->index('code', 'code_index');
            $table->string('img')->nullable()->comment('Изображение');
            $table->string('type')->comment('Тип');
            $table->index('type', 'type_index');
            $table->timestamps();
        });

        Schema::create('department_specialization', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('specialization_id')->unsigned();
            $table->foreign('specialization_id')->references('id')->on('specializations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_specialization', function (Blueprint $table) {
            $table->dropForeign('department_specialization_department_id_foreign');
            $table->dropForeign('department_specialization_specialization_id_foreign');
        });
        Schema::dropIfExists('departments');
        Schema::dropIfExists('specializations');
        Schema::dropIfExists('department_specialization');
    }
}
