<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company');
            $table->float('price');
            $table->longText('description');
            $table->integer('discount');
            $table->integer('rating');
            $table->string('img');
            $table->integer('parlour_id')->unsigned();
            $table->foreign('parlour_id')->references('id')->on('parlours')->onDelete('cascade');
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
        Schema::create('products', function (Blueprint $table) {
            $table->dropForeign(['parlour_id']);
        });
        Schema::dropIfExists('products');
    }
}
