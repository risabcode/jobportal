<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index', [
            'jobs' => Job::latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        Job::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'location' => $request->location,
            'employment_type' => $request->employment_type,
            'status' => $request->status,
            'posted_at' => now(),
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created.');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return back()->with('success', 'Job updated.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Job deleted.');
    }
}
