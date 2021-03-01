<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@getHomepage')->name('home');
