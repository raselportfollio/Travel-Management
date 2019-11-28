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
    return view('home');
});

Route::get('/About-Us', function () {
    return view('about-us');
});

Route::get('/Our-Rooms', function () {
    return view('our-rooms');
});

Route::post('/signup', 'User@registration');
Route::post('/signin', 'User@login_check');