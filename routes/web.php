<?php

use App\Http\Controllers\AlertsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkipController;
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

Route::get('/', [MainController::class, 'show'])->name('main')->middleware('auth');

Route::post('/like/{user_id}', [LikeController::class, 'create'])->name('set_like')->middleware('auth');

Route::post('/skip/{user_id}', [SkipController::class, 'create'])->name('set_skip')->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'show'])->name('register');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/profile/{id}', [UserInfoController::class, 'show'])->name('profile');

Route::get('/profile_edit', [UserInfoController::class, 'show_edit'])->name('profile_edit')->middleware('auth');

Route::post('/profile_edit', [UserInfoController::class, 'store_edit'])->middleware('auth');

Route::get('/search', [SearchController::class, 'show'])->name('search');

Route::get('/chat', [ChatController::class, 'show'])->name('chat')->middleware('auth');

Route::get('/chat/{id}', [MessageController::class, 'show'])->name('messages')->middleware('auth');

Route::get('/alert', [AlertsController::class, 'show'])->name('alert')->middleware('auth');
