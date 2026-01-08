@extends('layouts.app')

@section('title', 'Our Services | CareerVentory')

@section('content')

<!-- SERVICES -->
<section class="bg-white py-20">

  <!-- Section Header -->
  <div class="max-w-7xl mx-auto px-6 mb-14">
    <div class="max-w-3xl">
      <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
        Our Services
      </h2>
      <p class="text-base md:text-lg text-slate-600">
        Smart hiring solutions designed to support organizations at every
        stage of growth — from early hiring to leadership build-outs.
      </p>
    </div>
  </div>

  <!-- Services Grid -->
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

      <!-- Staffing Solutions -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">👥</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Staffing Solutions
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Permanent and contractual staffing solutions with precise
              placements delivered at the right time for the right roles.
            </p>
          </div>
        </div>
      </div>

      <!-- RPO -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🔄</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Recruitment Process Outsourcing (RPO)
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              End-to-end recruitment ownership that integrates seamlessly
              with your internal HR and TA teams.
            </p>
          </div>
        </div>
      </div>

      <!-- Campus Recruitment -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🎓</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Campus Recruitment
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Structured campus hiring programs connecting fresh
              graduates with fast-growing organizations.
            </p>
          </div>
        </div>
      </div>

      <!-- Head Hunting -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🎯</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Executive Search & Head Hunting
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Strategic and discreet search for senior leadership
              and critical niche roles.
            </p>
          </div>
        </div>
      </div>

      <!-- Career Counselling -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🧭</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Career Counselling
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Personalized guidance for freshers and professionals,
              including resumes, interviews, and career planning.
            </p>
          </div>
        </div>
      </div>

      <!-- Talent Management -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🚀</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Talent Management
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Workforce optimization, leadership development,
              and retention strategies for long-term success.
            </p>
          </div>
        </div>
      </div>

      <!-- HR Consulting -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">📊</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              HR Consulting
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Advisory support for HR policies, organization structure,
              hiring strategy, and workforce planning.
            </p>
          </div>
        </div>
      </div>

      <!-- Bulk Hiring -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">⚡</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Bulk & Volume Hiring
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Fast, scalable hiring solutions for BPOs, retail,
              sales teams, and project-based requirements.
            </p>
          </div>
        </div>
      </div>

      <!-- Background Verification -->
      <div class="service-card bg-slate-50 border border-slate-200 rounded-2xl p-7">
        <div class="flex items-start gap-4">
          <div class="text-brand text-3xl">🔍</div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">
              Candidate Screening & Verification
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Resume screening, interview coordination, and
              background verification support.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>

</section>

<!-- WHY CHOOSE US -->
<section class="bg-slate-50 py-16 border-t border-slate-100">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-8 text-center">

      <div>
        <h4 class="text-xl font-semibold text-slate-900 mb-2">
          Industry Expertise
        </h4>
        <p class="text-sm text-slate-600">
          Deep understanding across IT, BFSI, Healthcare, Retail,
          Real Estate, and Corporate sectors.
        </p>
      </div>

      <div>
        <h4 class="text-xl font-semibold text-slate-900 mb-2">
          Faster Turnaround
        </h4>
        <p class="text-sm text-slate-600">
          Proven hiring processes that reduce time-to-hire
          without compromising on quality.
        </p>
      </div>

      <div>
        <h4 class="text-xl font-semibold text-slate-900 mb-2">
          People-First Approach
        </h4>
        <p class="text-sm text-slate-600">
          We focus on long-term fit, not just short-term placements.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-slate-900 py-14">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">
      Ready to Strengthen Your Workforce?
    </h3>
    <p class="text-slate-300 mb-6 max-w-2xl mx-auto">
      Partner with CareerVentory for reliable, scalable,
      and future-ready hiring solutions.
    </p>
    <a href="{{ url('/contact-us') }}"
       class="inline-block bg-brand text-white px-8 py-3 rounded-lg
              font-semibold hover:bg-brand-dark transition">
      Talk to Our Team
    </a>
  </div>
</section>

@endsection
