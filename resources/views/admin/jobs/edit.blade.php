@extends('layouts.admin')

@section('title', 'Edit Job')
@section('page-title', 'Edit Job')

@section('content')

<div class="max-w-3xl bg-white rounded-xl shadow p-6">

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.jobs.update', $job) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Job Title -->
        <input name="title"
               value="{{ old('title', $job->title) }}"
               class="w-full border p-3 rounded"
               required>

        <!-- Description -->
        <textarea name="description"
                  rows="5"
                  class="w-full border p-3 rounded"
                  required>{{ old('description', $job->description) }}</textarea>

        <!-- Location & Employment Type -->
        <div class="grid md:grid-cols-2 gap-4">
            <input name="location"
                   value="{{ old('location', $job->location) }}"
                   class="border p-3 rounded"
                   placeholder="Location">

            <input name="employment_type"
                   value="{{ old('employment_type', $job->employment_type) }}"
                   class="border p-3 rounded"
                   placeholder="Employment Type">
        </div>

        <!-- Status -->
        <select name="status" class="w-full border p-3 rounded" required>
            @foreach(['draft', 'published', 'archived'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $job->status) === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>

        <!-- Submit -->
        <button class="bg-emerald-600 text-white px-6 py-3 rounded font-semibold">
            Update Job
        </button>
    </form>

</div>

@endsection
