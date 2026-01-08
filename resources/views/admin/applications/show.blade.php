@extends('layouts.admin')

@section('title', 'Application Details')
@section('page-title', 'Application Details')

@section('content')

<div class="space-y-6 max-w-5xl mx-auto">

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Application Info -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold text-slate-800 mb-4">
            Application Overview
        </h2>

        <div class="grid sm:grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-slate-500">Applied At</p>
                <p class="font-semibold text-slate-800">
                    {{ $application->applied_at?->format('d M Y, h:i A') }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Status</p>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                    @class([
                        'bg-sky-100 text-sky-700' => $application->status === 'new',
                        'bg-yellow-100 text-yellow-700' => $application->status === 'reviewed',
                        'bg-red-100 text-red-700' => $application->status === 'rejected',
                        'bg-emerald-100 text-emerald-700' => $application->status === 'hired',
                    ])">
                    {{ ucfirst($application->status) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Job Info -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">
            Job Details
        </h2>

        <p class="font-semibold text-slate-800">
            {{ $application->job->title }}
        </p>

        <p class="text-sm text-slate-600 mt-1">
            {{ $application->job->location ?? '—' }}
            • {{ $application->job->employment_type ?? '—' }}
        </p>

        <p class="text-sm text-slate-600 mt-3">
            {{ $application->job->description }}
        </p>
    </div>

    <!-- Candidate Info -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">
            Candidate Information
        </h2>

        <div class="grid sm:grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-slate-500">Name</p>
                <p class="font-semibold text-slate-800">
                    {{ $application->candidate->first_name }}
                    {{ $application->candidate->last_name }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Email</p>
                <p class="font-semibold text-slate-800">
                    {{ $application->candidate->email }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Phone</p>
                <p class="font-semibold text-slate-800">
                    {{ $application->candidate->phone ?? '—' }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Experience</p>
                <p class="font-semibold text-slate-800">
                    {{ $application->candidate->experience_years ?? '—' }} yrs
                </p>
            </div>
        </div>
    </div>

    <!-- Update Status -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">
            Update Application Status
        </h2>

        <form method="POST"
              action="{{ route('admin.applications.update', $application) }}"
              class="flex flex-col sm:flex-row gap-4">
            @csrf
            @method('PUT')

            <select name="status"
                    class="border rounded-lg px-4 py-2 w-full sm:w-64">
                @foreach(['new','reviewed','rejected','hired'] as $status)
                    <option value="{{ $status }}"
                        @selected($application->status === $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>

            <button class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-emerald-700 transition">
                Update Status
            </button>
        </form>
    </div>

    <!-- Back Button -->
    <div>
        <a href="{{ route('admin.applications.index') }}"
           class="inline-block text-slate-600 hover:underline">
            ← Back to Applications
        </a>
    </div>

</div>

@endsection
