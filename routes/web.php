<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Web\IndexController@index');

Route::get('/test', 'TestController@index');

Route::post('/uploadFile/images', 'UploadFileController@images');

Route::namespace('Web')->prefix('web')->group(function () {
    Route::get('movies/index', 'MovieController@index');

    Route::get('projects/index', 'ProjectController@index');

    Route::get('music/index', 'MusicController@index');
});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
