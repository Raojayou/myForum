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

Route::get('/home', 'HomeController@index')->name('home');

//Rutas al estar logueado.
Route::group(['middleware' => 'auth'], function () {
    Route::get('/topics/create', 'TopicsController@create');
    Route::post('/topics/create', 'TopicsController@store');
    Route::post('/topics/validate', 'TopicsController@validateTopicAjax');

});

// Rutas al no estar logueado.
Route::get('/topics', 'TopicsController@show');
Route::get('/topics/{id}', 'TopicsController@details');

Route::get('/data/load', 'TopicsController@loadData');
Route::get('/data/loadAjax', 'TopicsController@loadDataAjax');

Auth::routes();