<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/permissions/view', [App\Http\Controllers\PermissionController::class, 'view'])->name('admin.view.permissions');
    Route::post('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('admin.store.permissions');
    Route::delete('/admin/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('admin.destroy.permissions');
});
