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
    return view('profileInfo');
})->name('profile.info');

Route::get('/profile/createPost', function () {
    return view('components.createPost');
});

Route::get('/profile/posts', function () {
    return view('profilePosts');
})->name('profile.posts');

Route::get('/profile/saved', function () {
    return view('profileSaved');
})->name('profile.saved');

Route::get('/profile/works', function () {
    return view('profileWorks');
})->name('profile.works');

Route::get('/profile/settings', function () {
    return view('profileSettings');
})->name('profile.settings');

Route::get('/theme/posts', function () {
    return view('theme'); // Ensure the view name matches the actual file
})->name('theme.posts');

Route::get('/theme/news', function () {
    return view('themeNews');
})->name('theme.news');

Route::get('/theme/settings', function () {
    return view('themeSettings');
})->name('theme.settings');

Route::get('/theme/polls', function () {
    return view('themePolls');
})->name('theme.polls');

Route::get('/following', function () {
    return view('following');
})->name('following');

Route::get('/notifications', function () {
    return view('notificationsPage');
})->name('notifications');

Route::get('/theme', function () {
    return view('theme');
})->name('theme');

// POST
Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::post('/comment/createComment', [CommentController::class, 'createComment'])->name('comments.store');

Route::post('/profile/settings/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');