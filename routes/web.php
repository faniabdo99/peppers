<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@getHomepage')->name('home');
//Static Pages
Route::get('authenticity' , 'StaticPageController@getAutheticity')->name('static.authenticity');
Route::get('faqs' , 'StaticPageController@getFaqs')->name('static.faqs');
Route::get('returns' , 'StaticPageController@getReturns')->name('static.returns');