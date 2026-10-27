<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f5f6fa }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            position: fixed;
            left: 0; top: 0;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin-bottom: 8px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4 class="mb-4">Admin Panel</h4>

    <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
    <a href="{{ route('admin.hewan.index') }}">🐾 Data Hewan</a>

    <hr style="border-color: rgba(255,255,255,0.2)">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100 mt-3">Logout</button>
    </form>
</div>

<div class="content">
    <h3>@yield('title')</h3>
    <hr>
    @yield('content')
</div>

</body>
</html>
