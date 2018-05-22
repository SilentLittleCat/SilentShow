<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelloFriendsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hello_friends_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openId', 200)->nullable();
            $table->string('fuId', 200)->nullable();
            $table->string('nickName', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('province', 200)->nullable();
            $table->string('country', 200)->nullable();
            $table->string('avatarUrl', 200)->nullable();
            $table->string('unionId', 200)->nullable();
            $table->string('appid', 200)->nullable();
            $table->timestamp('wx_timestamp')->nullable();
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
        Schema::dropIfExists('hello_friends_users');
    }
}
