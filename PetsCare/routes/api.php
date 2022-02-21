<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BusinessProfileController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group([
    'middleware' => 'jwt.verify.Business',
    'prefix' => 'profile'
], function ($router) {
    Route::get('/user', [BusinessProfileController::class, 'index']);
    Route::post('/business/add', [BusinessProfileController::class, 'store']);
    Route::get('/business/update/{id}', [BusinessProfileController::class, 'show']);
    Route::post('/business/update/{id}', [BusinessProfileController::class, 'update']);
    Route::post('/business/delete/{id}', [BusinessProfileController::class, 'destroy']);

});

