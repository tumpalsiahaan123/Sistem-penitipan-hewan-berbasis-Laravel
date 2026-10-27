<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di Sistem Pendataan Hewan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-6">Sistem Pendataan Hewan</h1>

        @auth
            <a href="{{ url('/dashboard') }}"
               class="bg-green-600 text-white px-4 py-2 rounded-lg">Masuk ke Dashboard</a>
        @else
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg mr-2">Login</a>

            <a href="{{ route('register') }}"
               class="bg-green-600 text-white px-4 py-2 rounded-lg">Register</a>
        @endauth
    </div>
</body>
</html>
