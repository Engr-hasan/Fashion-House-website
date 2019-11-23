<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list-clients', 'ClientController@listClient');
Route::get('/add-client', 'ClientController@addClient');
Route::post('/store-client', 'ClientController@storeClient');
Route::get('/edit-client/{id}', 'ClientController@editClient');
Route::post('/update-client/{id}', 'ClientController@updateClient');
Route::get('/delete-client/{id}', 'ClientController@deleteClient');

Route::get('/list-galleries', 'GalleryController@listGallery');
Route::get('/add-gallery', 'GalleryController@addGallery');
Route::post('/store-gallery', 'GalleryController@storeGallery');
Route::get('/edit-gallery/{id}', 'GalleryController@editGallery');
Route::post('/update-gallery/{id}', 'GalleryController@updateGallery');
Route::get('/delete-gallery/{id}', 'GalleryController@deleteGallery');
