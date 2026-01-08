<header class="sticky top-0 z-50 bg-white border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex justify-between items-center h-16">

      <!-- LOGO -->
      <a href="/" class="flex items-center gap-3 group">
        <img
          src="{{ asset('storage/images/career.png') }}"
          alt="Career Ventory"
          class="h-9 md:h-10 w-auto transition-transform duration-200 group-hover:scale-105"
        />
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-10 text-sm font-semibold text-slate-700">

        <a href="/" class="nav-link-premium">Home</a>
        <a href="/services" class="nav-link-premium">Services</a>
       <!-- <a href="/industries-we-serve" class="nav-link-premium">Blogs</a> -->
        <a href="/who-we-are" class="nav-link-premium">About Us</a>
        <a href="/career" class="nav-link-premium">Careers</a>

        <!-- CTA -->
        <a href="/contact-us"
           class="ml-4 inline-flex items-center justify-center
                  bg-brand text-white px-6 py-2.5 rounded-full
                  text-sm font-semibold
                  hover:bg-brand-dark
                  transition-all duration-200
                  shadow-md hover:shadow-lg">
          Contact Us
        </a>
      </nav>

      <!-- Mobile Menu Button -->
      <button
        aria-label="Open menu"
        class="md:hidden text-slate-700 text-2xl focus:outline-none"
        onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
        ☰
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200">
    <nav class="flex flex-col px-6 py-6 gap-5 text-slate-700 font-semibold">

      <a href="/" class="mobile-link-premium">Home</a>
      <a href="/services" class="mobile-link-premium">Services</a>
      <a href="/industries-we-serve" class="mobile-link-premium">Blogs</a>
      <a href="/who-we-are" class="mobile-link-premium">About Us</a>
      <a href="/career" class="mobile-link-premium">Careers</a>

      <a href="/contact-us"
         class="mt-4 bg-brand text-white px-5 py-3 rounded-xl text-center
                hover:bg-brand-dark transition shadow-md">
        Contact Us
      </a>
    </nav>
  </div>
</header>
