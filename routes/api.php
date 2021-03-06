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

    Route::get('/HelloFriends/login', 'HelloFriendsController@login');
    Route::post('/HelloFriends/updateUser', 'HelloFriendsController@updateUser');

    Route::get('/HelloFriends/getMoreLearns', 'HelloFriendsController@getMoreLearns');
    Route::get('/HelloFriends/getMoreTravels', 'HelloFriendsController@getMoreTravels');
    Route::get('/HelloFriends/getMoreLoves', 'HelloFriendsController@getMoreLoves');
    Route::get('/HelloFriends/getMoreDreams', 'HelloFriendsController@getMoreDreams');

    Route::get('/HelloFriends/getLearnFun', 'HelloFriendsController@getLearnFun');
    Route::get('/HelloFriends/getHotTalk', 'HelloFriendsController@getHotTalk');
    Route::get('/HelloFriends/getTravel', 'HelloFriendsController@getTravel');
    Route::get('/HelloFriends/getGoNow', 'HelloFriendsController@getGoNow');
    Route::get('/HelloFriends/getLove', 'HelloFriendsController@getLove');
    Route::get('/HelloFriends/getHero', 'HelloFriendsController@getHero');
    Route::get('/HelloFriends/getShow', 'HelloFriendsController@getShow');

    Route::post('/HelloFriends/sendLearnFunRemark', 'HelloFriendsController@sendLearnFunRemark');
    Route::post('/HelloFriends/sendHotTalkRemark', 'HelloFriendsController@sendHotTalkRemark');
    Route::post('/HelloFriends/sendTravelRemark', 'HelloFriendsController@sendTravelRemark');
    Route::post('/HelloFriends/sendGoNowRemark', 'HelloFriendsController@sendGoNowRemark');
    Route::post('/HelloFriends/sendLoveRemark', 'HelloFriendsController@sendLoveRemark');
    Route::post('/HelloFriends/sendHeroRemark', 'HelloFriendsController@sendHeroRemark');
    Route::post('/HelloFriends/sendShowRemark', 'HelloFriendsController@sendShowRemark');

    Route::post('/HelloFriends/sendGoNow', 'HelloFriendsController@sendGoNow');
    Route::post('/HelloFriends/sendLove', 'HelloFriendsController@sendLove');
    Route::post('/HelloFriends/sendHero', 'HelloFriendsController@sendHero');
    Route::post('/HelloFriends/sendShow', 'HelloFriendsController@sendShow');
    Route::get('/HelloFriends/getMoreTravelsOrGoNow', 'HelloFriendsController@getMoreTravelsOrGoNow');
    Route::get('/HelloFriends/refreshGoNow', 'HelloFriendsController@refreshGoNow');

    Route::get('/HelloFriends/addLoveNumber', 'HelloFriendsController@addLoveNumber');
});
