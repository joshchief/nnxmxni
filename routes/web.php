<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\PasswordController;


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



Route::get('/', [HomeController::class, 'index']);

Route::get('/story', [HomeController::class, 'story'])->name('story');



Route::get('/home', [PostsController::class, 'index']);
Route::get('/create', [PostsController::class, 'create']);
Route::get('/home/{id}', [PostsController::class, 'show']);
Route::post('/', [PostsController::class, 'store']);
Route::get('/edit/{id}', [PostsController::class, 'edit']);
Route::post('/edit', [PostsController::class, 'update']);
Route::get('/delete/{id}', [PostsController::class, 'destroy']);


/***
 * @Auth Route
 * @RegisterController & LoginController
 * Create User and Login
 * */ 

//  Create User
Route::get('/register', [RegisterController::class, 'signupForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'signUp'])->name('signUp');

// E-mail verification
Route::get('/verify/{token}', [RegisterController::class, 'verifyEmail']);


// Login
Route::get('/login', [LoginController::class, 'loginForm'])->middleware('guest')->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// logOut
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




/**
 * 
 * @ResetPasswordRoute
 * PasswordController 
 * ResetPassword
 * */
Route::get('forgot-password', [PasswordController::class, 'showForgotPassword'])->middleware('guest')->name('forgot.password.get');

Route::post('forgot-password', [PasswordController::class, 'submitForgotPassword'])->middleware('guest')->name('forgot.password.post');

Route::get('reset-password/{token}', [PasswordController::class, 'showResetPassword'])->middleware('guest')->name('reset.password.get');

Route::post('reset-password', [PasswordController::class, 'submitResetPassword'])->middleware('guest')->name('reset.password.post');









