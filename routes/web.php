<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//Welcome
Route::get('/',[registerController::class, 'home'])->name('home');
//End welcome

//Register
Route::get('/sign_up',[registerController::class, 'sign_up'])->name('sign_up');
Route::post('/register',[registerController::class, 'register'])->name('register');
//Register End


//Login
Route::get('/sign_in',[loginController::class, 'sign_in'])->name('sign_in');
Route::post('/login',[loginController::class, 'login'])->name('login');
//Login End

//Dashboard
Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
Route::get('/get_user',[UserController::class, 'get_user'])->name('get_user');
Route::post('/change_user_status',[UserController::class, 'change_user_status'])->name('change_user_status');
Route::get('/profile',[UserController::class, 'profile'])->name('profile');
Route::get('/user',[UserController::class, 'user'])->name('user');
Route::post('/user_search',[UserController::class, 'user_search'])->name('user_search');
//Dashboard end


//Logout
Route::get('/logout',[loginController::class, 'logout'])->name('logout');
//End Logout




