<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishTransformNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_transform_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('top_category_id');
            $table->string('image');
            $table->string('heading');
            $table->text('short_desc');
            $table->text('long_desc');
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
        Schema::dropIfExists('english_transform_news');
    }
}
