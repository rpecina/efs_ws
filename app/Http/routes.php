<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers','CustomerController');
Route::resource('stocks','StockController');
Route::resource('investments','InvestmentController');
Route::get('customers/{id}/stringify', 'CustomerController@stringify');


Route::auth();

Route::get('/home', 'HomeController@index');
