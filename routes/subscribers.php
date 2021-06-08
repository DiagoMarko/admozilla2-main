<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/save-details' , '\App\Http\Controllers\SubscriberController@store');

Route::post('/user-search' , '\App\Http\Controllers\SubscriberController@search')->name('search-subscriber');

Route::post('/deleted-user-search' , '\App\Http\Controllers\SubscriberController@searchDeletedSubscribers')->name('search-deleted-subscribers');

Route::post('/register' , '\App\Http\Controllers\SubscriberController@register');

Route::post('/update-data/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@update')->name('update');




Route::get('/userdelete/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@delete');

Route::get('/restore-user/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@restore');
