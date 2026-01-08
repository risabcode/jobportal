<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * List candidates
     */
    public function index()
    {
        return view('admin.candidates.index', [
            'candidates' => Candidate::withCount('resumes')
                ->latest()
                ->paginate(20),
        ]);
    }

    /**
     * Show candidate profile
     */
    public function show(Candidate $candidate)
    {
        $candidate->load('resumes');

        return view('admin.candidates.show', compact('candidate'));
    }

    /**
     * Download resume file
     */
    public function downloadResume(Resume $resume)
    {
        if (! Storage::disk('public')->exists($resume->path)) {
            abort(404, 'Resume file not found.');
        }

        return Storage::disk('public')->download(
            $resume->path,
            $resume->filename
        );
    }

    /**
     * Delete candidate & resumes
     */
    public function destroy(Candidate $candidate)
    {
        foreach ($candidate->resumes as $resume) {
            if (Storage::disk('public')->exists($resume->path)) {
                Storage::disk('public')->delete($resume->path);
            }
        }

        $candidate->delete();

        return redirect()
            ->route('admin.candidates.index')   // <-- use admin. prefix
            ->with('success', 'Candidate deleted successfully.');
    }
}
