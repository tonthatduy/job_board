<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('jobs', JobController::class)->except(['show']);
    });
});
