@extends('layouts.admin')

@section('title', 'Inquiries')
@section('page-title', 'Inquiries')

@section('content')

<div class="bg-white rounded-2xl shadow p-5">

    <h2 class="text-xl font-semibold text-slate-800 mb-4">
        All Inquiries
    </h2>

    @if($inquiries->count())
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Type</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($inquiries as $inquiry)
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                {{ $inquiry->name }}
                            </td>

                            <td class="px-4 py-3 capitalize">
                                {{ str_replace('_',' ', $inquiry->type) }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $inquiry->email }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $inquiry->phone ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $inquiry->status === 'new' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-slate-500">
                                {{ $inquiry->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>

    @else
        <p class="text-slate-600">
            No inquiries found.
        </p>
    @endif

</div>

@endsection
