@extends('layouts.admin')

@section('title', 'Applications')
@section('page-title', 'Job Applications')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow p-5 sm:p-6">
        <h2 class="text-xl font-semibold text-slate-800">
            Applications
        </h2>
        <p class="text-sm text-slate-600 mt-1">
            Review and manage job applications submitted by candidates.
        </p>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Applications Table -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Candidate</th>
                        <th class="px-6 py-4 text-left">Job</th>
                        <th class="px-6 py-4 text-left">Applied At</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse($applications as $application)
                        <tr class="hover:bg-slate-50 transition">

                            <!-- Candidate -->
                            <td class="px-6 py-4">
                                <p class="font-medium text-slate-800">
                                    {{ $application->candidate->first_name }}
                                    {{ $application->candidate->last_name }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $application->candidate->email }}
                                </p>
                            </td>

                            <!-- Job -->
                            <td class="px-6 py-4 text-slate-700">
                                {{ $application->job->title ?? '—' }}
                            </td>

                            <!-- Date -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ $application->applied_at?->format('d M Y, h:i A') }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @class([
                                        'bg-slate-100 text-slate-600' => $application->status === 'new',
                                        'bg-sky-100 text-sky-700' => $application->status === 'reviewed',
                                        'bg-red-100 text-red-700' => $application->status === 'rejected',
                                        'bg-emerald-100 text-emerald-700' => $application->status === 'hired',
                                    ])
                                ">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.applications.show', $application) }}"
                                   class="inline-block px-3 py-1.5 rounded-lg bg-sky-600 text-white text-xs font-semibold hover:bg-sky-700 transition">
                                    View
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.applications.destroy', $application) }}"
                                      class="inline-block"
                                      onsubmit="return confirm('Delete this application?')">
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
                                No applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-slate-50">
            {{ $applications->links() }}
        </div>

    </div>

</div>

@endsection
