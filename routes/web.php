<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\NewsController;

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

Route::get('/profile/posts', [PostController::class, 'userPosts'])->name('profile.posts');

Route::get('/profile/saved', [PostController::class, 'savedPosts'])->name('profile.saved');

Route::get('/profile/works', function () {
    return view('profileWorks');
})->name('profile.works');

Route::get('/profile/settings', function () {
    return view('profileSettings');
})->name('profile.settings');

Route::get('/theme/{themeId}/posts', [ThemeController::class, 'show'])->name('theme.posts');
Route::get('/theme/{themeId}/news', [ThemeController::class, 'news'])->name('theme.news');
Route::get('/theme/{themeId}/settings', [ThemeController::class, 'settings'])->name('theme.settings');
Route::get('/theme/{themeId}/polls', [ThemeController::class, 'polls'])->name('theme.polls');

Route::get('/following', function () {
    return view('following');
})->name('following');

Route::get('/notifications', function () {
    return view('notificationsPage');
})->name('notifications');

Route::get('/theme/{themeId}', [ThemeController::class, 'show'])->name('theme.show');
Route::get('/search/themes', [ThemeController::class, 'search'])->name('search.themes');

// POST
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::post('/comment/createComment', [CommentController::class, 'createComment'])->name('comments.store');
Route::post('/post/save/{postID}', [PostController::class, 'savePost'])->name('post.savePost');
Route::post('/profile/settings/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
Route::post('/poll/store', [PollController::class, 'store'])->name('poll.store');
Route::post('/poll/vote/{poll}', [PollController::class, 'vote'])->name('poll.vote');