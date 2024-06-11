<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->dropColumn([
                'name', 
                'surname', 
                'gender', 
                'birthplace', 
                'date_of_birth', 
                'jmbg', 
                'phone_num', 
                'email'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->string('birthplace');
            $table->date('date_of_birth');
            $table->string('jmbg');
            $table->string('phone_num');
            $table->string('email');
        });
    }
}