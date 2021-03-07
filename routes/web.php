<?php
use Illuminate\Support\Facades\Route;
Route::get('/','HomeController@getHomepage')->name('home');
//Static Pages
Route::get('authenticity' , 'StaticPageController@getAutheticity')->name('static.authenticity');
Route::get('faqs' , 'StaticPageController@getFaqs')->name('static.faqs');
Route::get('returns' , 'StaticPageController@getReturns')->name('static.returns');
Route::get('shipping-delivery' , 'StaticPageController@getShipping')->name('static.shipping');
Route::get('consignment-form' , 'StaticPageController@getConsigmentForm')->name('static.consignmentForm');
Route::get('who-we-are' , 'StaticPageController@getWhoWeAre')->name('static.whoWeAre');
Route::get('privacy' , 'StaticPageController@getPrivacy')->name('static.privacy');
Route::get('careers' , 'StaticPageController@getCareers')->name('static.careers');
Route::get('how-it-works' , 'StaticPageController@getHowItWorks')->name('static.howItWorks');
Route::get('payment-options' , 'StaticPageController@getPaymentOptions')->name('static.paymentOptions');
//Landing Page Stuff
Route::get('products' , 'ProductsController@getAll')->name('products.landing');
//User System
Route::get('signup' , 'UserController@getSignup')->name('user.getSignup');
Route::post('signup' , 'UserController@postSignup')->name('user.postSignup');