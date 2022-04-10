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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register');
        
        // Password Reset Routes...
        if ($options['reset'] ?? true) {
            Route::resetPassword();
        }

        // Email Verification Routes...
        if ($options['verify'] ?? false) {
            Route::emailVerification();
        }


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::post('/guest', 'HomeController@guest')->name('guest')->middleware('guest');

Route::get('/guest_index/{id}', 'HomeController@indexGuest')->name('guest_index')->middleware('guest');

Route::post('/currency', 'HomeController@exchangeCurrency')->name('currency');


