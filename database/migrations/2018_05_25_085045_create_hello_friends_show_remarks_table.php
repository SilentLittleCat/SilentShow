<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelloFriendsShowRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hello_friends_show_remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fa_id')->nullable();
            $table->string('fuId', 200)->nullable();
            $table->unsignedInteger('article_id')->nullable();
            $table->string('content', 200)->nullable();
            $table->string('back_user_id', 200)->nullable();
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
        Schema::dropIfExists('hello_friends_show_remarks');
    }
}
