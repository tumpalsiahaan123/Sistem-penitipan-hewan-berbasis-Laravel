<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Customer Panel')</title>

    <!-- BOOTSTRAP DULUAN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BARU VITE + TAILWIND -->
    @vite(['resources/js/app.js'])


    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- CUSTOM STYLE --}}
    @yield('styles')
</head>
<body class="bg-light">

    {{-- NAVBAR CUSTOMER --}}
    @include('components.navbar-customer')
    
    {{-- PAGE CONTENT --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
