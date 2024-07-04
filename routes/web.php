<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\AdministratorController;


// GET Routes
Route::get('/notifications', [NotificationController::class, 'userNotifications'])->name('notifications');
Route::get('/browsing', [BrowsingController::class, 'index'])->name('browsing');
Route::get('/moderator-themes', [ModeratorController::class, 'index'])->name('moderatorThemes')->middleware('moderator');
Route::get('/admin', [AdministratorController::class, 'index'])->name('adminPage');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/info', [ProfileController::class, 'info'])->name('profile.info');
Route::get('/profile/posts', [PostController::class, 'userPosts'])->name('profile.posts');
Route::get('/profile/saved', [PostController::class, 'savedPosts'])->name('profile.saved');
Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
Route::get('/profile/works', [ProfileController::class, 'works'])->name('profile.works');
Route::get('/profile/themes', [ProfileController::class, 'themes'])->name('profile.themes');
Route::get('/theme/{themeId}/posts', [ThemeController::class, 'show'])->name('theme.posts');
Route::get('/theme/{themeId}/news', [ThemeController::class, 'news'])->name('theme.news');
Route::get('/theme/{themeId}/settings', [ThemeController::class, 'settings'])->name('theme.settings');
Route::get('/theme/{themeId}/polls', [ThemeController::class, 'polls'])->name('theme.polls');
Route::get('/following', function () {
    return view('following');
})->name('following');
Route::get('/notifications', [NotificationController::class, 'userNotifications'])->name('notifications');
Route::get('/theme/{themeId}', [ThemeController::class, 'show'])->name('theme.show');
Route::get('/search/themes', [ThemeController::class, 'search'])->name('search.themes');
Route::get('/staffsettings', function () {
    return view('staffSettings');
})->name('staffSettings');

// POST Routes
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
Route::post('/theme/{themeId}/follow', [ThemeController::class, 'follow'])->name('theme.follow');
Route::post('/themes/{themeId}/post/store', [ThemeController::class, 'storePost'])->name('theme.post.store');
Route::post('/admin/turnModerator/{userId}', [AdministratorController::class, 'turnModerator'])->name('admin.turnModerator');
Route::post('/admin/turnAdministrator/{userId}', [AdministratorController::class, 'turnAdministrator'])->name('admin.turnAdministrator');
Route::post('/admin/promoteAdministrator/{userId}', [AdministratorController::class, 'promoteAdministrator'])->name('admin.promoteAdministrator');

// DELETE Routes
Route::delete('/admin/user/delete/{userId}', [AdministratorController::class, 'deleteAccount'])->name('admin.deleteAccount');
Route::delete('/admin/user/demote/{userId}', [AdministratorController::class, 'demoteUser'])->name('admin.demoteUser');