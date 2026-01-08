<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeUploadRequest;
use App\Models\Candidate;
use App\Models\Resume;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class CareerController extends Controller
{
    /**
     * Career page with jobs
     */
    public function index()
    {
        return view('front.career.index', [
            'jobs' => Job::where('status', 'published')
                ->orderByDesc('posted_at')
                ->get(),
        ]);
    }

    /**
     * Handle job application + resume upload
     */
    public function upload(ResumeUploadRequest $request)
    {
        DB::beginTransaction();

        try {
            /**
             * 1️⃣ Create or update candidate
             */
            $candidate = Candidate::updateOrCreate(
                ['email' => $request->email],
                $request->only([
                    'first_name',
                    'last_name',
                    'phone',
                    'preferred_location',
                    'experience_years',
                ])
            );

            /**
             * 2️⃣ Upload resume
             */
            $file = $request->file('resume');

            $filename = Str::slug(
                $candidate->first_name . '-' . $candidate->last_name
            ) . '-' . time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('resumes', $filename, 'public');

            $resume = Resume::create([
                'candidate_id' => $candidate->id,
                'filename'     => $file->getClientOriginalName(),
                'path'         => $path,
                'mime'         => $file->getClientMimeType(),
                'size'         => $file->getSize(),
                'uploaded_at'  => now(),
            ]);

            /**
             * 3️⃣ Create job application (IMPORTANT PART)
             */
            if ($request->filled('job_id')) {
                Application::firstOrCreate([
                    'job_id'       => $request->job_id,
                    'candidate_id' => $candidate->id,
                ], [
                    'status'     => 'new',
                    'applied_at' => now(),
                ]);
            }

            DB::commit();

            return back()->with([
                'status'  => 'success',
                'message' => 'Application submitted successfully! Our team will contact you soon.',
            ]);

        } catch (Throwable $e) {

            DB::rollBack();

            Log::error('Career application failed', [
                'error' => $e->getMessage(),
            ]);

            return back()->withInput()->with([
                'status'  => 'failed',
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
}
