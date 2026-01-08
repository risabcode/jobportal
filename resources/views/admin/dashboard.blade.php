@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="space-y-6">

    <!-- Welcome Card -->
    <div class="bg-white rounded-2xl shadow p-5 sm:p-6">
        <h2 class="text-xl font-semibold text-slate-800">
            Welcome back, {{ auth()->user()->name ?? 'Admin' }} 👋
        </h2>
        <p class="mt-2 text-slate-600 text-sm sm:text-base">
            Manage candidates, jobs, applications, and inquiries from your admin panel.
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

        <!-- Candidates -->
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Total Candidates</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">
                {{ $candidates }}
            </h3>
        </div>

        <!-- Jobs -->
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Total Jobs</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">
                {{ $jobs }}
            </h3>
        </div>

        <!-- Applications -->
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Total Applications</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">
                {{ $applications }}
            </h3>
        </div>

        <!-- New Inquiries -->
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">New Inquiries</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">
                {{ $inquiries }}
            </h3>
        </div>

        <!-- Admins -->
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Admins</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">
                {{ $admins }}
            </h3>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow p-5 sm:p-6">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">
            Quick Actions
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">

            <a href="{{ route('admin.candidates.index') }}"
               class="block text-center px-4 py-3 rounded-xl bg-sky-600 text-white font-semibold hover:bg-sky-700 transition">
                View Candidates
            </a>

            <a href="{{ route('admin.jobs.index') }}"
               class="block text-center px-4 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">
                Manage Jobs
            </a>

            <a href="{{ route('admin.applications.index') }}"
               class="block text-center px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                View Applications
            </a>

            <a href="{{ route('admin.inquiries.index') }}"
               class="block text-center px-4 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                View Inquiries
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="block text-center px-4 py-3 rounded-xl bg-slate-800 text-white font-semibold hover:bg-slate-900 transition">
                Refresh Dashboard
            </a>

        </div>
    </div>

</div>

@endsection
