<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
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

Route::get('/{user}/blog-create', [BlogController::class, 'create'])->name('blog.create')->middleware('c.auth');
Route::post('/{user}/blog-store', [BlogController::class, 'store'])->name('blog.store')->middleware('c.auth');
Route::post('/blog-update/{id}', [BlogController::class, 'update'])->name('blog.update')->middleware('c.auth');
Route::get('/blog-delete/{id}', [BlogController::class, 'delete'])->name('blog.delete')->middleware('c.auth');
Route::get('/blog-delete-image/{blog_id}/{imgid}', [BlogController::class, 'delete_image'])->name('blog.delete_image')->middleware('c.auth');


Route::get('/blog-details/{slug}/', [BlogController::class, 'details'])->name('blog.details')->middleware('c.auth');
Route::get('/blog-update/{user}/{slug}/', [BlogController::class, 'edit'])->name('blog.edit')->middleware('c.auth');






//Auth

// Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/signup', [AuthController::class, 'store'])->name('signup');
Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





//Profile

Route::get('profile/{id}', [ProfileController::class, 'profile'])->name('profile')->middleware('c.auth');







Route::get('/resources', [FeatureController::class, 'feature'])->name('resources')->middleware('c.auth');
Route::get('{user}/feature/create', [FeatureController::class, 'create'])->name('feature.create')->middleware('c.auth');
Route::post('/{user}/feature-store', [FeatureController::class, 'store'])->name('feature.store')->middleware('c.auth');
Route::get('/feature-details/{slug}', [FeatureController::class, 'details'])->name('feature.details')->middleware('c.auth');




