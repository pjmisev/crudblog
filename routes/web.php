<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

// Blog routes
Route::resource('posts', PostController::class);

Auth::routes();

// Event routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Blog routes
Route::resource('events', EventController::class);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
