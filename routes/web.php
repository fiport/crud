<?php

use Illuminate\Support\Facades\Route;

Route::get('get-address/{cep}', 'address\AddressController@fetchAddress');
Route::post('store-agendamento', 'agendamento\AgendamentoController@storeAgendamento');
Route::get('get-agendamentos', 'agendamento\AgendamentoController@getAgendamento');
Route::post('edit-agendamento/{id}', 'agendamento\AgendamentoController@editAgendamento');
Route::put('del-agendamento/{id}', 'agendamento\AgendamentoController@delAgendamento');



Route::get('/', function () {
    return view('home');
});

Route::get('/novo-agendamento', function () {
    return view('form');
});

Route::get('/agenda', function () {
    return view('table');
});


Auth::routes();

