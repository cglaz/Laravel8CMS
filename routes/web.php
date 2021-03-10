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
Route::get('/page/{page}', [App\Http\Controllers\PageController::class, 'show'])->name('page.index');
Route::get('/sitemap.xml', [App\Http\Controllers\PostController::class, 'sitemap'])->name('sitemap');

Route::middleware('auth')->group(function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.panel');

    Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.create.post');
    Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('admin.store.post');
    Route::get('/admin/posts/view', [App\Http\Controllers\PostController::class, 'view'])->name('admin.view.posts');

    Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.edit.post');
    Route::delete('/admin/post/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.destroy.post');
    Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('admin.update.post');

    Route::get('/admin/pages/view', [App\Http\Controllers\PageController::class, 'view'])->name('admin.view.pages');
    Route::get('/admin/page/{page}/edit', [App\Http\Controllers\PageController::class, 'edit'])->name('admin.edit.page');
    Route::patch('/admin/page/{page}/update', [App\Http\Controllers\PageController::class, 'update'])->name('admin.update.page');

    Route::get('/admin/page/create', [App\Http\Controllers\PageController::class, 'create'])->name('admin.create.page');
    Route::post('/admin/page/store', [App\Http\Controllers\PageController::class, 'store'])->name('admin.store.page');
    Route::delete('/admin/page/{page}/destroy', [App\Http\Controllers\PageController::class, 'destroy'])->name('admin.destroy.page');

    Route::get('/admin/users/view', [App\Http\Controllers\UserController::class, 'view'])->name('admin.view.users');
    Route::get('/admin/user/{user}/show', [App\Http\Controllers\UserController::class, 'show'])->name('admin.show.user');
    Route::put('/admin/user/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.update.user.profile');
    Route::delete('/admin/user/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy.user');
});
