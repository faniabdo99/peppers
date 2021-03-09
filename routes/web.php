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
Route::middleware('guest')->group(function () {
    Route::get('signup' , 'UserController@getSignup')->name('user.getSignup');
    Route::post('signup' , 'UserController@postSignup')->name('user.postSignup');
    Route::get('login' , 'UserController@getLogin')->name('user.getLogin');
    Route::post('login' , 'UserController@postLogin')->name('user.postLogin');
    //Social Signup System
    Route::get('social-login/{provider}' , 'UserController@redirectToProvider')->name('login.social');
    Route::get('login/{driver}/callback' , 'UserController@handleProviderCallback')->name('login.social.callback');
});
Route::middleware('auth')->group(function () {
    Route::get('logout' , 'UserController@logout')->name('logout');
    Route::get('profile' , 'UserController@profile')->name('profile');
    Route::get('profile/edit' , 'UserController@getEdit')->name('profile.getEdit');
});