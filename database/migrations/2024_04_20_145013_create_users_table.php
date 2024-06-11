<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('name');
            $table->string('surname');
            $table->char('gender', 1); // M or F
            $table->string('birthplace');
            $table->dateTime('date_of_birth');
            $table->string('jmbg');
            $table->string('phone_num');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}