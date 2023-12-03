<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use Illuminate\Auth\AuthManager;
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
})->name('home');


Route::get('/about', function()  {
    return view('about');
})->name('about');



// Blogsite

Route::get('/blog', [BlogController::class, 'blogsite'])->name('blog')->middleware('c.auth');
Route::post('/blog-create', [BlogController::class, 'store'])->name('blog.store')->middleware('c.auth');





//Auth

// Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/signup', [AuthController::class, 'store'])->name('signup');
Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





//Profile

Route::get('profile/{id}', [ProfileController::class, 'profile'])->name('profile')->middleware('c.auth');






Route::get('/resources', [ResourceController::class, 'resources'])->name('resources')->middleware('c.auth');



