<?php

use Illuminate\Support\Facades\Route;

Route::get('get-address/{cep}', 'Address\AddressController@fetchAddress');
Route::post('store-scheduling', 'Scheduling\SchedulingController@storeScheduling');
Route::get('get-scheduling', 'Scheduling\SchedulingController@getScheduling');
Route::post('edit-scheduling/{id}', 'Scheduling\SchedulingController@editScheduling');
Route::put('del-scheduling/{id}', 'Scheduling\SchedulingController@delScheduling');



Route::get('/', function () {
    return view('home');
});

Route::get('/new-scheduling', function () {
    return view('form');
});

Route::get('/schedule', function () {
    return view('table');
});


