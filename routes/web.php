<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Models\Blog;
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

    $totalPosts = Blog::count();
    $recentposts = null;
    

    if ($totalPosts>=4) {
        $recentposts = Blog::latest()->take(4)->get();
    }
    elseif ($totalPosts>=3) {
        $recentposts = Blog::latest()->take(3)->get();
    }
    elseif ($totalPosts>=2) {
        $recentposts = Blog::latest()->take(2)->get();
    }
    elseif ($totalPosts>=1) {
        $recentposts = Blog::latest()->take(1)->get();
    }
    else {
        $recentposts = Blog::latest()->take(0)->get();
    }


    return view('home', compact('recentposts'));

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

Route::get('profile/{user}', [ProfileController::class, 'profile'])->name('profile')->middleware('c.auth');
Route::post('profile-update/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('c.auth');






Route::get('/features', [FeatureController::class, 'feature'])->name('features')->middleware('c.auth');

Route::get('{user}/feature-create', [FeatureController::class, 'create'])->name('feature.create')->middleware('c.auth');
Route::post('/{user}/feature-store', [FeatureController::class, 'store'])->name('feature.store')->middleware('c.auth');

Route::post('/feature-update/{id}', [FeatureController::class, 'update'])->name('feature.update')->middleware('c.auth');
Route::get('/feature-delete/{id}', [FeatureController::class, 'delete'])->name('feature.delete')->middleware('c.auth');
Route::get('/feature-delete-video/{feature_id}/{videoid}', [FeatureController::class, 'delete_video'])->name('feature.delete_video')->middleware('c.auth');
Route::get('/feature-delete-thumbnail/{feature_id}/', [FeatureController::class, 'delete_thumbnail'])->name('feature.delete_thumbnail')->middleware('c.auth');



Route::get('/feature-details/{slug}', [FeatureController::class, 'details'])->name('feature.details')->middleware('c.auth');
Route::get('/feature-update/{user}/{slug}/', [FeatureController::class, 'edit'])->name('feature.edit')->middleware('c.auth');




//community

Route::get('/community', [CommunityController::class, 'index'])->name('community.index')->middleware('c.auth');
Route::get('/community/{user}/create-thread/', [CommunityController::class, 'create'])->name('community.create')->middleware('c.auth');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store')->middleware('c.auth');
Route::get('/community/thread-details/', [CommunityController::class, 'details'])->name('thread.details')->middleware('c.auth');
Route::post('/community/{thread}/answer', [CommunityController::class, 'addAnswer'])->name('community.addAnswer')->middleware('c.auth');

Route::get('/community-thread/{thread_id}/', [CommunityController::class, 'edit'])->name('thread.edit')->middleware('c.auth');
Route::post('/thread-update/{id}', [CommunityController::class, 'update'])->name('thread.update')->middleware('c.auth');
Route::get('/thread-delete/{id}', [CommunityController::class, 'delete'])->name('thread.delete')->middleware('c.auth');




