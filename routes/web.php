<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/home', [PostsController::class, 'index']); /* done */
Route::get('/home/{id}', [PostsController::class, 'show']); /* done */
// Route::post('/home/store', [PostsController::class, 'store']);
Route::get('/home/create', [PostsController::class, 'create']);
// Route::get('/home/{id}/edit', [PostsController::class, 'edit']);
// Route::put('/home/{id}', [PostsController::class, 'update']);
// Route::delete('/home/{id}', [PostsController::class, 'delete']);



