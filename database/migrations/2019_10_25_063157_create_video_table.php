<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('langId')->comment('1 = Assamese, 2 = English');
            $table->string('title', 191)->collation('utf8_unicode_ci');
            $table->string('videoId', 191);
            $table->string('author', 191)->collation('utf8_unicode_ci');
            $table->string('time', 191);
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
        Schema::dropIfExists('video');
    }
}
