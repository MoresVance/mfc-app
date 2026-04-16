<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/login', 'auth.login')->name('login');
Route::view('/signup', 'auth.signup')->name('signup');
Route::view('/availability', 'availability')->name('availability');

Route::redirect('/index.php', '/');
Route::redirect('/login.php', '/login');
Route::redirect('/signup.php', '/signup');
Route::redirect('/user/availability.php', '/availability');
