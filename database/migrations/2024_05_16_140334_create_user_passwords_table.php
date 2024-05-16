<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('user_passwords', function (Blueprint $table) {
        $table->id('passwordId');
        $table->unsignedBigInteger('user_id');
        $table->string('first_pass');
        $table->string('second_pass')->nullable();
        $table->timestamps();
    });

    // Adding foreign key in a separate statement
    Schema::table('user_passwords', function (Blueprint $table) {
        $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_passwords');
    }
}