<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->biginteger('joke_id')->unsigned();
            $table->foreign('joke_id')->references('id')->on('jokes')->onDelete('cascade');

            $table->biginteger('juror_id')->unsigned();
            $table->foreign('juror_id')->references('id')->on('jurors')->onDelete('cascade');
            $table->integer('vote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
