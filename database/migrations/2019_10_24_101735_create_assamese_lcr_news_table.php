<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssameseLcrNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assamese_lcr_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('top_category_id');
            $table->string('image');
            $table->string('heading')->collation('utf8_unicode_ci');
            $table->text('short_desc')->collation('utf8_unicode_ci');
            $table->text('long_desc')->collation('utf8_unicode_ci');
            $table->string('author')->collation('utf8_unicode_ci');
            $table->string('time');
            $table->integer('status')->default(1)->comment('1 = Publish, 0 = Un-Publish');
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
        Schema::dropIfExists('assamese_lcr_news');
    }
}