<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/HelloFriends/getLearnFun', 'HelloFriendsController@getLearnFun');
    Route::get('/HelloFriends/getLearnFuns', 'HelloFriendsController@getLearnFuns');

    Route::get('/HelloFriends/login', 'HelloFriendsController@login');

    Route::post('/HelloFriends/updateUser', 'HelloFriendsController@updateUser');

    Route::post('/HelloFriends/sendLearnFunRemark', 'HelloFriendsController@sendLearnFunRemark');

    Route::get('/HelloFriends/getNewsAndTalks', 'HelloFriendsController@getNewsAndTalks');

    Route::get('/HelloFriends/getMoreNewsOrTalks', 'HelloFriendsController@getMoreNewsOrTalks');
});
