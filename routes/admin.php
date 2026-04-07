<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('jobs/trash', [JobController::class,'trash'])->name('trash');
        Route::put('jobs/{id}/restore', [JobController::class,'restore'])->name('jobs.restore');
        Route::delete('jobs/{id}/force-delete', [JobController::class,'forceDelete'])->name('jobs.force-delete');

        Route::resource('jobs', JobController::class)->except(['show']);
    });
});
