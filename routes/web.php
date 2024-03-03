<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
});