<?php

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.index');

Route::middleware('auth')->group(function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.panel');
    Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.create.post');
    Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('admin.store.post');
    Route::get('/admin/posts/view', [App\Http\Controllers\PostController::class, 'view'])->name('admin.view.posts');
    Route::get('/admin/post/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.edit.post');
});
