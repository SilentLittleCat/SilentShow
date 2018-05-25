<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelloFriendsLoveHatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hello_friends_love_hates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fuId', 200)->nullable();
            $table->unsignedInteger('love_id')->nullable();
            $table->tinyInteger('kind')->nullable();
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
        Schema::dropIfExists('hello_friends_love_hates');
    }
}
