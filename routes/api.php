<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('newsletter' , 'NewsletterController@postNewsletter')->name('newsletter.post');
Route::post('add-to-cart' , 'CartController@addToCart')->name('cart.add');
Route::post('search' , 'ProductController@getSearch')->name('search.api');
Route::post('update-category' , 'ProductController@postUpdateCategory')->name('admin.product.updateCategory');
