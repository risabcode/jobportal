<section class="relative min-h-screen overflow-hidden text-white">

  <!-- Inline CSS -->
  <style>
    .hero-animate {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.9s ease-out;
    }

    .hero-animate.show {
      opacity: 1;
      transform: translateY(0);
    }

    .hero-delay-1 { transition-delay: 0.15s; }
    .hero-delay-2 { transition-delay: 0.3s; }
    .hero-delay-3 { transition-delay: 0.45s; }
    .hero-delay-4 { transition-delay: 0.6s; }

    /* Moving gradient for Find Talent button */
    .btn-gradient {
      background: linear-gradient(
        270deg,
        #0070ba,
        #00a6fb,
        #0070ba
      );
      background-size: 400% 400%;
      animation: gradientMove 5s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .trust-icon {
      width: 18px;
      height: 18px;
      object-fit: contain;
    }
  </style>

  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center"
       style="
         background-image: url('{{ asset('storage/images/pp.jpeg') }}');
         background-position: center 20%;
       ">
  </div>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-gradient-to-r
              from-black/30 via-black/45 to-black/20">
  </div>

  <!-- Content -->
  <div class="relative max-w-7xl mx-auto px-6 min-h-screen flex items-center">

    <div class="max-w-3xl">

      <!-- TAGLINE -->
      <span class="inline-block mb-4 px-5 py-2 rounded-full
                   text-xs font-semibold uppercase tracking-wider
                   text-white bg-red-600 shadow-md
                   hero-animate hero-delay-1">
        Every Candidate Is a Story
      </span>

      <!-- MAIN HEADING -->
      <h1 class="text-4xl md:text-5xl
                 font-extrabold leading-tight mb-5
                 hero-animate hero-delay-2">
        Your Trusted Human
        <span class="block text-white">
          Resource Solution
        </span>
        Partner
      </h1>

      <!-- DESCRIPTION -->
      <p class="text-base sm:text-lg
                text-white/90 max-w-2xl mb-8 leading-relaxed
                hero-animate hero-delay-3">
        We connect professionals with the right organizations,
        helping careers and businesses move forward with
        confidence, clarity, and speed.
      </p>

      <!-- CTA BUTTONS -->
      <div class="flex flex-col sm:flex-row gap-4 mb-10
                  hero-animate hero-delay-4">

        <a href="{{ url('/career') }}"
           class="bg-white text-brand px-8 py-3 rounded-lg
                  text-base font-semibold shadow-md
                  hover:bg-slate-100 transition">
          Find a Job
        </a>

        <a href="{{ url('/contact-us') }}"
           class="px-8 py-3 rounded-lg
                  text-base font-semibold
                  text-white shadow-md
                  btn-gradient">
          Find Talent
        </a>

      </div>

      <!-- TRUST POINTS (GREEN ICON) -->
      <div class="flex flex-wrap gap-x-8 gap-y-3
                  text-sm sm:text-base text-white/85 font-medium
                  hero-animate hero-delay-4">

        <div class="flex items-center gap-2">
          <img src="{{ asset('storage/images/green.png') }}"
               alt="check"
               class="trust-icon">
          <span>Permanent & Contract Hiring</span>
        </div>

        <div class="flex items-center gap-2">
          <img src="{{ asset('storage/images/green.png') }}"
               alt="check"
               class="trust-icon">
          <span>RPO & Executive Search</span>
        </div>

        <div class="flex items-center gap-2">
          <img src="{{ asset('storage/images/green.png') }}"
               alt="check"
               class="trust-icon">
          <span>Career Guidance</span>
        </div>

      </div>

    </div>
  </div>

  <!-- Animation JS -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".hero-animate")
        .forEach(el => el.classList.add("show"));
    });
  </script>

</section>
