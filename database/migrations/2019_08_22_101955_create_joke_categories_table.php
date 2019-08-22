<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJokeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joke_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->biginteger('joke_id')->unsigned();
            $table->foreign('joke_id')->references('id')->on('jokes')->onDelete('cascade');

            $table->biginteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joke_categories');
    }
}
