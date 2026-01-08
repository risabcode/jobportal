<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Http\Requests\JobApplyRequest;
use App\Models\Application;
use App\Models\Candidate;

class JobController extends Controller
{
    public function index()
    {
        return view('front.jobs.index', [
            'jobs' => Job::published()->latest()->paginate(10),
        ]);
    }

    public function show($slug)
    {
        $job = Job::published()->where('slug', $slug)->firstOrFail();
        return view('front.jobs.show', compact('job'));
    }

    public function apply(JobApplyRequest $request, Job $job)
    {
        $candidate = Candidate::firstOrCreate(
            ['email' => $request->email],
            $request->validated()
        );

        Application::create([
            'job_id' => $job->id,
            'candidate_id' => $candidate->id,
            'cover_letter' => $request->cover_letter,
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}
