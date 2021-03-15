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
Route::get('products/{filter_type?}/{filter_value?}' , 'ProductController@getAll')->name('products');
Route::get('product/{slug}' , 'ProductController@getSingle')->name('product.single');
//User System
Route::middleware('guest')->group(function () {
    Route::get('signup' , 'UserController@getSignup')->name('user.getSignup');
    Route::post('signup' , 'UserController@postSignup')->name('user.postSignup');
    Route::get('login' , 'UserController@getLogin')->name('user.getLogin');
    Route::post('login' , 'UserController@postLogin')->name('user.postLogin');
    Route::get('reset-password' , 'UserController@getResetPage')->name('user.getReset');
    Route::post('reset-password' , 'UserController@postResetPage')->name('user.postReset');
    Route::get('choose-password/{email}/{code}' , 'UserController@getChoosePasswordPage')->name('reset.choosePassword.get');
    Route::post('choose-password/' , 'UserController@postChoosePasswordPage')->name('reset.choosePassword.post');
    //Social Signup System
    Route::get('social-login/{provider}' , 'UserController@redirectToProvider')->name('login.social');
    Route::get('login/{driver}/callback' , 'UserController@handleProviderCallback')->name('login.social.callback');
});
Route::middleware('auth')->group(function () {
    Route::get('logout' , 'UserController@logout')->name('logout');
    Route::get('profile' , 'UserController@profile')->name('profile');
    Route::get('profile/edit' , 'UserController@getEdit')->name('profile.getEdit');
    Route::post('profile/edit' , 'UserController@postEdit')->name('profile.postEdit');
    Route::get('approve-account/{code}' , 'UserController@getApproveAccount')->name('profile.approve');
});

Route::group(['prefix' => 'admin' , 'middleware' => 'admin'], function(){
    Route::prefix('products')->group(function(){
        Route::get('new' , 'ProductController@getNew')->name('admin.products.getNew');
        Route::post('new' , 'ProductController@postNew')->name('admin.products.postNew');
    });
});
Route::get('import-brands' , 'StaticPageController@getImportBrands');
Route::get('import-categories' , 'StaticPageController@getImportCategories');