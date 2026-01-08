@extends('layouts.app')

@section('title','Who We Are | Job Portal')

@section('content')

<!-- PAGE INTRO -->
<section class="bg-white py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">

            <span class="inline-block mb-2 text-sm font-semibold uppercase tracking-wide text-brand">
                Who We Are
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
                People. Purpose. Progress.
            </h1>

            <p class="text-base md:text-lg text-slate-600 leading-relaxed">
                Job Portal is a people-focused recruitment and staffing firm,
                partnering with organizations and professionals to create long-term
                success through meaningful talent connections.
            </p>

        </div>
    </div>
</section>

<!-- ABOUT CONTENT -->
<section class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- LEFT: STORY -->
            <div class="lg:col-span-2">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-5">
                    Our Story
                </h2>

                <p class="text-slate-600 leading-relaxed mb-5">
                    Job Portal was founded with a clear vision — to redefine how
                    organizations hire and how individuals grow professionally.
                    We combine market expertise, strong talent networks, and a
                    people-first mindset to deliver hiring solutions that truly work.
                </p>

                <p class="text-slate-600 leading-relaxed">
                    For us, recruitment is not about filling positions quickly.
                    It’s about understanding people, aligning goals, and building
                    teams that drive culture, performance, and long-term growth.
                </p>
            </div>

            <!-- RIGHT: HIGHLIGHTS -->
            <div class="space-y-6">

                <div class="service-card bg-white border border-slate-200 rounded-xl p-6">
                    <h4 class="font-semibold text-slate-900 mb-2">
                        👥 People-First Approach
                    </h4>
                    <p class="text-sm text-slate-600">
                        We prioritize human potential, values, and long-term fit.
                    </p>
                </div>

                <div class="service-card bg-white border border-slate-200 rounded-xl p-6">
                    <h4 class="font-semibold text-slate-900 mb-2">
                        🎯 Precision Hiring
                    </h4>
                    <p class="text-sm text-slate-600">
                        Right role, right culture, and right timing — always.
                    </p>
                </div>

                <div class="service-card bg-white border border-slate-200 rounded-xl p-6">
                    <h4 class="font-semibold text-slate-900 mb-2">
                        ⚡ Speed with Quality
                    </h4>
                    <p class="text-sm text-slate-600">
                        Fast turnaround without compromising hiring standards.
                    </p>
                </div>

                <div class="service-card bg-white border border-slate-200 rounded-xl p-6">
                    <h4 class="font-semibold text-slate-900 mb-2">
                        🤝 Long-Term Partnerships
                    </h4>
                    <p class="text-sm text-slate-600">
                        Relationships built on trust, not transactions.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- MISSION & VISION -->
<section class="bg-white py-20 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-8">

            <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-8">
                <h3 class="text-xl font-extrabold text-slate-900 mb-3">
                    Our Mission
                </h3>
                <p class="text-slate-600 leading-relaxed">
                    To empower organizations with the right talent and professionals
                    with the right opportunities — enabling sustainable growth for both.
                </p>
            </div>

            <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-8">
                <h3 class="text-xl font-extrabold text-slate-900 mb-3">
                    Our Vision
                </h3>
                <p class="text-slate-600 leading-relaxed">
                    To be a trusted recruitment and HR solutions partner, recognized
                    for integrity, expertise, and measurable impact.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="bg-slate-900 py-14">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">
            Let’s Build the Future Together
        </h2>

        <p class="text-slate-300 max-w-2xl mx-auto mb-6">
            Whether you’re growing a team or planning your next career move,
            Job Portal is here to support you at every stage.
        </p>

        <a href="{{ url('/contact-us') }}"
           class="inline-flex items-center justify-center
                  bg-brand text-white px-8 py-3 rounded-lg
                  font-semibold hover:bg-brand-dark transition">
            Talk to Us
        </a>

    </div>
</section>

@endsection
