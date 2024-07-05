<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
            $table->renameColumn('id', 'commentId');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->renameColumn('commentId', 'id');
        });
    }
}