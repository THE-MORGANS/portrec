<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\AwardController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\EducationController;
use App\Http\Controllers\Users\PortfolioController;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\Users\CVController;
use App\Http\Controllers\Users\ProfileController;
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
            Route::get('/companies', 'loadCompaniesPage')->name('dashboard.companies');
            Route::get('/appliedjobs/{id}', 'loadUserAppliedJobsPage')->name('dashboard.loaduserappliedjobs');
            Route::get('/loadupdatepassword/{id}', 'loadChangePasswordPage')->name('dashboard.loadupdatepassword');
        });

        Route::controller(EducationController::class)->group(function(){
            Route::get('/education', 'create')->name('education.create');
            Route::post('/education', 'store')->name('education.store');
            Route::get('/education/edit/{id}', 'edit')->name('education.edit');
            Route::post('/education/update/{id}', 'update')->name('education.update');
            Route::get('/education/delete/{id}', 'destroy')->name('education.delete');

        });

        Route::controller(WorkExperienceController::class)->group(function(){
            Route::get('/workexperience', 'create')->name('workexperience.create');
            Route::post('/workexperience', 'store')->name('workexperience.store');
            Route::get('/workexperience/edit/{id}', 'edit')->name('workexperience.edit');
            Route::post('/workexperience/update/{id}', 'update')->name('workexperience.update');
            Route::get('/workexperience/delete/{id}', 'destroy')->name('workexperience.delete');
        });

        Route::controller(PortfolioController::class)->group(function(){
            Route::get('/portfolio', 'create')->name('portfolio.create');
            Route::post('/portfolio', 'store')->name('portfolio.store');
            Route::get('/portfolio/edit/{id}', 'edit')->name('portfolio.edit');
            Route::post('/portfolio/update/{id}', 'update')->name('portfolio.update');
            Route::get('/portfolio/delete/{id}', 'destroy')->name('portfolio.delete');
        });

        Route::controller(AwardController::class)->group(function(){
            Route::get('/award', 'create')->name('award.create');
            Route::post('/award', 'store')->name('award.store');
            Route::get('/award/edit/{id}', 'edit')->name('award.edit');
            Route::post('/award/update/{id}', 'update')->name('award.update');
            Route::get('/award/delete/{id}', 'destroy')->name('award.delete');
        });

        Route::controller(CVController::class)->group(function(){
            Route::post('/cv', 'store')->name('cv.store');
            Route::get('/cv/edit/{id}', 'edit')->name('cv.edit');
            Route::post('/cv/update/{id}', 'update')->name('cv.update');
            Route::get('/cv/delete/{id}', 'destroy')->name('cv.delete');
        });

        Route::controller(ProfileController::class)->group(function(){
            Route::get('/profile/edit/{id}', 'loadUserProfilePage')->name('profile.edit');
            Route::post('/profile/update/{id}', 'updateUserProfile')->name('profile.update');
            Route::post('/profile/socialmedia/update/{id}', 'updateUserSocialMedia')->name('socialmedia.update');
            Route::post('/profile/contact/update/{id}', 'updateUserContact')->name('contact.update');
            Route::post('/userprofilepicture/{id}', 'uploadUserProfilePicture')->name('userprofilepicture.upload');
            Route::get('/profile/delete/{id}', 'destroy')->name('profile.delete');
            Route::post('/updatepassword/{id}', 'updateUserPassword')->name('profile.updatepassword');
        });
    });
