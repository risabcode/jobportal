<section class="bg-slate-50 py-20">
  <div class="max-w-7xl mx-auto px-6">

    <div class="relative overflow-hidden rounded-2xl bg-brand text-white
                px-8 py-12 md:px-14 md:py-14">

      <!-- Decorative accents -->
      <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>

      <div class="relative grid gap-10 md:grid-cols-2 items-start">

        <!-- Left Content -->
        <div>

          <!-- MAIN HEADING -->
          <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-2">
            Contact Us
          </h2>

          <!-- SUB HEADING -->
          <p class="text-base md:text-lg font-semibold text-white/90 mb-4">
            Let’s Start the Conversation
          </p>

          <!-- DESCRIPTION -->
          <p class="text-sm md:text-base text-white/80 leading-relaxed mb-6 max-w-xl">
            Whether you’re an employer looking to hire, a professional exploring
            new opportunities, or someone with a general inquiry —
            our team is here to help you move forward.
          </p>

          <!-- Use Cases -->
          <ul class="space-y-3 text-sm text-white/85 mb-6">
            <li>✔ Hire talent for your organization</li>
            <li>✔ Explore job opportunities or career guidance</li>
            <li>✔ General questions or partnership discussions</li>
          </ul>

          <p class="text-xs text-white/70 max-w-md">
            For job applications and resume submissions, please visit our Careers page
            or join our Talent Community.
          </p>

        </div>

        <!-- Right Form -->
        <div class="bg-white rounded-xl p-6 md:p-8 text-slate-800">

          <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
            @csrf

            <!-- Inquiry Type -->
            <select name="type"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
              required>
              <option value="">Select Inquiry Type *</option>
              <option value="employer">Employer looking to hire</option>
              <option value="job_seeker">Job seeker</option>
              <option value="general">General inquiry</option>
            </select>

            <!-- Name -->
            <input
              type="text"
              name="name"
              placeholder="Full Name *"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
              required
            >

            <!-- Email -->
            <input
              type="email"
              name="email"
              placeholder="Email Address *"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
              required
            >

            <!-- Phone -->
            <input
              type="text"
              name="phone"
              placeholder="Phone Number (optional)"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
            >

            <!-- Subject -->
            <input
              type="text"
              name="subject"
              placeholder="Subject *"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
              required
            >

            <!-- Message -->
            <textarea
              name="message"
              rows="4"
              placeholder="How can we help? *"
              class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm
                     focus:ring-2 focus:ring-brand outline-none"
              required
            ></textarea>

            <!-- Actions -->
            <div class="flex flex-wrap gap-4 items-center pt-2">
              <button type="submit"
                class="bg-brand hover:bg-brand-dark text-white px-6 py-2.5
                       rounded-lg font-semibold transition">
                Send Message
              </button>

              <a href="{{ url('/career') }}"
                 class="text-brand font-semibold text-sm underline">
                Upload Resume
              </a>
            </div>

            <!-- Success -->
            @if(session('success'))
              <div class="mt-3 text-sm bg-brand-light text-brand p-3 rounded-lg">
                {{ session('success') }}
              </div>
            @endif

            <p class="text-xs text-slate-500 mt-3">
              Your information is kept confidential and secure.
            </p>

          </form>

        </div>

      </div>
    </div>

  </div>
</section>
