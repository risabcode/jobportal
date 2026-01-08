<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | CareerVentory</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-6">
        Admin Login
    </h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
        @csrf

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-emerald-400"
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-emerald-400"
        >

        <button
            class="w-full bg-emerald-600 text-white py-2 rounded-lg font-semibold hover:bg-emerald-700 transition">
            Login
        </button>
    </form>
</div>

</body>
</html>
