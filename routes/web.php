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

    // CRUD
    Route::get('/topics/create', 'TopicsController@create');
    Route::get('/topics/edit/{id}', 'TopicsController@edit');
    Route::get('/topics/update/{id}', 'TopicsController@update');
    Route::delete('/topics/delete/{id}', 'TopicsController@delete');

    // Guardar tema.
    Route::post('/topics/create', 'TopicsController@store');
    // Crear/Guardar respuestas.
    Route::post('/topics/{id}/replies', 'RepliesController@store');

    // Validación
    Route::post('/topics/validate', 'TopicsController@validateTopicAjax');
    // Perfíl
    Route::get('/user/{user}', 'UsersController@show')->name("profile");

    // Rutas de administración
    Route::get('/admin', 'AdminController@index')->name('admin.panel');
    Route::get('/admin/topics', 'TopicsController@adminIndex')->name('admin.topics');
    Route::get('/admin/topics/create', 'TopicsController@create');
    Route::post('/admin/topics', 'TopicsController@store');
    Route::get('/admin/topics/{topic}/edit', 'TopicsController@edit')->name('topics.edit');
    Route::patch('/admin/topics/{topic}', 'TopicsController@patch')->name('topics.patch');

});

// Rutas al no estar logueado.
Route::get('/topics', 'TopicsController@index');
Route::get('/topics/{id}', 'TopicsController@show');

Route::post('/data/viewTopic','TopicsController@loadView');
Route::post('/data/viewAllTopics','TopicsController@loadView');

// Rutas de carga de datos asíncrona.
Route::get('/data/dataAjax', 'TopicsController@loadData');
Route::get('/data/loadAjax', 'TopicsController@loadDataAjax');
Route::post('/data/loadAjaxOne', 'TopicsController@loadDataAjaxOne');

Route::resource('/tags', 'TagController');

Auth::routes();