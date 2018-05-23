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
});