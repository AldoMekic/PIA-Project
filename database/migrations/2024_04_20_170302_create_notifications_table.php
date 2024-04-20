<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notificationId');
            $table->string('type');
            $table->string('from');
            $table->text('content');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('moderator_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->timestamps();

            // Foreign keys pointing to the respective tables
            $table->foreign('user_id')->references('userId')->on('users')->onDelete('set null');
            $table->foreign('moderator_id')->references('moderatorId')->on('moderators')->onDelete('set null');
            $table->foreign('admin_id')->references('adminId')->on('administrators')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}