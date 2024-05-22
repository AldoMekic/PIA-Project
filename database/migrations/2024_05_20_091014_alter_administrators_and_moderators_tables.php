<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAdministratorsAndModeratorsTables extends Migration
{
    public function up()
    {
        // Alter administrators table
        Schema::table('administrators', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('adminId');
            $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
        });

        // Alter moderators table
        Schema::table('moderators', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('moderatorId');
            $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Revert changes
        Schema::table('administrators', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('moderators', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}