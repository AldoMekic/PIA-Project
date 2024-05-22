<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id('pollId');
            $table->string('author');
            $table->string('title');
            $table->string('optionOne');
            $table->string('optionTwo');
            $table->string('optionThree')->nullable();
            $table->string('optionFour')->nullable();
            $table->string('optionFive')->nullable();
            $table->integer('numOne')->default(0);
            $table->integer('numTwo')->default(0);
            $table->integer('numThree')->nullable()->default(0);
            $table->integer('numFour')->nullable()->default(0);
            $table->integer('numFive')->nullable()->default(0);
            $table->unsignedBigInteger('theme_id');
            $table->timestamps();

            $table->foreign('theme_id')->references('themeId')->on('themes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('polls');
    }
}