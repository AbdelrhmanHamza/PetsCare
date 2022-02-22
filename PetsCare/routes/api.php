<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BusinessProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServicePackageController;
use App\Http\Controllers\PetController;
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
    Route::post('/business/{id}/package/add', [ServicePackageController::class, 'store']);
    Route::get('/business/{id}/package/all', [ServicePackageController::class, 'index']);
    Route::get('/business/package/{id}', [ServicePackageController::class, 'show']);
    Route::post('/business/package/update/{id}', [ServicePackageController::class, 'update']);
    Route::get('/business/package/delete/{id}', [ServicePackageController::class, 'destroy']);

});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix'=>'profile'
],function ($router){
    Route::get('/client', [ClientController::class, 'index']);
    Route::post('/client/add', [ClientController::class, 'store']);
    Route::get('/client/edit/{id}', [ClientController::class, 'show']);
    Route::post('/client/edit/{id}', [ClientController::class, 'update']);
    Route::post('/client/delete/{id}', [ClientController::class, 'destroy']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix'=>'profile'
],function ($router){
    Route::get('/pet', [PetController::class, 'index']);
    Route::post('/pet/add', [PetController::class, 'store']);
    Route::get('/pet/show/{id}', [PetController::class, 'show']);
    Route::post('/pet/edit/{id}', [PetController::class, 'update']);
    Route::post('/pet/delete/{id}', [PetController::class, 'destroy']);
});




