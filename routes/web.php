<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () { return view('home'); });
Route::get('/profile', function () { return view('profile'); });
Route::get('/users', function () { return view('users'); });

Route::get('/dictionary', [DictionaryController::class, 'index'])->name('dictionary.index');
Route::post('/dictionary/create', [DictionaryController::class, 'create'])->name('dictionary.create');
Route::put('/dictionary/{id}/toggleBlock', [DictionaryController::class, 'toggleBlock'])->name('dictionary.toggleBlock');
Route::delete('/dictionary/{id}', [DictionaryController::class, 'delete'])->name('dictionary.delete');

Route::get('/register', function () { return view('register'); });
Route::get('/login', function () { return view('login'); });
Route::redirect('/logout', '/login');
