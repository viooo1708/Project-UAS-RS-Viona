<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rumah Sakit')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Pastel Pink Theme -->
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Segoe UI', sans-serif;
            color: #4a4a4a;
            padding-top: 80px;
        }

        .navbar {
            background-color: #ffe3ec;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .navbar-brand,
        .nav-link {
            color: #d63384 !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #c2255c !important;
        }

        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #d63384;
        }

        .main-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main.container {
            flex: 1;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        footer {
            background-color: #fff0f5;
            color: #6c757d;
            padding: 1rem 0;
        }

        footer a {
            color: #d63384;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: #f783ac;
            border-color: #f783ac;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #f06595;
            border-color: #f06595;
        }

        .btn-success {
            background-color: #f8d7da;
            border-color: #f8d7da;
            color: #842029;
        }

        .btn-success:hover {
            background-color: #f1b0b7;
            border-color: #f1b0b7;
        }

        .form-control:focus {
            border-color: #f783ac;
            box-shadow: 0 0 0 0.2rem rgba(247, 131, 172, 0.25);
        }

        .alert-success {
            background-color: #ffe3ec;
            border-color: #f783ac;
            color: #c2255c;
        }

        h1, h2, h3, h4, h5 {
            color: #d63384;
        }

        table th {
            background-color: #ffe3ec;
            color: #d63384;
        }
    </style>
</head>
<body>
<div class="main-wrapper">

    {{-- Navbar --}}
    @include('layouts.header')

{{-- Flash Messages - Positioned below navbar --}}
@if (session('success') || session('error'))
    <div class="position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index: 1050; width: 90%; max-width: 600px;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif
    </div>
@endif


    {{-- Main Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
