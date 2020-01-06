<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_department', function (Blueprint $table) {
            $table->unsignedBigInteger('action_id');
            $table->index('action_id');
            $table->foreign('action_id')->references('id')->on('actions');

            $table->unsignedInteger('department_id');
            $table->index('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_department', function (Blueprint $table) {
            $table->dropForeign('action_department_action_id_foreign');
            $table->dropForeign('action_department_department_id_foreign');
        });
        Schema::dropIfExists('action_department');
    }
}
