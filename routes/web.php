<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ABOUT
Route::get('/about', [AboutController::class, 'index']);

// ARTICLE

Route::get('/article', [ArticlesController::class, 'index'])->name('article');

Route::get('/article/{id}/edit', [ArticlesController::class, 'edit'])->name('edit')->middleware('auth');

Route::get('/article/create', [ArticlesController::class, 'create'])->name('create')->middleware('auth');

Route::post('/article', [ArticlesController::class, 'store'])->name('store');

Route::get('/article/{id}', [ArticlesController::class, 'show'])->name('show');

Route::put('/article/{id}', [ArticlesController::class, 'update'])->name('update');

Route::delete('/article/{id}', [ArticlesController::class, 'delete'])->name('delete');

// Auth Register Login Logout

Route::get('/register', [AuthController::class, 'registerForm'])->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

// HOME 

Route::get('/', function () {
    return view('home'); 
})->name('home');

// Mail

Route::get('/test_email', [mailController::class, 'email']);

Route::get('/forget', [mailController::class, 'forget']);