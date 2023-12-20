<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/register', function () { return view('register'); });
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(
    function()
    {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/users', function () { return view('users'); });

        Route::get('/dictionary', [DictionaryController::class, 'index'])->name('dictionary.index');
        Route::post('/dictionary/create', [DictionaryController::class, 'create'])->name('dictionary.create');
        Route::put('/dictionary/{id}/toggleBlock', [DictionaryController::class, 'toggleBlock'])->name('dictionary.toggleBlock');
        Route::delete('/dictionary/{id}', [DictionaryController::class, 'delete'])->name('dictionary.delete');

        Route::post('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/comment/create', [CommentController::class, 'create'])->name('comment.create');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
