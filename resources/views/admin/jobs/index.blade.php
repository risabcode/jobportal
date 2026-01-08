@extends('layouts.admin')

@section('title', 'Jobs')
@section('page-title', 'Jobs')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-slate-800">
                Job Listings
            </h2>
            <p class="text-sm text-slate-600 mt-1">
                Manage all job postings.
            </p>
        </div>

        <a href="{{ route('admin.jobs.create') }}"
           class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">
            + Create Job
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Jobs Table -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Title</th>
                        <th class="px-6 py-4 text-left">Location</th>
                        <th class="px-6 py-4 text-left">Type</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse($jobs as $job)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $job->title }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $job->location ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $job->employment_type ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    @if($job->status === 'published') bg-emerald-100 text-emerald-700
                                    @elseif($job->status === 'draft') bg-slate-100 text-slate-600
                                    @else bg-red-100 text-red-700
                                    @endif">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.jobs.edit', $job) }}"
                                   class="inline-block px-3 py-1.5 rounded-lg bg-sky-600 text-white text-xs font-semibold hover:bg-sky-700 transition">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.jobs.destroy', $job) }}"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this job?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-3 py-1.5 rounded-lg bg-red-600 text-white text-xs font-semibold hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                                No jobs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-slate-50">
            {{ $jobs->links() }}
        </div>

    </div>

</div>

@endsection
