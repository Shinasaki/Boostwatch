<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


// Language
Route::get('/en', function () {
    //App::setLocale('en');
    Cookie::queue('Locale', 'en', '720');
    return back();
});
Route::get('/th', function () {
    Cookie::queue('Locale', 'th', '720');
    return back();
});


//Default
Route::get('/', 'IndexController@index')->name('index');


//Boost
Route::get('/boost', 'BoostController@index')->name('boost');
Route::get('/boost/{page}', 'BoostController@boost');
Route::post('/ajax/getRank', 'AjaxController@getRank');
Route::post('/ajax/compileRank', 'AjaxController@compileRank');
Route::post('/ajax/levelCompile', 'AjaxController@levelCompile');


//Checkout
Route::post('/checkout/rating', 'CheckoutController@rating') -> name('Checkout_rating');
Route::get('/checkout', 'CheckoutController@checkout') -> name('Checkout');
Route::get('/checkout/cancel/{id}', 'CheckoutController@cancel');
Route::get('/paypal', 'PaypalController@payment') -> name('Paypal');
Route::get('/paypal/{callback}', 'PaypalController@callback');


//Dashboard
Route::get('/dashboard/{page}', 'dashboard\Dashboard@index') -> name('Dashboard');

//Chat
Route::post('/ajax/chat', 'AjaxController@chat');
Route::post('/ajax/chatMsg', 'AjaxController@chatMsg');

// Error
Route::get('/error/auth/{type}', 'ErrorController@auth') -> name('authError');
