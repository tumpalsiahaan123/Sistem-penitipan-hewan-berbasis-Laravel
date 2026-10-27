<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- VITE CSS (Laravel Breeze) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- BOOTSTRAP 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <title>Customer Panel</title>
</head>
<body style="background-color:#f8f9fa;">

    {{-- NAVBAR CUSTOMER --}}
    @include('components.navbar-customer')

    {{-- CONTENT SLOT --}}
    <div class="container py-4">
        {{ $header ?? '' }}
        {{ $slot }}
    </div>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
