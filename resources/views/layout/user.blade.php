<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Book Store')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/80 backdrop-blur">
        <div class="ui-container">
            <div class="flex items-center justify-between gap-4 py-3">
                <a href="{{ route('user.Home.index') }}" class="flex items-center gap-2 text-slate-900 no-underline">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-sm">
                        <i class="bi bi-journal-bookmark-fill text-base"></i>
                    </span>
                    <span class="leading-tight">
                        <span class="block text-sm font-semibold tracking-wide text-slate-500">Academic Bookstore</span>
                        <span class="block text-lg font-bold tracking-tight">MyBookStore</span>
                    </span>
                </a>

                <nav class="flex items-center gap-2">
                    <a href="{{ route('user.Home.index') }}" class="ui-btn ui-btn-ghost">
                        <i class="bi bi-house-door"></i>
                        <span class="hidden sm:inline">Home</span>
                    </a>

                    <a href="{{ route('orders.index') }}" class="ui-btn ui-btn-ghost">
                        <i class="bi bi-receipt"></i>
                        <span class="hidden sm:inline">My Orders</span>
                    </a>

                    <a href="{{ route('user.cart.index') }}" class="ui-btn ui-btn-secondary">
                        <i class="bi bi-cart3"></i>
                        <span class="hidden sm:inline">Cart</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="ui-btn ui-btn-danger">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <main class="ui-page">
        @yield('content')
    </main>

</body>
</html>
