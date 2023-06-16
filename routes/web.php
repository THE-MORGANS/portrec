<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\EducationController;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\Users\WorkExperienceController;

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

Route::get('/', [LandingPageController::class, 'loadLandingPage'])->name('user.loadlandingpage');


Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'loadUserLoginPage')->name('user.showloginpage');
    Route::get('/register', 'loadUserRegisterPage')->name('user.showregisterpage');
    Route::get('/logout', 'signOut')->name('user.logout');
    Route::post('/register', 'registeruser')->name('user.register');
    Route::post('/login', 'loginuser')->name('user.login');
});

    Route::middleware('auth')->group(function(){
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('dashboard.index');
            Route::get('/users', 'users')->name('dashboard.users');
            Route::get('/resume', 'loadResumePage')->name('dashboard.loadresumepage');
            Route::get('/cv', 'loadCVPage')->name('dashboard.loadcvmanagerpage');
            Route::get('/jobs', 'loadJobsPage')->name('dashboard.loadjobs');
        });

        Route::get('/education/delete/{id}', [EducationController::class, 'destroy'])->name('education.delete');
        Route::resource('education', EducationController::class);

        Route::get('/workexperience/delete/{id}', [WorkExperienceController::class, 'destroy'])->name('workexperience.delete');
        Route::resource('workexperience', WorkExperienceController::class);
    });
