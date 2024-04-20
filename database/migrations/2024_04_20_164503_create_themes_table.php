<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id('themeId');
            $table->string('name');
            $table->string('description');
            $table->integer('followers')->default(0);
            $table->integer('posts')->default(0);
            $table->timestamps();
        });

        // Pivot table for Themes and Users
        Schema::create('theme_user', function (Blueprint $table) {
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('theme_id')->references('themeId')->on('themes')->onDelete('cascade');
            $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
            $table->primary(['theme_id', 'user_id']);
        });

        // Adding a foreign key column to the posts table
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->foreign('theme_id')->references('themeId')->on('themes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('theme_user');
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['theme_id']);
            $table->dropColumn('theme_id');
        });
        Schema::dropIfExists('themes');
    }
}