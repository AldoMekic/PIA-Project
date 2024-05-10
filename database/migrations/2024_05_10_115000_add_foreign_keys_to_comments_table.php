<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Check if the user_id column exists before adding it
            if (!Schema::hasColumn('comments', 'user_id')) {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }

            // Check if the post_id column exists before adding it
            if (!Schema::hasColumn('comments', 'post_id')) {
                $table->unsignedBigInteger('post_id');
                $table->foreign('post_id')->references('postID')->on('posts')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Drop foreign key for user_id
            $table->dropForeign(['user_id']);

            // Drop foreign key for post_id
            $table->dropForeign(['post_id']);

            // Drop columns
            $table->dropColumn(['user_id', 'post_id']);
        });
    }
}