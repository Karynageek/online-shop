<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('count')->nullable();
            $table->enum('status', ['In stock', 'On order'])->default('In stock');
            $table->bigInteger('code')->nullable();
            $table->enum('is_new', ['0', '1'])->default(0);
            $table->enum('is_recommended', ['0', '1'])->default(0);
            $table->string('description')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            $table->index('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('product');
    }

}
