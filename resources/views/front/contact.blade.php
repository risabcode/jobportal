@extends('layouts.app')

@section('title','Contact Us | CareerVentory')

@section('content')

<!-- PAGE INTRO -->
<section class="bg-white py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">

            <span class="inline-block mb-2 text-sm font-semibold uppercase tracking-wide text-brand">
                Contact Us
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
                Let’s Start a Conversation
            </h1>

            <p class="text-base md:text-lg text-slate-600 leading-relaxed">
                Whether you’re looking to hire, explore career opportunities,
                or simply have a question — our team is here to help.
            </p>

        </div>
    </div>
</section>

<!-- CONTACT FORM -->
<section class="bg-slate-50 py-20">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white border border-slate-200 rounded-2xl p-10 md:p-14">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-center font-medium">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <form method="POST"
                  action="{{ route('contact.submit') }}"
                  class="grid md:grid-cols-2 gap-6">
                @csrf

                <!-- Inquiry Type -->
                <div class="md:col-span-2">
                    <label class="form-label">Inquiry Type *</label>
                    <select name="type" class="form-input" required>
                        <option value="">Select Inquiry Type</option>
                        <option value="employer">I'm an employer looking to hire</option>
                        <option value="job_seeker">I'm a job seeker</option>
                        <option value="general">General inquiry</option>
                    </select>
                </div>

                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="form-label">Full Name *</label>
                    <input type="text"
                           name="name"
                           class="form-input"
                           placeholder="Your full name"
                           required>
                </div>

                <!-- Email -->
                <div>
                    <label class="form-label">Email Address *</label>
                    <input type="email"
                           name="email"
                           class="form-input"
                           placeholder="you@example.com"
                           required>
                </div>

                <!-- Phone -->
                <div>
                    <label class="form-label">Phone Number</label>
                    <input type="text"
                           name="phone"
                           class="form-input"
                           placeholder="+91 XXXXX XXXXX">
                </div>

                <!-- Subject -->
                <div class="md:col-span-2">
                    <label class="form-label">Subject *</label>
                    <input type="text"
                           name="subject"
                           class="form-input"
                           placeholder="How can we help?"
                           required>
                </div>

                <!-- Message -->
                <div class="md:col-span-2">
                    <label class="form-label">Message *</label>
                    <textarea name="message"
                              rows="4"
                              class="form-input"
                              placeholder="Write your message here..."
                              required></textarea>
                </div>

                <!-- Submit -->
                <div class="md:col-span-2 pt-4">
                    <button type="submit"
                            class="w-full bg-brand text-white py-3.5 rounded-xl
                                   font-semibold text-lg hover:bg-brand-dark transition">
                        Submit Inquiry
                    </button>
                </div>
            </form>

            <p class="text-xs text-slate-500 text-center mt-8">
                🔒 Your information is secure and will only be used to respond to your inquiry.
            </p>

        </div>

    </div>
</section>

@endsection

@push('head')
<style>
.form-label {
    display:block;
    font-size:0.875rem;
    font-weight:600;
    color:#334155;
    margin-bottom:0.4rem;
}
.form-input {
    width:100%;
    border:1px solid #cbd5e1;
    padding:0.75rem 0.9rem;
    border-radius:0.75rem;
    outline:none;
}
.form-input:focus {
    border-color:#004680;
    box-shadow:0 0 0 3px rgba(0,70,128,.15);
}
</style>
@endpush
