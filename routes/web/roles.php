<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/roles/view', [App\Http\Controllers\RoleController::class, 'view'])->name('admin.view.roles');
    Route::post('/admin/roles/', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.store.roles');
    Route::delete('/admin/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.destroy.roles');
    Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.edit.roles');
    Route::put('/admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.update.roles');
    Route::put('/admin/roles/{role}/permission/attach', [App\Http\Controllers\RoleController::class, 'attach'])->name('admin.role.permission.attach');
    Route::put('/admin/roles/{role}/permission/detach', [App\Http\Controllers\RoleController::class, 'detach'])->name('admin.role.permission.detach');
});
