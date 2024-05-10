<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Import the controller

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

// GET
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/profile/info', function () {
    return view('components.profile_info');
});

Route::get('/profile/createPost', function () {
    return view('components.createPost');
});

Route::get('/profile/posts', function () {
    return view('components.profile_posts');
});

Route::get('/profile/saved', function () {
    return view('components.profile_saved');
});

Route::get('/profile/works', function () {
    return view('components.profile_works');
});

Route::get('/following', function () {
    return view('following');
})->name('following');

// POST
Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::post('/comment/createComment', [CommentController::class, 'createComment'])->name('comments.store');