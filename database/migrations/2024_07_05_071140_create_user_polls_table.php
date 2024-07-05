<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPollsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('user_polls');

        Schema::create('user_polls', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('poll_id');

            $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('poll_id')->references('pollID')->on('polls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_polls');
    }
}