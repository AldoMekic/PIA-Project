<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateThemeUserTable extends Migration
{
    public function up()
    {
        // Drop the table if it already exists
        Schema::dropIfExists('theme_user');

        // Create the table again with the correct constraints
        Schema::create('theme_user', function (Blueprint $table) {
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('theme_id')->references('themeId')->on('themes')->onDelete('cascade');
            $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');

            $table->primary(['theme_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('theme_user');
    }
}