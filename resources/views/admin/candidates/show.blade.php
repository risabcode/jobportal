@extends('layouts.admin')

@section('title', 'Candidate Details')
@section('page-title', 'Candidate Details')

@section('content')

<div class="space-y-6">

    <!-- Back Button -->
    <div>
        <a href="{{ route('admin.candidates.index') }}"
           class="inline-flex items-center text-sm font-semibold text-sky-600 hover:underline">
            ← Back to Candidates
        </a>
    </div>

    <!-- Candidate Info -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold text-slate-800 mb-4">
            {{ $candidate->full_name }}
        </h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
            <div>
                <p class="text-slate-500">Email</p>
                <p class="font-medium text-slate-800">{{ $candidate->email }}</p>
            </div>

            <div>
                <p class="text-slate-500">Phone</p>
                <p class="font-medium text-slate-800">
                    {{ $candidate->phone ?? '—' }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Preferred Location</p>
                <p class="font-medium text-slate-800">
                    {{ $candidate->preferred_location ?? '—' }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Experience</p>
                <p class="font-medium text-slate-800">
                    {{ $candidate->experience_years ? $candidate->experience_years.' years' : '—' }}
                </p>
            </div>

            <div>
                <p class="text-slate-500">Profile Created</p>
                <p class="font-medium text-slate-800">
                    {{ $candidate->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Resumes -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">
            Uploaded Resumes
        </h3>

        @if($candidate->resumes->count())
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">File Name</th>
                            <th class="px-4 py-3 text-left">Type</th>
                            <th class="px-4 py-3 text-left">Size</th>
                            <th class="px-4 py-3 text-left">Uploaded</th>
                            <th class="px-4 py-3 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @foreach($candidate->resumes as $resume)
                            <tr>
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $resume->filename }}
                                </td>

                                <td class="px-4 py-3 text-slate-600">
                                    {{ $resume->mime }}
                                </td>

                                <td class="px-4 py-3 text-slate-600">
                                    {{ number_format($resume->size / 1024, 1) }} KB
                                </td>

                                <td class="px-4 py-3 text-slate-600">
                                    {{ $resume->uploaded_at->format('d M Y') }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.resumes.download', $resume) }}"
                                       class="inline-block px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition">
                                        Download
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-slate-500 text-sm">
                No resumes uploaded yet.
            </p>
        @endif
    </div>

</div>

@endsection
