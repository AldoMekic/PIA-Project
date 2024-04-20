<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministratorsTable extends Migration
{
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->id('adminId');
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
        Schema::dropIfExists('administrators');
    }
}