<?php

Route::middleware(['auth.silent:admin'])->group(function () {
    Route::get('/', 'IndexController@index');

    Route::get('/learn/fun/index', 'learn\FunController@index');
    Route::get('/learn/fun/create', 'learn\FunController@create');
    Route::post('/learn/fun/store', 'learn\FunController@store');
    Route::get('/learn/fun/edit', 'learn\FunController@edit');
    Route::post('/learn/fun/update', 'learn\FunController@update');
    Route::post('/learn/fun/delete', 'learn\FunController@delete');
    Route::post('/learn/fun/deleteMany', 'learn\FunController@deleteMany');
});