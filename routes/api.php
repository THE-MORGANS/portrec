<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Education;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\WorkExperience;
use App\Http\Controllers\Users\PictureController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\PortfolioController;
use App\Http\Controllers\Users\QualificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'registeruser')->name('user.register');
    Route::post('/login', 'loginuser')->name('user.login');
   
});


Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('user')->group(function () {
        Route::get('/logout', [AuthController::class, 'userlogout'])->name('user.logout');

        //user profile routes
        Route::get('/profile', [ProfileController::class, 'userprofile'])->name('user.profile');
        Route::post('/profile/{id}', [ProfileController::class, 'updateuserprofile'])->name('update.user.profile');
        Route::post('/updatepassword/{id}', [ProfileController::class, 'updateUserPassword'])->name('update.user.password');
        Route::post('/uploadpicture/{id}', [PictureController::class, 'uploadUserProfilePicture'])->name('upload.user.profile.picture'); 

        Route::resource('workexperience', WorkExperience::class);
        Route::resource('education', Education::class);
        Route::resource('qualification', QualificationController::class);
        Route::resource('portfolio', PortfolioController::class);
        
    });

});


Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
