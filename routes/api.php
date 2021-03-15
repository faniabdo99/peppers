<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('newsletter' , 'NewsletterController@postNewsletter')->name('newsletter.post');