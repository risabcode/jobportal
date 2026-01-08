<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','CareerVentory')</title>
    <meta name="description" content="@yield('meta_description','Recruitment & Staffing Solutions')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#004680',
                            dark: '#00365f',
                            light: '#e6f0f6',
                        }
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    @stack('head')
</head>

<body class="bg-white text-slate-700 antialiased font-poppins">

<header class="bg-brand text-white">
    @include('components.navbar')
</header>

<main>
    @yield('content')
</main>

<footer class="bg-brand-dark text-slate-200">
    @include('components.footer')
</footer>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- HOME PAGE SWIPER INIT -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    const swiperEl = document.querySelector('.servicesSwiper');
    if (!swiperEl) return;

    const swiper = new Swiper(swiperEl, {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 24,
        speed: 6000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        freeMode: {
            enabled: true,
            momentum: false,
        },
        grabCursor: true,
        breakpoints: {
            0: { slidesPerView: 1.1 },
            640: { slidesPerView: 2.1 },
            1024: { slidesPerView: 3.2 },
            1280: { slidesPerView: 4.2 },
        },
    });

    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mouseenter', () => swiper.autoplay.stop());
        card.addEventListener('mouseleave', () => swiper.autoplay.start());
    });

});
</script>

@stack('scripts')
</body>
</html>
