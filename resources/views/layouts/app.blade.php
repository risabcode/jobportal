<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','CareerVentory')</title>
    <meta name="description" content="@yield('meta_description','Recruitment & Staffing Solutions')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#004680',
                            dark: '#00365f',
                            light: '#e6f0f6',
                        },
                        accent: '#0ea5e9',
                    }
                }
            }
        }
    </script>

    <!-- CountUp.js (safe global utility) -->
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.8.0/dist/countUp.umd.js"></script>

    <!-- Global Styles -->
    <style>
        /* Navbar link underline */
        .nav-link-premium {
            position: relative;
            padding-bottom: 4px;
        }
        .nav-link-premium::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #004680;
            transition: width 0.25s ease;
        }
        .nav-link-premium:hover::after {
            width: 100%;
        }

        /* Shared card hover (used across pages) */
        .service-card {
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            border-color: #004680;
        }
    </style>

    @stack('head')
</head>

<body class="bg-white text-slate-700 antialiased">

    <!-- Navbar -->
    <header class="bg-brand text-white">
        @include('components.navbar')
    </header>

    <!-- Page Content -->
    <main class="min-h-screen bg-slate-50">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-dark text-slate-200">
        @include('components.footer')
    </footer>

    <!-- Global Utilities ONLY -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* CountUp (safe global usage) */
            document.querySelectorAll('[data-count]').forEach(el => {
                const counter = new countUp.CountUp(el, el.dataset.count, {
                    duration: 2,
                    separator: '',
                });
                if (!counter.error) counter.start();
            });

        });
    </script>

    @stack('scripts')
</body>
</html>
