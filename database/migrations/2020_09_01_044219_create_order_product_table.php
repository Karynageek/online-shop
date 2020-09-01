<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('order_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');

            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->index('order_id');
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->index('product_id');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->integer('quantity')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order_product');
    }

}
