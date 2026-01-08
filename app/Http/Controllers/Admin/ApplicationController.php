<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * List all applications
     */
    public function index()
    {
        return view('admin.applications.index', [
            'applications' => Application::with(['job', 'candidate'])
                ->latest('applied_at')
                ->paginate(20),
        ]);
    }

    /**
     * Show single application
     */
    public function show(Application $application)
    {
        $application->load(['job', 'candidate']);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Update application status
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:new,reviewed,rejected,hired',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Application status updated.');
    }

    /**
     * Delete application
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return back()->with('success', 'Application deleted.');
    }
}
