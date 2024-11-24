<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parlour_id')->unsigned();
            $table->foreign('parlour_id')->references('id')->on('parlours')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->longText('description');
            $table->string('category');
            $table->string('duration');
            $table->float('price');
            $table->float('discount')->nullable();
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
        Schema::create('services', function (Blueprint $table) {
            $table->dropForeign(['parlour_id']);
        });
        Schema::dropIfExists('services');
    }
}
