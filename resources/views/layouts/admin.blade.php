<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin | CareerVentory')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#10b981',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-100 antialiased">

<div x-data="{ open: false }" class="min-h-screen flex">

    <!-- Overlay -->
    <div
        x-show="open"
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-30 lg:hidden"
    ></div>

    <!-- Sidebar -->
    <aside
        :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed lg:relative z-40 w-64 bg-slate-900 text-white min-h-screen p-5 transition-transform duration-300"
    >
        <h2 class="text-2xl font-bold mb-8 text-emerald-400">
            CareerVentory
        </h2>

        <nav class="space-y-1">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800
               {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-emerald-400' : '' }}">
                Dashboard
            </a>

            <!-- Candidates -->
            <a href="{{ route('admin.candidates.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800
               {{ request()->routeIs('admin.candidates.*') ? 'bg-slate-800 text-emerald-400' : '' }}">
                Candidates
            </a>

            <!-- Jobs -->
            <a href="{{ route('admin.jobs.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800
               {{ request()->routeIs('admin.jobs.*') ? 'bg-slate-800 text-emerald-400' : '' }}">
                Jobs
            </a>

            <!-- Applications (NEW) -->
            <a href="{{ route('admin.applications.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800
               {{ request()->routeIs('admin.applications.*') ? 'bg-slate-800 text-emerald-400' : '' }}">
                Applications
            </a>

            <!-- Inquiries -->
            <a href="{{ route('admin.inquiries.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800
               {{ request()->routeIs('admin.inquiries.*') ? 'bg-slate-800 text-emerald-400' : '' }}">
                Inquiries
            </a>

        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- Topbar -->
        <header class="bg-white shadow px-4 sm:px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button
                    @click="open = !open"
                    class="lg:hidden text-slate-700 text-2xl"
                >
                    ☰
                </button>

                <h1 class="text-lg sm:text-xl font-semibold text-slate-800 truncate">
                    @yield('page-title', 'Dashboard')
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="hidden sm:block text-slate-600">
                    {{ auth()->user()->name ?? 'Admin' }}
                </span>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="text-red-600 font-semibold hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 p-4 sm:p-6 overflow-x-auto">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

    </div>
</div>

</body>
</html>
