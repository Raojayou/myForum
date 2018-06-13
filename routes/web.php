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
    Route::redirect('/profile', '/profile/account', 302);

    Route::get('/topics/create', 'TopicsController@create');
    Route::get('/topics/edit/{id}', 'TopicsController@edit');
    Route::get('/topics/update/{id}', 'TopicsController@update');
    Route::delete('/topics/delete/{id}', 'TopicsController@delete');

    Route::post('/topics/create', 'TopicsController@store');
    Route::post('/topics/validate', 'TopicsController@validateTopicAjax');

    Route::get('/user/{user}', 'UsersController@show')->name("profile");

    // Rutas de administración
    Route::get('/admin', 'AdminController@index')->name('admin.panel');
    Route::get('/admin/topics', 'TopicsController@adminIndex')->name('admin.posts');
    Route::get('/admin/topics/create', 'TopicsController@create');
    Route::post('/admin/topics', 'TopicsController@store');
    Route::get('/admin/topics/{topic}/edit', 'TopicsController@edit')->name('topics.edit');
    Route::patch('/admin/topics/{topic}', 'TopicsController@patch')->name('topics.patch');

});

// Rutas al no estar logueado.
Route::get('/topics', 'TopicsController@index');
Route::get('/topics/{id}', 'TopicsController@show');
Route::post('/topics/viewTopic','TopicsController@loadView');
Route::post('/topics/viewAllTopics','TopicsController@loadView');

Route::get('/data/dataAjax', 'TopicsController@loadData');
Route::get('/data/loadAjax', 'TopicsController@loadDataAjax');
Route::post('/data/loadAjaxOne', 'TopicsController@loadDataAjaxOne');

Route::resource('/tags', 'TagController');

Auth::routes();