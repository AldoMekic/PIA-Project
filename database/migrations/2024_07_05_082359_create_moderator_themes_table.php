<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeratorThemesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('moderator_themes');

        Schema::create('moderator_themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('moderator_id');
            $table->unsignedBigInteger('theme_id');
            $table->timestamps();

            $table->foreign('moderator_id')->references('moderatorId')->on('moderators')->onDelete('cascade');
            $table->foreign('theme_id')->references('themeId')->on('themes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('moderator_themes');
    }
}