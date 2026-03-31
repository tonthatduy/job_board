<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::with(['company','location','level','categories'])->latest()->get();
        return view('pages.home', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('slug', $slug)
           ->with(['company','location','level','categories'])
           ->firstOrFail();

        $relatedJobs = Job::with(['company','location','level','categories'])
                    -> where('id', '!=', $job->id)
                    ->latest()
                    ->take(4)
                    ->get();

        return view('pages.job-detail', compact('job', 'relatedJobs'));
    }
}
