<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActionFieldsUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropColumn('automarkets');
            $table->dropColumn('services');
            $table->dateTime('expiration_at')->comment('Время окончания')->after('publicated_at')->nullable();
//            $table->string('group')->nullable()->comment('Группа');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->jsonb('automarkets')->nullable();
            $table->jsonb('services')->nullable();
            $table->dropColumn('expiration_at');
//            $table->dropColumn('group');
        });
    }
}
