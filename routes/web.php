<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [Postcontroller::class, 'index'])->name('posts.index');

Route::get('/posts/create', [Postcontroller::class, 'create'])->name('posts.create');

Route::post('/posts', [Postcontroller::class, 'store'])->name('posts.store');

Route::get('/posts/{post}', [Postcontroller::class, 'show'])->name('posts.show');

Route:: get('/posts/{post}/edit', [Postcontroller::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [Postcontroller::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [Postcontroller::class, 'destroy'])->name('posts.destroy');



