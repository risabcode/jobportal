@extends('layouts.app')

@section('title','Jobs | CareerVentory')

@section('content')
<div class="max-w-6xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Open Jobs</h1>

    @foreach($jobs as $job)
        <div class="bg-white p-6 shadow mb-4">
            <a href="{{ route('jobs.show',$job->slug) }}" class="text-xl font-semibold">
                {{ $job->title }}
            </a>
        </div>
    @endforeach
</div>
@endsection
