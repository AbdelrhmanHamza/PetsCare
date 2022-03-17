<?php

use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('pets', App\Http\Controllers\PetsController::class);


Route::resource('users', App\Http\Controllers\usersController::class);


Route::resource('businessProfiles', App\Http\Controllers\BusinessProfileController::class);


Route::resource('servicePackages', App\Http\Controllers\ServicePackageController::class);


Route::resource('subscribtionPackages', App\Http\Controllers\SubscribtionPackageController::class);


Route::resource('clientProfiles', App\Http\Controllers\ClientProfileController::class);




