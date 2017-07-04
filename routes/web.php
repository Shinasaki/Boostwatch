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


// Language

/*get last url {{ collect(request()->segments())->last() }}*/

Route::get('/en', function () {
    //App::setLocale('en');
    Cookie::queue('Locale', 'en', '720');
    return redirect('');
});
Route::get('/th', function () {
    Cookie::queue('Locale', 'th', '720');
    return redirect('');
});


//Default
Route::get('/', 'IndexController@index')->name('index');


//Boost
Route::get('/boost', 'BoostController@index')->name('boost');
Route::get('/boost/{page}', 'BoostController@boost');

Route::post('/ajax/getRank', 'AjaxController@getRank');
Route::post('/ajax/compileRank', 'AjaxController@compileRank');
