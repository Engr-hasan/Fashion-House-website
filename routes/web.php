<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list-sliders', 'HomeSliderController@listSlider');
Route::get('/add-slider', 'HomeSliderController@addSlider');
Route::post('/store-slider', 'HomeSliderController@storeSlider');
Route::get('/edit-slider/{id}', 'HomeSliderController@editSlider');
Route::post('/update-slider/{id}', 'HomeSliderController@updateSlider');
Route::get('/delete-slider/{id}', 'HomeSliderController@deleteSlider');

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
