<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EduUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_users', function (Blueprint $table) {
            $table->bigIncrements('rollno');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('uset_type');
            $table->string('signup_source');
            $table->string('signup_date');
            $table->string('last_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('edu_users');
    }
}
