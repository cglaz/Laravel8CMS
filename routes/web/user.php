<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::put('/admin/user/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.update.user.profile');
    Route::delete('/admin/user/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy.user');
});

Route::middleware('role:admin')->group(function () {
    Route::get('/admin/users/view', [App\Http\Controllers\UserController::class, 'view'])->name('admin.view.users');

});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/admin/user/{user}/show', [App\Http\Controllers\UserController::class, 'show'])->name('admin.show.user');
});
