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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'servicesController@index');
Route::get('/services/fetch_data','servicesController@fetch_data');
Route::post('/services/servicesvER','servicesController@verser');
Route::post('/services/servicesretrait','servicesController@retrait');
Route::post('/services/servicestransfert','servicesController@transfert');

Route::resource('clients','ClientsController')->middleware('auth');
Route::resource('comptes','comptesController')->middleware('auth');

Route::resource('compte','compteController')->middleware('auth');
Route::get('/all/compte', 'compteController@allcompte')->name('all.compte');
Route::match(['put', 'patch'], '/dsibank/public/compte/comptemd/{id}','compteController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/modal','servicesController@modal');
