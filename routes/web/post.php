
<?php
use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.index');

Route::middleware('auth')->group(function () {
    Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.create.post');
    Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('admin.store.post');
    Route::get('/admin/posts/view', [App\Http\Controllers\PostController::class, 'view'])->name('admin.view.posts');

    Route::delete('/admin/post/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.destroy.post');
    Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('admin.update.post');
    Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.edit.post');

});
