<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
{
    return view('front.home', [
        'testimonials' => Testimonial::published()
            ->latest()
            ->take(6)
            ->get(),

        'jobs' => Job::published()
            ->orderByDesc('posted_at')
            ->take(5)
            ->get(),
    ]);
}

}
