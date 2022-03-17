<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\API\BusinessFilterControllerApi;
use App\Http\Controllers\API\BusinessProfileControllerApi;
use App\Http\Controllers\API\BusinessRequestControllerApi;
use App\Http\Controllers\API\ClientRequestControllerApi;
use App\Http\Controllers\API\ClientControllerApi;
use App\Http\Controllers\API\ServicePackageControllerApi;
use App\Http\Controllers\API\PetControllerApi;
use App\Http\Controllers\API\BusinessSubscribtionControllerApi;
use App\Http\Controllers\API\SubscribtionPackageControllerApi;
use App\Http\Controllers\API\UsersImageControllerApi;
use App\Http\Controllers\API\SubscribtionPackageFeatureControllerApi;
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
    Route::get('/packages/all', [SubscribtionPackageControllerApi::class, 'index']);
    Route::get('/packages/{id}', [SubscribtionPackageControllerApi::class, 'show']);
});

Route::group([
    'middleware' => 'jwt.verify.Business',
    'prefix' => 'profile'
], function ($router) {
    Route::get('/user', [BusinessProfileControllerApi::class, 'index']);
    Route::post('/business/add', [BusinessProfileControllerApi::class, 'store']);
    Route::get('/business/show/{id}', [BusinessProfileControllerApi::class, 'show']);
    Route::post('/business/update/{id}', [BusinessProfileControllerApi::class, 'update']);
    Route::post('/business/delete/{id}', [BusinessProfileControllerApi::class, 'destroy']);
    Route::post('/business/image/upload', [UsersImageControllerApi::class, 'store']);
    Route::post('/business/image/update', [UsersImageControllerApi::class, 'update']);
    Route::get('/business/image/show/{id}', [UsersImageControllerApi::class, 'show']);
    Route::get('/business/image/delete/{id}', [UsersImageControllerApi::class, 'destroy']);

    Route::post('/business/{id}/package/add', [ServicePackageControllerApi::class, 'store']);
    Route::get('/business/{id}/package/all', [ServicePackageControllerApi::class, 'index']);
    Route::get('/business/package/{id}', [ServicePackageControllerApi::class, 'show']);
    Route::post('/business/package/update/{id}', [ServicePackageControllerApi::class, 'update']);
    Route::get('/business/package/delete/{id}', [ServicePackageControllerApi::class, 'destroy']);
    Route::post('/business/package/subscribe', [BusinessSubscribtionControllerApi::class, 'store']);
    Route::get('/business/package/subscribe/current', [BusinessSubscribtionControllerApi::class, 'show']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'profile'
], function ($router) {
    Route::get('/client', [ClientControllerApi::class, 'index']);
    Route::post('/client/add', [ClientControllerApi::class, 'store']);
    Route::get('/client/show/{id}', [ClientControllerApi::class, 'show']);
    Route::post('/client/edit', [ClientControllerApi::class, 'update']);
    Route::post('/client/delete/{id}', [ClientControllerApi::class, 'destroy']);
    Route::get('/business/details/{id}', [BusinessProfileControllerApi::class, 'show']);
    Route::get('/business/package/{id}', [ServicePackageControllerApi::class, 'clientShow']);

});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'profile'
], function ($router) {
    Route::get('/pet', [PetControllerApi::class, 'index']);
    Route::post('/pet/add', [PetControllerApi::class, 'store']);
    Route::get('/pet/show/{id}', [PetControllerApi::class, 'show']);
    Route::post('/pet/edit/{id}', [PetControllerApi::class, 'update']);
    Route::post('/pet/delete/{id}', [PetControllerApi::class, 'destroy']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'client'
], function ($router) {
    Route::get('/request', [ClientRequestControllerApi::class, 'index']);
    Route::post('/request/add', [ClientRequestControllerApi::class, 'store']);
    Route::get('/request/show/{id}', [ClientRequestControllerApi::class, 'show']);
    Route::post('/request/edit/{id}', [ClientRequestControllerApi::class, 'update']);
    Route::post('/request/delete/{id}', [ClientRequestControllerApi::class, 'destroy']);
    Route::get('/request/business', [BusinessFilterControllerApi::class, 'index']);
    Route::get('/request/all', [BusinessFilterControllerApi::class, 'businesses']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'business'
], function ($router) {
    Route::get('/request', [BusinessRequestControllerApi::class, 'index']);
    Route::get('/request/show/{id}', [BusinessRequestControllerApi::class, 'show']);
    Route::post('/request/edit/{id}', [ClientRequestControllerApi::class, 'update']);
});

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'admin'
// ], function ($router) {
//     Route::post('/packages/add', [SubscribtionPackageController::class, 'store']);
//     Route::get('/packages/update/{id}', [SubscribtionPackageController::class, 'update']);
//     Route::get('/packages/delete/{id}', [SubscribtionPackageController::class, 'destroy']);
//     Route::get('/feature/all', [SubscribtionPackageController::class, 'index']);
//     Route::post('/feature/add', [SubscribtionPackageController::class, 'store']);
//     Route::post('/feature/update/{id}', [SubscribtionPackageController::class, 'update']);
//     Route::get('/feature/show/{id}', [SubscribtionPackageController::class, 'show']);
//     Route::post('/feature/delete/{id}', [SubscribtionPackageController::class, 'destroy']);
//     Route::get('/packages', [SubscribtionPackageFeatureController::class, 'index']);
//     Route::post('/packages/{subscriptionPackageId}/add/{featureId}', [SubscribtionPackageFeatureController::class, 'store']);
// });
