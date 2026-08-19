<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MDMarkt')</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">

        <a class="navbar-brand fw-bold"
           href="{{ route('products.index') }}">
            MDMarkt
        </a>

        <div class="navbar-nav ms-auto align-items-center">

            <a class="nav-link"
               href="{{ route('products.index') }}">
                Produkte
            </a>

            <a class="btn btn-outline-dark ms-3"
               href="{{ route('products.create') }}">
                Produkt verkaufen
            </a>

        </div>

    </div>
</nav>

<!-- Seiteninhalt -->
<main class="flex-grow-1">
    @yield('content')
</main>

<!-- Footer -->
<footer class="py-5 bg-dark mt-auto">
    <div class="container">

        <p class="m-0 text-center text-white">
            Copyright &copy; MDMarkt 2026
        </p>

    </div>
</footer>

</body>
</html>