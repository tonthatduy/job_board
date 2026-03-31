<?php

use App\Http\Controllers\JobController;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [JobController::class, 'index']);

Route::get('/job/{slug}', [JobController::class,'show']) -> name('jobs.show');
