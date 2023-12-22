<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DictionaryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['guest'])->group(
    function()
    {
        Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerPage');

        Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginPage');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    }
);

Route::middleware(['auth'])->group(
    function()
    {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/user/approve', [UserController::class, 'approve'])->name('user.approve');
        Route::delete('/user', [UserController::class, 'delete'])->name('user.delete');

        Route::get('/dictionary', [DictionaryController::class, 'index'])->name('dictionary.index');
        Route::post('/dictionary', [DictionaryController::class, 'create'])->name('dictionary.create');
        Route::put('/dictionary', [DictionaryController::class, 'update'])->name('dictionary.update');
        Route::put('/dictionary/toggleBlock', [DictionaryController::class, 'toggleBlock'])->name('dictionary.toggleBlock');
        Route::delete('/dictionary', [DictionaryController::class, 'delete'])->name('dictionary.delete');

        Route::post('/post', [PostController::class, 'create'])->name('post.create');
        Route::delete('/post', [PostController::class, 'delete'])->name('post.delete');
        Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');

        Route::put('/password', [AuthController::class, 'updatePassword'])->name('password.update');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
