<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;

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

// Route::get('/profile', [ProfileController::class, 'userprofile'])->name('user.profile');


Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'loadLandingPage')->name('user.loadlandingpage');
    Route::post('/register', 'registeruser')->name('user.register');
    Route::post('/login', 'loginuser')->name('user.login');
    Route::get('/login', 'loadUserLoginPage')->name('user.showloginpage');
    Route::get('/register', 'loadUserRegisterPage')->name('user.showregisterpage');
   
});
