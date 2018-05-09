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

Route::get('/', 'PagesController@home');

//Route::get('/home', 'HomeController@index')->name('home');

// Rutas al no estar logueado.
Route::get('/topics/show/{topic}', 'TopicsController@show');


//Rutas al estar logueado.
Route::group(['middleware' => 'auth'], function () {
    Route::get('/topics/create', 'TopicsController@create');
    Route::post('/topics', 'TopicsController@store');
    Route::post('/topics/validate', 'TopicsController@validateTopicAjax');

});

Auth::routes();