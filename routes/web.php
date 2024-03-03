<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'web'], function (){
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    
    
    Route::middleware('auth')->prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', 'App\Http\Controllers\ContactController@index')->name('index')->withoutMiddleware('auth');
        Route::get('/create', 'App\Http\Controllers\ContactController@create')->name('create');
        Route::post('/', 'App\Http\Controllers\ContactController@store')->name('store');
        Route::get('/{contact}', 'App\Http\Controllers\ContactController@show')->name('show')->where('contact', '[0-9]+');
        Route::get('/edit/{contact}', 'App\Http\Controllers\ContactController@edit')->name('edit')->where('contact', '[0-9]+');
        Route::put('/{contact}', 'App\Http\Controllers\ContactController@update')->name('update')->where('contact', '[0-9]+');
        Route::delete('/{contact}', 'App\Http\Controllers\ContactController@destroy')->name('destroy')->where('contact', '[0-9]+');
    });
});