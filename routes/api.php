<?php

use App\Http\Controllers\Users\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    // Route::get('/logout', 'userlogout')->name('user.logout');
});


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/getuser', [AuthController::class, 'getuser']);
    Route::get('/logout', [AuthController::class, 'userlogout'])->name('user.logout');
});


Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
