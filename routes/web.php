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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list-clients', 'ClientController@listClient');
Route::get('/add-client', 'ClientController@addClient');
Route::post('/store-client', 'ClientController@storeClient');
Route::get('/edit-client', 'ClientController@editClient');
Route::post('/update-client', 'ClientController@updateClient');
Route::get('/delete-client', 'ClientController@deleteClient');

Route::get('/addcontact', 'MyController@addcontact');
Route::post('/save_contact', 'MyController@save_contact');
Route::get('/allcontact', 'MyController@allcontact');
Route::get('/edit_contact/{id}', 'MyController@edit_contact');
Route::post('/update_contact/{id}', 'MyController@update_contact');
Route::get('/allinfo', 'MyController@allcontact');
Route::get('/delete_contact/{id}', 'MyController@delete_contact');
