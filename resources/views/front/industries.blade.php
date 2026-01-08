@extends('layouts.app')

@section('title','Industries We Serve | CareerVentory')

@section('content')

<!-- Page Header -->
<section class="bg-white py-20 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">

            <span class="inline-block mb-3 text-sm font-semibold tracking-wide uppercase text-brand">
                Industries We Serve
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight">
                Industry Expertise That Drives Growth
            </h1>

            <p class="text-base md:text-lg text-slate-600 leading-relaxed">
                From startups to established enterprises, CareerVentory delivers
                recruitment solutions across diverse industry verticals — helping
                organizations scale with the right talent at the right time.
            </p>

        </div>
    </div>
</section>

<!-- Industries Grid -->
<section class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @php
                $industries = [
                    ['name' => 'IT & Technology', 'icon' => '💻', 'desc' => 'Software, IT services, product companies & emerging technologies'],
                    ['name' => 'Healthcare', 'icon' => '🏥', 'desc' => 'Hospitals, clinics, pharmaceuticals & healthcare services'],
                    ['name' => 'Real Estate', 'icon' => '🏢', 'desc' => 'Developers, construction firms & property management'],
                    ['name' => 'Education', 'icon' => '🎓', 'desc' => 'Schools, colleges, EdTech platforms & training institutes'],
                    ['name' => 'Retail & FMCG', 'icon' => '🛒', 'desc' => 'Retail chains, FMCG brands & distribution networks'],
                    ['name' => 'BPO & Contact Centers', 'icon' => '📞', 'desc' => 'Voice & non-voice customer support operations'],
                    ['name' => 'NBFC & Financial Services', 'icon' => '🏦', 'desc' => 'NBFCs, fintech firms, banking & finance roles'],
                    ['name' => 'Corporate Offices', 'icon' => '💼', 'desc' => 'Sales, operations, HR, admin & leadership functions'],
                ];
            @endphp

            @foreach($industries as $industry)
                <div class="service-card bg-white border border-slate-200 rounded-2xl p-7">

                    <div class="flex items-start gap-4">
                        <div class="text-3xl">{{ $industry['icon'] }}</div>

                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">
                                {{ $industry['name'] }}
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed">
                                {{ $industry['desc'] }}
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

<!-- Value Proposition -->
<section class="bg-white py-20 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-5">
            More Than Recruitment — A Strategic Hiring Partner
        </h2>

        <p class="max-w-3xl mx-auto text-base md:text-lg text-slate-600 leading-relaxed mb-10">
            With deep market insight, faster turnaround times, and a people-first
            approach, CareerVentory helps organizations build strong teams that
            improve productivity, efficiency, and long-term business performance.
        </p>

        <a href="{{ url('/contact-us') }}"
           class="inline-flex items-center justify-center
                  bg-brand text-white px-8 py-3 rounded-lg
                  font-semibold shadow hover:bg-brand-dark transition">
            Discuss Your Hiring Needs
        </a>

    </div>
</section>

@endsection
