<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/home', function () {
    return view('homepage');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});


