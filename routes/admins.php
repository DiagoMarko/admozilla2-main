<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






Route::post('/login' , '\App\Http\Controllers\AdminController@doLogin')->name('login');

Route::post('/saveAdminData' , '\App\Http\Controllers\AdminController@register');

Route::post('/logout' , '\App\Http\Controllers\AdminController@doLogout');	

Route::get('/' , '\App\Http\Controllers\AdminController@showLoginForm')->name('login');

Route::get('/admin-register' , '\App\Http\Controllers\AdminController@showAdminRegister');
