<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCommentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\CommentController;
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

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('/users', AdminController::class);

Route::resource('/admin', AdminPostsController::class);

Route::resource('/admin/store', AdminPostsController::class);

Route::resource('/comments', AdminCommentsController::class);

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/comment/{postId}', [CommentController::class, 'insert'])->name('postComment');

Route::get('/posts/{post}', [HomeController::class, 'show'])->name('post');

Route::get('/user-page/{user}', [PostController::class, 'index'])->name('user-page');

Route::get('/loginUser', [UserController::class, 'showLogin'])->name('loginUser');
Route::get('/registerUser', [UserController::class, 'showRegister'])->name('registerUser');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logut');
