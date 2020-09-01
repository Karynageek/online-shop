<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->bigInteger('billing_phone')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_name_on_card')->nullable();
            $table->integer('billing_total');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->index('user_id');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }

}
