<?php

Route::middleware(['auth.silent:admin'])->group(function () {
    Route::get('/', 'IndexController@index');

    Route::get('/learn/fun/index', 'learn\FunController@index');
    Route::get('/learn/fun/create', 'learn\FunController@create');
    Route::post('/learn/fun/store', 'learn\FunController@store');
    Route::get('/learn/fun/edit', 'learn\FunController@edit');
    Route::get('/learn/fun/detail', 'learn\FunController@detail');
    Route::post('/learn/fun/update', 'learn\FunController@update');
    Route::post('/learn/fun/delete', 'learn\FunController@delete');
    Route::post('/learn/fun/deleteMany', 'learn\FunController@deleteMany');

    Route::get('/hot-talks/index', 'HotTalkController@index');
    Route::get('/hot-talks/create', 'HotTalkController@create');
    Route::post('/hot-talks/store', 'HotTalkController@store');
    Route::get('/hot-talks/edit', 'HotTalkController@edit');
    Route::get('/hot-talks/detail', 'HotTalkController@detail');
    Route::post('/hot-talks/update', 'HotTalkController@update');
    Route::post('/hot-talks/delete', 'HotTalkController@delete');
    Route::post('/hot-talks/deleteMany', 'HotTalkController@deleteMany');

    Route::get('/travels/index', 'TravelController@index');
    Route::get('/travels/create', 'TravelController@create');
    Route::post('/travels/store', 'TravelController@store');
    Route::get('/travels/edit', 'TravelController@edit');
    Route::get('/travels/detail', 'TravelController@detail');
    Route::post('/travels/update', 'TravelController@update');
    Route::post('/travels/delete', 'TravelController@delete');
    Route::post('/travels/deleteMany', 'TravelController@deleteMany');

    Route::get('/go-now/index', 'GoNowController@index');
    Route::get('/go-now/create', 'GoNowController@create');
    Route::post('/go-now/store', 'GoNowController@store');
    Route::get('/go-now/edit', 'GoNowController@edit');
    Route::get('/go-now/detail', 'GoNowController@detail');
    Route::post('/go-now/update', 'GoNowController@update');
    Route::post('/go-now/delete', 'GoNowController@delete');
    Route::post('/go-now/deleteMany', 'GoNowController@deleteMany');
});