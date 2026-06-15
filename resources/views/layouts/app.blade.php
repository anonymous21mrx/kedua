<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agun Ritel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section { background: #e30613; color: white; padding: 60px 0; } /* Warna khas Alfamart */
        .navbar { background-color: #ffffff !important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
       <a class="navbar-brand fw-bold" href="#">
    <!-- Gunakan helper asset() untuk memanggil logo dari folder public/img -->
    <img src="{{ asset('img/logo.png') }}" alt="Logo Alfamart" height="40">
</a>
    </div>


    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Profile (Home)</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/projects') }}">Project</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>

    <a class="nav-link fw-bold text-danger" href="{{ route('login') }}">Admin</a>
</ul>
</div>
</nav>

    @yield('content')

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2026 Agun Saiful Fajar - NIM 241011750027</p>
    </footer>
</body>
</html>