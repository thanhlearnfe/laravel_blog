<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PostController;
use App\http\Controllers\CategoryController;


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
Route::resource('posts', PostController::class);
Route::get('/create',[PostController::class,'create']);
Route::get('/index',[PostController::class,'index']);
Route::get('/show/{id}',[PostController::class,'show']);

Route::resource('categories', CategoryController::class);
Route::get('/createCt',[CategoryController::class,'create']);
Route::get('/indexCt',[CategoryController::class,'index']);


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';