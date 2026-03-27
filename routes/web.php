<?php

use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/job', function () {
    $jobs = Job::with(['company','location','level','categories'])->paginate(5);
    return view('job', compact('jobs'));
});

Route::get('/job/{slug}', function ($slug) {
    $job = Job::where('slug', $slug)
            ->with(['company','location','level','categories'])
            ->firstOrFail();
    return view('job-detail', compact('job'));
});
