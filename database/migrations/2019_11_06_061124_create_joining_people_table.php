<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoiningPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joining_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('f_name', 191);
            $table->string('l_name', 191);
            $table->string('email', 191)->nullable();
            $table->string('phone', 191);
            $table->string('address_1', 191);
            $table->string('address_2', 191)->nullable();
            $table->string('dist', 191);
            $table->string('state', 191);
            $table->string('zip', 191);
            $table->string('country', 191);
            $table->string('dob', 191);
            $table->string('gender', 191);
            $table->string('hear', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joining_people');
    }
}
