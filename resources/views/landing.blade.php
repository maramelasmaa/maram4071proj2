<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome | Online Bookstore</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">

<!-- Header -->
<header class="sticky top-0 z-20 border-b border-slate-200 bg-white/80 backdrop-blur">
    <div class="ui-container">
        <div class="flex items-center justify-between gap-4 py-3">
            <div class="flex items-center gap-3">
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-sm">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </span>
                <div class="leading-tight">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Academic Bookstore</div>
                    <h1 class="text-lg font-bold tracking-tight text-slate-900">MyBookStore</h1>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('user.register') }}" class="ui-btn ui-btn-secondary no-underline">
                    <i class="bi bi-person-plus"></i>
                    Register
                </a>
                <a href="{{ route('login') }}" class="ui-btn ui-btn-primary no-underline">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="bg-gradient-to-b from-slate-50 to-white">
    <div class="ui-container py-14 lg:py-20">
        <div class="grid items-center gap-10 lg:grid-cols-2">
            <div>
                <p class="ui-kicker">Bookstore • Research • Academic</p>
                <h2 class="mt-3 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    A clean, research-inspired platform for discovering books.
                </h2>
                <p class="mt-4 text-lg text-slate-600">
                    Browse titles, manage your cart, and place orders with clarity—while admins keep the catalog organized.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ route('user.register') }}" class="ui-btn ui-btn-primary no-underline">
                        <i class="bi bi-person-plus"></i>
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="ui-btn ui-btn-secondary no-underline">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                    <a href="#about" class="ui-btn ui-btn-ghost no-underline">
                        <i class="bi bi-info-circle"></i>
                        About
                    </a>
                </div>
            </div>

            <div class="ui-card overflow-hidden">
                <img
                    src="https://plus.unsplash.com/premium_photo-1677567996070-68fa4181775a?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Books"
                    class="h-80 w-full object-cover sm:h-96"
                >
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="border-t border-slate-200 bg-white">
    <div class="ui-container py-14 lg:py-20">
        <div class="text-center">
            <h3 class="text-3xl font-bold tracking-tight text-slate-900">Platform features</h3>
            <p class="mt-2 text-slate-600">Everything you need for a professional bookstore workflow.</p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="ui-card">
                <div class="ui-card-body">
                    <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-slate-900">Book catalog</h4>
                    <p class="mt-1 text-sm text-slate-600">Browse titles with categories, types, and stock visibility.</p>
                </div>
            </div>

            <div class="ui-card">
                <div class="ui-card-body">
                    <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                        <i class="bi bi-cart3"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-slate-900">Cart system</h4>
                    <p class="mt-1 text-sm text-slate-600">Add items, adjust quantities, and checkout smoothly.</p>
                </div>
            </div>

            <div class="ui-card">
                <div class="ui-card-body">
                    <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-slate-900">Order tracking</h4>
                    <p class="mt-1 text-sm text-slate-600">View order history and details with clarity.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="border-t border-slate-200 bg-slate-50">
    <div class="ui-container py-14 lg:py-20">
        <div class="text-center">
            <h3 class="text-3xl font-bold tracking-tight text-slate-900">About</h3>
            <p class="mt-2 text-slate-600">Built for readers and administrators alike.</p>
        </div>

        <div class="mt-10 grid items-center gap-10 md:grid-cols-2">
            <div class="ui-card overflow-hidden">
                <img
                    src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg"
                    alt="About us"
                    class="h-80 w-full object-cover"
                >
            </div>

            <div class="ui-card">
                <div class="ui-card-body">
                    <p class="text-lg text-slate-700">
                        MyBookStore was created with a simple mission:
                        <strong class="font-semibold text-indigo-700">make book browsing and ordering clear, fast, and enjoyable.</strong>
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        Users can explore books, manage their cart, place orders, and track history. Admins can manage categories,
                        types, and classifications with a clean dashboard experience.
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        Whether you're a reader looking for your next title or an admin managing a growing library, this platform is designed
                        for clarity and productivity.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="border-t border-slate-200 bg-white">
    <div class="ui-container py-8 text-center">
        <p class="text-sm text-slate-600">© {{ date('Y') }} MyBookStore — All Rights Reserved</p>
    </div>
</footer>

</body>
</html>
