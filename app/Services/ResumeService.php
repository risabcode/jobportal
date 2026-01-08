<?php

namespace App\Services;

use App\Models\Resume;
use App\Models\Candidate;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ResumeService
{
    /**
     * Store uploaded resume file and create database record
     *
     * @param  UploadedFile  $file
     * @param  Candidate     $candidate
     * @return Resume
     */
    public function storeUploaded(UploadedFile $file, Candidate $candidate): Resume
    {
        // Validate file object
        if (! $file->isValid()) {
            Log::warning('Uploaded resume file is invalid', ['candidate_id' => $candidate->id]);
            throw new \RuntimeException('Uploaded file is invalid.');
        }

        // Build a safe filename
        $ext = $file->getClientOriginalExtension();
        $filename = Str::slug($candidate->first_name . ' ' . $candidate->last_name) .
                    '-' . time() . '.' . $ext;

        // Decide storage path (public disk used as example)
        $path = $file->storeAs('resumes', $filename, 'public'); // storage/app/public/resumes/...

        // If storeAs returned false/null, throw
        if (! $path) {
            Log::error('Failed to store resume file', ['candidate_id' => $candidate->id]);
            throw new \RuntimeException('Failed to store resume file.');
        }

        // Create Resume model
        $resume = Resume::create([
            'candidate_id' => $candidate->id,
            'filename'     => $file->getClientOriginalName(),
            'path'         => $path,
            'mime'         => $file->getClientMimeType(),
            'size'         => $file->getSize(),
            'uploaded_at'  => Carbon::now(),
        ]);

        Log::info('Resume stored', [
            'candidate_id' => $candidate->id,
            'resume_id' => $resume->id,
            'path' => $path,
        ]);

        return $resume;
    }
}
