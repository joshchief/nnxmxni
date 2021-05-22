<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

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


// Route::get('/home', [PostsController::class, 'index']);
Route::get('/create', [PostsController::class, 'create']);
Route::get('/home/{id}', [PostsController::class, 'show']);
Route::post('/', [PostsController::class, 'store']);
Route::get('/edit/{id}', [PostsController::class, 'edit']);
Route::post('/edit', [PostsController::class, 'update']);
Route::get ('/delete/{id}', [PostsController::class, 'destroy']);
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/story', [HomeController::class, 'story'])->name('story');
