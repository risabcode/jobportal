<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Job;           // ✅ USE Job
use App\Models\Application;
use App\Models\Inquiry;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'candidates'   => Candidate::count(),
            'jobs'         => Job::count(),           // ✅ FIXED
            'applications' => Application::count(),
            'inquiries'    => Inquiry::where('status', 'new')->count(),
            'admins'       => User::where('role', 'admin')->count(),
        ]);
    }
}
