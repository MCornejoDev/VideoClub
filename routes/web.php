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

Route::get('/', function () {
    return view("home");
});

// Route::get('/logout', [
//     'as'=>'logout',
//     'uses'=>'LoginController@logout'
// ]);

/**Mostrar el catálogo de películas de nuestra tienda */
Route::get('/catalog', [
    'as'=>'catalog',
    'uses'=>'CatalogController@index'
])->middleware('verified');


/**Mostramos la información sobre la película en concreto */
Route::get('/catalog/show/{id}', [
    'as'=>'show',
    'uses'=>'CatalogController@show'
])->middleware('verified');

/**Mostramos la vista para crear una nueva película */
Route::get('/catalog/create', [
    'as'=>'create',
    'uses'=>'CatalogController@create'
])->middleware('verified');

/**Mostramos la vista para editar una película que ya tenemos en nuestro catálogo */
Route::get('/catalog/edit/{id}', [
    'as'=>'edit',
    'uses'=>'CatalogController@edit'
])->middleware('verified');

/**Funcionalidad que nos crea la nueva película que aparecerá en nuestro catálogo */
Route::post('catalog/create',[
    'as'=>'created',
    'uses'=>'CatalogController@postCreate'
])->middleware('verified');

/**Funcionalidad que nos permiter y nos confirma los nuevos datos de nuestra película */
Route::post('catalog/edit/{id}',[
    'as'=>'edited',
    'uses'=>'CatalogController@putEdit'
])->middleware('verified');

/**Funcionalidad que nos permite alquilar una película */
Route::post('/catalog/rent/{id}',[
    'as'=> 'rented',
    'uses'=> 'CatalogController@putRent'
])->middleware('verified');

/**Funcionalidad que nos permite devolver una película */
Route::post('/catalog/return/{id}',[
    'as'=> 'return',
    'uses'=> 'CatalogController@putReturn'
])->middleware('verified');

/**Funcionalidad que nos permite eliminar una película */
Route::post('/catalog/delete/{id}',[
    'as'=> 'deleted',
    'uses'=> 'CatalogController@deleteMovie'
])->middleware('verified');

/**Funcionalidad de autentificación de usuarios */
Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
