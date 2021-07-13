<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Route;
Route::get('/','HomeController@getHomepage')->name('home'); //Tested
Route::get('switch-currency/{currency}/{currencyCode}' , 'CurrencyController@setCurrency')->name('currency.switch'); //Tested
//Static Pages
Route::get('authenticity' , 'StaticPageController@getAutheticity')->name('static.authenticity'); //Tested
Route::get('faqs' , 'StaticPageController@getFaqs')->name('static.faqs'); //Tested
Route::get('returns' , 'StaticPageController@getReturns')->name('static.returns');//Tested
Route::get('shipping-delivery' , 'StaticPageController@getShipping')->name('static.shipping'); //Tested
Route::get('consignment-form' , 'StaticPageController@getConsigmentForm')->name('static.consignmentForm'); //Tested
Route::get('who-we-are' , 'StaticPageController@getWhoWeAre')->name('static.whoWeAre'); //Tested
Route::get('privacy' , 'StaticPageController@getPrivacy')->name('static.privacy'); //Tested
Route::get('careers' , 'StaticPageController@getCareers')->name('static.careers'); //Tested
Route::get('how-it-works' , 'StaticPageController@getHowItWorks')->name('static.howItWorks'); //Tested
Route::get('payment-options' , 'StaticPageController@getPaymentOptions')->name('static.paymentOptions'); //Tested
Route::get('contact' , 'ContactController@getContact')->name('contact.get'); //Tested
Route::post('contact' , 'ContactController@postContact')->name('contact.post'); //Tested
//Landing Page Stuff
Route::get('products/{filter_type?}/{filter_value?}' , 'ProductController@getAll')->name('products');
Route::get('product/{slug}/{id}' , 'ProductController@getSingle')->name('product.single'); //Tested
//Orders System
Route::get('cart' , 'CartController@getAll')->name('cart.get'); //Tested
Route::get('delete/{id}' , 'CartController@delete')->name('cart.delete'); //Tested
Route::get('checkout' , 'OrderController@getCheckout')->name('checkout.get'); //Tested
Route::post('checkout' , 'OrderController@postCheckout')->name('checkout.post');
Route::get('success' , 'OrderController@getOrderSuccess')->name('order.success');
Route::get('complete/{id}' , 'OrderController@getOrderComplete')->name('order.complete');
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
    Route::get('orders' , 'UserController@getOrders')->name('orders');
    Route::get('approve-account/{code}' , 'UserController@getApproveAccount')->name('profile.approve');
});

Route::group(['prefix' => 'admin' , 'middleware' => 'admin'], function(){
    Route::get('/' , 'AdminController@getIndex')->name('admin.home');
    Route::prefix('products')->group(function(){
        Route::get('new' , 'ProductController@getNew')->name('admin.products.getNew');
        Route::post('new' , 'ProductController@postNew')->name('admin.products.postNew');
    });
    Route::prefix('blog')->group(function(){
        Route::get('/' , 'BlogController@getBlog')->name('admin.blog.index');
    });
    Route::prefix('discount')->group(function(){
        Route::get('/' , 'DiscountController@getDiscount')->name('admin.discount.all');
        Route::get('create' ,'DiscountController@getCreateDiscount')->name('admin.discount.create');
        Route::post('create' ,'DiscountController@postCreateDiscount')->name('admin.discount.postCreate');
        Route::get('edit/{id}' , 'DiscountController@getEditDiscount')->name('admin.discount.getEdit');
        Route::post('edit/{id}' , 'DiscountController@postEditDiscount')->name('admin.discount.postEdit');
        Route::get('delete/{id}' , 'DiscountController@deleteDiscount')->name('admin.discount.delete');
    });
    Route::prefix('category')->group(function(){
        Route::get('/' , 'CategoryController@getCategory')->name('admin.categories.all');
        Route::get('create' ,'CategoryController@getCreateCategory')->name('admin.categories.create');
        Route::post('create' ,'CategoryController@postCreateCategory')->name('admin.categories.postCreate');
        Route::get('edit/{id}' , 'CategoryController@getEditCategory')->name('admin.categories.getEdit');
        Route::post('edit/{id}' , 'CategoryController@postEditCategory')->name('admin.categories.postEdit');
        Route::get('delete/{id}' , 'CategoryController@deleteCategory')->name('admin.categories.delete');
    });
    Route::prefix('coupon')->group(function(){
        Route::get('/' , 'CouponController@getCoupon')->name('admin.coupons.all');
        Route::get('create' ,'CouponController@getCreateCoupon')->name('admin.coupons.create');
        Route::post('create' ,'CouponController@postCreateCoupon')->name('admin.coupons.postCreate');
        Route::get('edit/{id}' , 'CouponController@getEditCoupon')->name('admin.coupons.getEdit');
        Route::post('edit/{id}' , 'CouponController@postEditCoupon')->name('admin.coupons.postEdit');
        Route::get('delete/{id}' , 'CouponController@deleteCoupon')->name('admin.coupons.delete');
    });
    Route::prefix('blog')->group(function(){
        Route::get('/' , 'BlogController@getBlog')->name('admin.blog.all');
        Route::get('create' ,'BlogController@getCreateBlog')->name('admin.blog.create');
        Route::post('create' ,'BlogController@postCreateBlog')->name('admin.blog.postCreate');
        Route::get('edit/{id}' , 'BlogController@getEditBlog')->name('admin.blog.getEdit');
        Route::post('edit/{id}' , 'BlogController@postEditBlog')->name('admin.blog.postEdit');
        Route::get('delete/{id}' , 'BlogController@deleteBlog')->name('admin.blog.delete');
    });
    Route::prefix('products')->group(function(){
        Route::get('/' , 'ProductController@getProduct')->name('admin.products.all');
        Route::get('create' ,'ProductController@getCreateProduct')->name('admin.products.create');
        Route::post('create' ,'ProductController@postCreateProduct')->name('admin.products.postCreate');
        Route::get('edit/{id}' , 'ProductController@getEditProduct')->name('admin.products.getEdit');
        Route::post('edit/{id}' , 'ProductController@postEditProduct')->name('admin.products.postEdit');
        Route::get('delete/{id}' , 'ProductController@deleteProduct')->name('admin.products.delete');
    });
    Route::prefix('orders')->group(function(){
        Route::get('/' , 'OrderController@getAdmin')->name('admin.orders.all');
        Route::get('/{id}' , 'OrderController@getSingle')->name('admin.orders.single');
        Route::post('update-order-staus' , 'OrderController@postUpdateStatus')->name('admin.orders.updateStatus');
    });

});
Route::get('import-brands' , 'StaticPageController@getImportBrands');
Route::get('import-categories' , 'StaticPageController@getImportCategories');
Route::get('import-products' , 'StaticPageController@getImportProducts');

// Sell Route
Route::get('how-to-sell','SellController@getSellWithUs')->name('sell.howToSellWithUs');
Route::post('how-to-sell','SellController@postSellWithUs')->name('sell.postHowToSellWithUs');
Route::get('personal-shopper','SellController@getPersonalShopper')->name('sell.personalShopper');
Route::post('personal-shopper','SellController@postPersonalShopper')->name('sell.postPersonalShopper');
//List Page
Route::get('list', 'ProductController@getListPage')->name('product.list');
Route::get('test-whatsapp' , 'StaticPageController@testWhatsapp');