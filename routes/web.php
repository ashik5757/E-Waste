<?php

use App\Http\Controllers\AuthController;
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

Route::get('/blog', function() {
    return view('blog.blogsite');
})->name('blog');




//Auth

// Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/signup', [AuthController::class, 'store'])->name('signup');











Route::get('/resorces', function() {
    return view('resources');
})->name('resources');



