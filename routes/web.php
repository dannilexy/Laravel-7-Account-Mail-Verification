<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register', 'RegisterController@index')->name('reg');
Route::post('/post-register', 'RegisterController@register')->name('register');
Route::get('/login', 'LoginController@index')->name('log');
Route::post('/login-post', 'LoginController@login')->name('login');
Route::get('/verify/{token}', 'VerifyController@VerifyEmail')->name('verify');
