<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iterative', function() {
    return 'In Progress';
});

Route::get('/recursive', 'RecursiveController@show');
Route::post('/recursive', 'RecursiveController@add');
