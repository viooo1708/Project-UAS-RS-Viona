<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rumah Sakit')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Pastel Pink Theme -->
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Segoe UI', sans-serif;
            color: #4a4a4a;
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

    {{-- Konten Utama --}}
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
