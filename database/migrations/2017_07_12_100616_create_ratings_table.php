<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->nullable();
            $table->integer('comment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('vote')->nullable();
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
        //
        Schema::dropIfExists('ratings');
    }
}