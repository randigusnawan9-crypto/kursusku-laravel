
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.navbar')

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="mt-auto border-top bg-light py-3">
        <div class="container text-center text-muted">
            <small>&copy; {{ date('Y') }} KursusKu. Semua hak dilindungi.</small>
        </div>
    </footer>

    @stack('scripts')

</body>
</html>