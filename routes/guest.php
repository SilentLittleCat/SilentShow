<?php

Route::middleware(['auth.silent:guest'])->group(function () {
    Route::get('/', 'IndexController@index');

    Route::get('movies/index', 'MovieController@index');
//    Route::get('movies/create', 'MovieController@create');
//    Route::post('movies/store', 'MovieController@store');
//    Route::get('movies/edit', 'MovieController@edit');
//    Route::post('movies/update', 'MovieController@update');
    Route::get('movies/detail', 'MovieController@detail');
//    Route::post('movies/delete', 'MovieController@delete');
});