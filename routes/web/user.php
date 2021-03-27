<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::put('/admin/user/{user}/change/password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('admin.change.user.password');
    Route::put('/admin/user/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.update.user.profile');
    Route::delete('/admin/user/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy.user');
});

Route::middleware('role:admin', 'auth')->group(function () {
    Route::get('/admin/users/view', [App\Http\Controllers\UserController::class, 'view'])->name('admin.view.users');
    Route::put('/admin/users/roles/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('admin.user.role.attach');
    Route::put('/admin/users/roles/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('admin.user.role.detach');

});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/admin/user/{user}/show', [App\Http\Controllers\UserController::class, 'show'])->name('admin.show.user');
});
