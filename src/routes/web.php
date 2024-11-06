<?php

use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\DisableBackBtn;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostCommentController;

Route::get('/register-page', function () {
    return view('pages/auth/register');
})->name('register-page');
Route::get('/', function () {
    return view('pages/landing/landing-page');
})->name('landing-page');

// Auth Controller
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('/verify-waiting', [AuthController::class, 'emailVerifyRedirect']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'submitForgotPasswordForm'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('password.update');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register-form', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth')->name('login');
// Resend Email
Route::get('/resend-email', [AuthController::class, 'resendEmailVerification']);

Route::middleware(['auth', DisableBackBtn::class])->group(function () {
    Route::get('/users/search/{id}', [UserController::class, 'search'])->name('users.search');
    Route::get('/profile-page', [ProfileController::class, 'profilePage'])->name('profile-page');
    Route::get('/dashboard/{id}', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'app'])->name('app');
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/follow-ajax/{user}', [FollowController::class, 'followAjax'])->name('follow.ajax');
    Route::post('/unfollow-ajax/{user}', [FollowController::class, 'unfollowAjax'])->name('unfollow.ajax');
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.profile');
    Route::post('/post', [PostController::class, 'create'])->name('post');
    Route::delete('/post/{post}/delete', [PostController::class, 'deletePost'])->name('delete.post');
    Route::put('/edit-post/{post}', [PostController::class, 'editPost'])->name('edit.post');
    Route::get('/edit-post/{post}', [PostController::class, 'viewPost'])->name('view.post');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/post/{post}/like', [PostController::class, 'like'])->name('like.post');
    Route::post('/post/{post}/unlike', [PostController::class, 'unlike'])->name('unlike.post');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show.post');
    Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->name('posts.comments.store');
    Route::put('/comments/{comment}/edit', [PostCommentController::class, 'editComment'])->name('posts.comments.edit');
    Route::delete('/comment/{comment}/delete', [PostCommentController::class, 'delete'])->name('delete.comment');
    Route::get('/postDetails/{id}', [PostController::class, 'postDetails'])->name('post.detail');
    Route::get('/postDetails/{id}', [PostController::class, 'sharePostPage'])->name('post.share');
    Route::post('/share/{id}', [PostController::class, 'sharePost'])->name('share.post');
    Route::get('/posts/{id}/{x}', [ProfileController::class, 'profileNav'])->name('posts');
    Route::get('/followers/{id}/{x}', [ProfileController::class, 'profileNav'])->name('followers');
    Route::get('/following/{id}/{x}', [ProfileController::class, 'profileNav'])->name('following');
    Route::get('/photos/{id}/{x}', [ProfileController::class, 'profileNav'])->name('photos');
    Route::get('/about/{id}/{x}', [ProfileController::class, 'profileNav'])->name('about');
});
