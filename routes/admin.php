<?php

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::middleware(['auth.silent:admin'])->group(function () {
    Route::get('/', 'IndexController@index');

    Route::get('movies/index', 'MovieController@index');
    Route::get('movies/create', 'MovieController@create');
    Route::post('movies/store', 'MovieController@store');
    Route::get('movies/edit', 'MovieController@edit');
    Route::post('movies/update', 'MovieController@update');
    Route::get('movies/detail', 'MovieController@detail');
    Route::post('movies/delete', 'MovieController@delete');

    Route::get('photo-categories/index', 'PhotoCategoryController@index');
    Route::get('photo-categories/create', 'PhotoCategoryController@create');
    Route::post('photo-categories/store', 'PhotoCategoryController@store');
    Route::get('photo-categories/edit', 'PhotoCategoryController@edit');
    Route::post('photo-categories/update', 'PhotoCategoryController@update');
    Route::get('photo-categories/detail', 'PhotoCategoryController@detail');
    Route::post('photo-categories/delete', 'PhotoCategoryController@delete');

    Route::get('photos/index', 'PhotoController@index');
    Route::get('photos/create', 'PhotoController@create');
    Route::post('photos/store', 'PhotoController@store');
    Route::get('photos/edit', 'PhotoController@edit');
    Route::post('photos/update', 'PhotoController@update');
    Route::get('photos/detail', 'PhotoController@detail');
    Route::post('photos/delete', 'PhotoController@delete');

    Route::get('music-categories/index', 'MusicCategoryController@index');
    Route::get('music-categories/create', 'MusicCategoryController@create');
    Route::post('music-categories/store', 'MusicCategoryController@store');
    Route::get('music-categories/edit', 'MusicCategoryController@edit');
    Route::post('music-categories/update', 'MusicCategoryController@update');
    Route::get('music-categories/detail', 'MusicCategoryController@detail');
    Route::post('music-categories/delete', 'MusicCategoryController@delete');

    Route::get('musics/index', 'MusicController@index');
    Route::get('musics/create', 'MusicController@create');
    Route::post('musics/store', 'MusicController@store');
    Route::get('musics/edit', 'MusicController@edit');
    Route::post('musics/update', 'MusicController@update');
    Route::get('musics/detail', 'MusicController@detail');
    Route::post('musics/delete', 'MusicController@delete');
});