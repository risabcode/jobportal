@extends('layouts.app')

@section('title','Careers | CareerVentory')

@section('content')

<!-- PAGE INTRO -->
<section class="bg-white py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">

            <span class="inline-block mb-2 text-sm font-semibold uppercase tracking-wide text-brand">
                Careers
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
                Build a Career That Moves You Forward
            </h1>

            <p class="text-base md:text-lg text-slate-600 leading-relaxed">
                Share your profile once — we’ll connect you with opportunities
                aligned to your skills, goals, and long-term growth.
            </p>

        </div>
    </div>
</section>

<!-- JOB LIST -->
<section class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-10 text-center">
            Current Openings
        </h2>

        @if($jobs->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="service-card bg-white border border-slate-200 rounded-xl p-6 flex flex-col">

                        <h3 class="text-lg font-semibold text-slate-900">
                            {{ $job->title }}
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $job->location ?? 'Location not specified' }}
                            • {{ $job->employment_type ?? '—' }}
                        </p>

                        <p class="mt-4 text-sm text-slate-600 flex-1">
                            {{ \Illuminate\Support\Str::limit($job->description, 140) }}
                        </p>

                        <a href="#resume-upload"
                           data-job="{{ $job->id }}"
                           data-title="{{ $job->title }}"
                           class="apply-btn mt-6 inline-flex justify-center items-center
                                  bg-brand text-white py-2.5 rounded-lg font-semibold
                                  hover:bg-brand-dark transition">
                            Apply Now
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-slate-600">
                No open positions at the moment. You can still submit your resume below.
            </p>
        @endif

    </div>
</section>

<!-- APPLICATION FORM -->
<section id="resume-upload" class="bg-white py-20 border-t border-slate-100">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-10 md:p-14">

            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-slate-900">
                    Apply for <span id="job-title" class="text-brand">a Position</span>
                </h2>
                <p class="text-slate-600 mt-2 max-w-xl mx-auto">
                    Fill in your details and upload your resume.
                </p>
            </div>

            {{-- STATUS --}}
            @if(session('status') === 'success')
                <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-center font-medium">
                    ✅ {{ session('message') }}
                </div>
            @endif

            @if(session('status') === 'failed')
                <div class="mb-8 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-center font-medium">
                    ❌ {{ session('message') }}
                </div>
            @endif

            {{-- ERRORS --}}
            @if($errors->any())
                <div class="mb-8 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('career.upload') }}"
                  enctype="multipart/form-data"
                  class="space-y-8"
                  onsubmit="return validateJobSelection()">
                @csrf

                <input type="hidden" name="job_id" id="job_id">

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">First Name *</label>
                        <input name="first_name" value="{{ old('first_name') }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Last Name *</label>
                        <input name="last_name" value="{{ old('last_name') }}" class="form-input" required>
                    </div>
                </div>

                <div>
                    <label class="form-label">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Phone Number</label>
                    <input name="phone" value="{{ old('phone') }}" class="form-input">
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">Preferred Location</label>
                        <input name="preferred_location" value="{{ old('preferred_location') }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Experience (Years)</label>
                        <input type="number" step="0.5" name="experience_years"
                               value="{{ old('experience_years') }}" class="form-input">
                    </div>
                </div>

                <div>
                    <label class="form-label">Upload Resume *</label>
                    <div class="relative border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-brand transition">
                        <input type="file" name="resume" required
                               class="absolute inset-0 opacity-0 cursor-pointer">
                        <p class="text-slate-600 text-sm">
                            📄 Drag & drop or <span class="text-brand font-semibold">browse</span><br>
                            <span class="text-xs text-slate-400">PDF, DOC, DOCX • Max 5MB</span>
                        </p>
                    </div>
                </div>

                <button class="w-full bg-brand hover:bg-brand-dark
                               text-white py-3.5 rounded-xl font-semibold text-lg transition">
                    Apply Now
                </button>
            </form>

            <p class="text-xs text-slate-500 text-center mt-10">
                🔒 Your information is secure and confidential.
            </p>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.apply-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('job_id').value = btn.dataset.job;
            document.getElementById('job-title').innerText = btn.dataset.title;
        });
    });
});

function validateJobSelection() {
    if (!document.getElementById('job_id').value) {
        alert('Please select a job to apply for.');
        return false;
    }
    return true;
}
</script>
@endpush

@push('head')
<style>
.form-label {
    display:block;
    font-size:0.875rem;
    font-weight:600;
    color:#334155;
    margin-bottom:0.4rem;
}
.form-input {
    width:100%;
    border:1px solid #cbd5e1;
    padding:0.75rem 0.9rem;
    border-radius:0.75rem;
}
.form-input:focus {
    outline:none;
    border-color:#004680;
    box-shadow:0 0 0 3px rgba(0,70,128,.15);
}
</style>
@endpush
