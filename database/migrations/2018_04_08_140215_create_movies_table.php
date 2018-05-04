<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->nullable()->comment('名字');
            $table->string('director', 200)->nullable()->comment('导演');
            $table->string('actor', 200)->nullable()->comment('主演');
            $table->date('date')->nullable()->comment('上映时间');
            $table->string('country', 50)->nullable()->comment('国家');
            $table->string('score', 50)->nullable()->comment('评分');
            $table->text('introduction')->nullable()->comment('简介');
            $table->string('recommend', 200)->nullable()->comment('推荐');
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
        Schema::dropIfExists('movies');
    }
}
