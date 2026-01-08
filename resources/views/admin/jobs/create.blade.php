@extends('layouts.admin')

@section('title', 'Create Job')
@section('page-title', 'Create Job')

@section('content')

<div class="max-w-3xl bg-white rounded-xl shadow p-6">

    <form method="POST" action="{{ route('admin.jobs.store') }}" class="space-y-5">
        @csrf

        <input name="title" placeholder="Job Title"
               class="w-full border p-3 rounded" required>

        <textarea name="description" rows="5"
                  class="w-full border p-3 rounded"
                  placeholder="Job Description" required></textarea>

        <div class="grid md:grid-cols-2 gap-4">
            <input name="location" placeholder="Location"
                   class="border p-3 rounded">

            <input name="employment_type" placeholder="Employment Type"
                   class="border p-3 rounded">
        </div>

        <select name="status" class="w-full border p-3 rounded" required>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            <option value="archived">Archived</option>
        </select>

        <button class="bg-emerald-600 text-white px-6 py-3 rounded font-semibold">
            Create Job
        </button>
    </form>
</div>

@endsection
