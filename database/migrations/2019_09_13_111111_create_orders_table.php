<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('guid')->comment('Внешний идентификатор')->nullable();
            $table->string('status')->comment('')->default(0);
            $table->string('phone')->comment('Телефон')->nullable();
            $table->string('email')->comment('E-Mail')->nullable();
            $table->string('delivery_address')->comment('Адреса')->nullable();

            $table->unsignedBigInteger('delivery_type_id')->comment('Тип доставки')->nullable();
            $table->unsignedBigInteger('payment_type_id')->comment('Тип оплаты')->nullable();

            // todo: check
            $table->unsignedBigInteger('store_id')->comment('Идентификатор магазина')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->comment('Идентификатор товара')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->decimal('price')->comment('Цена')->nullable();
            $table->decimal('quantity')->comment('Колличество товара')->nullable();
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_store_id_foreign');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_product_id_foreign');
            $table->dropForeign('order_items_order_id_foreign');
        });
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
}
