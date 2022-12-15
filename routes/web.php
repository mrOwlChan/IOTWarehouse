<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyProfileController;

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
    return view('home.index');
});

// Registrasi User
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login & Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// My Profile
Route::get('/myprofile', [MyProfileController::class, 'index']);
Route::post('/myprofile/{user}/edit', [MyProfileController::class, 'edit'])->middleware('auth');
Route::patch('/myprofile/{user}/photo', [MyProfileController::class, 'updatePhoto']);
Route::patch('/myprofile/{user}/{param}', [MyProfileController::class, 'update']);

// Home
Route::get('/home', [HomeController::class, 'index']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// APIController untuk akses API
Route::get('/checkpostal/{province}', [APIController::class, 'checkpostal']);
Route::get('/getapi/{param1}/{param2}', [APIController::class, 'getpostal']);  
