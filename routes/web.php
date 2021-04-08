<?php

use App\Http\Controllers\AdminBlogsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{post}', [HomeController::class, 'show'])->name('post');

Route::get('/user-page/{user}', [PostController::class, 'index'])->name('user-page');

Route::get('/users', [AdminUsersController::class, 'index'])->name('users');
Route::get('/blogs', [AdminBlogsController::class, 'index'])->name('blogs');
Route::get('/pending-blogs', [AdminBlogsController::class, 'show'])->name('pending-blogs');
Route::patch('/blogs/{post}', [AdminBlogsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{post}', [AdminBlogsController::class, 'destroy'])->name('blogs.destroy');


Route::get('/loginUser', [UserController::class, 'showLogin'])->name('loginUser');
Route::get('/registerUser', [UserController::class, 'showRegister'])->name('registerUser');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logut');
