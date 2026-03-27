<?php

use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/job', function () {
    $job = Job::all();
    return view('job', compact('job'));
});
