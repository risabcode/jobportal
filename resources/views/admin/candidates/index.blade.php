@extends('layouts.admin')

@section('title', 'Candidates')
@section('page-title', 'Candidates')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-slate-800">
                Candidate List
            </h2>
            <p class="text-sm text-slate-600 mt-1">
                View and manage all registered candidates.
            </p>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Candidates Table -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Phone</th>
                        <th class="px-6 py-4 text-left">Location</th>
                        <th class="px-6 py-4 text-left">Experience</th>
                        <th class="px-6 py-4 text-center">Resumes</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse($candidates as $candidate)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $candidate->full_name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $candidate->email }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $candidate->phone ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $candidate->preferred_location ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $candidate->experience_years ? $candidate->experience_years.' yrs' : '—' }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $candidate->resumes->count() ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $candidate->resumes->count() }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.candidates.show', $candidate) }}"
                                   class="inline-block px-3 py-1.5 rounded-lg bg-sky-600 text-white text-xs font-semibold hover:bg-sky-700 transition">
                                    View
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.candidates.destroy', $candidate) }}"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this candidate?')">
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
                            <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                                No candidates found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-slate-50">
            {{ $candidates->links() }}
        </div>

    </div>

</div>

@endsection
