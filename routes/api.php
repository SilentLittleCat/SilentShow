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
    Route::post('/HelloFriends/sendHotTalkRemark', 'HelloFriendsController@sendHotTalkRemark');
    Route::post('/HelloFriends/sendTravelRemark', 'HelloFriendsController@sendTravelRemark');
    Route::post('/HelloFriends/sendGoNowRemark', 'HelloFriendsController@sendGoNowRemark');
    Route::post('/HelloFriends/sendLoveRemark', 'HelloFriendsController@sendLoveRemark');
    Route::post('/HelloFriends/sendGoNow', 'HelloFriendsController@sendGoNow');
    Route::post('/HelloFriends/sendLove', 'HelloFriendsController@sendLove');

    Route::get('/HelloFriends/getNewsAndTalks', 'HelloFriendsController@getNewsAndTalks');

    Route::get('/HelloFriends/getTravelsAndGoNow', 'HelloFriendsController@getTravelsAndGoNow');

    Route::get('/HelloFriends/getHotTalk', 'HelloFriendsController@getHotTalk');
    Route::get('/HelloFriends/getTravel', 'HelloFriendsController@getTravel');
    Route::get('/HelloFriends/getGoNow', 'HelloFriendsController@getGoNow');
    Route::get('/HelloFriends/getLove', 'HelloFriendsController@getLove');

    Route::get('/HelloFriends/getMoreNewsOrTalks', 'HelloFriendsController@getMoreNewsOrTalks');
    Route::get('/HelloFriends/getMoreTravelsOrGoNow', 'HelloFriendsController@getMoreTravelsOrGoNow');
    Route::get('/HelloFriends/refreshGoNow', 'HelloFriendsController@refreshGoNow');

    Route::get('/HelloFriends/getMoreLoves', 'HelloFriendsController@getMoreLoves');
    Route::get('/HelloFriends/addLoveNumber', 'HelloFriendsController@addLoveNumber');
});
