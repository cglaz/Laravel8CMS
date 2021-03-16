<?php
use Illuminate\Support\Facades\Route;

Route::get('/page/{page}', [App\Http\Controllers\PageController::class, 'show'])->name('page.index');

Route::middleware('auth')->group(function () {
    Route::get('/admin/pages/view', [App\Http\Controllers\PageController::class, 'view'])->name('admin.view.pages');
    Route::get('/admin/page/{page}/edit', [App\Http\Controllers\PageController::class, 'edit'])->name('admin.edit.page');
    Route::patch('/admin/page/{page}/update', [App\Http\Controllers\PageController::class, 'update'])->name('admin.update.page');

    Route::get('/admin/page/create', [App\Http\Controllers\PageController::class, 'create'])->name('admin.create.page');
    Route::post('/admin/page/store', [App\Http\Controllers\PageController::class, 'store'])->name('admin.store.page');
    Route::delete('/admin/page/{page}/destroy', [App\Http\Controllers\PageController::class, 'destroy'])->name('admin.destroy.page');

});
