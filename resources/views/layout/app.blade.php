<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">

    <div class="min-h-screen lg:flex">

        <!-- Sidebar (desktop) -->
        <aside class="hidden lg:flex lg:w-72 lg:flex-col lg:border-r lg:border-slate-200 lg:bg-white">
            <div class="px-6 py-5">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-sm">
                        <i class="bi bi-speedometer2 text-base"></i>
                    </span>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Admin</div>
                        <div class="text-lg font-bold tracking-tight text-slate-900">Bookstore Console</div>
                    </div>
                </div>
            </div>

            <nav class="px-3 pb-6">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                    <i class="bi bi-grid-1x2"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.books.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                    <i class="bi bi-book"></i>
                    Books
                </a>
                <a href="{{ route('admin.categories.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                    <i class="bi bi-tags"></i>
                    Categories
                </a>
                <a href="{{ route('admin.classifications.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                    <i class="bi bi-diagram-3"></i>
                    Classifications
                </a>
                <a href="{{ route('admin.types.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                    <i class="bi bi-collection"></i>
                    Types
                </a>

                <div class="mt-6 px-4">
                    <div class="h-px bg-slate-200"></div>
                </div>

                <div class="mt-4 px-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="ui-btn ui-btn-danger w-full justify-center">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main column -->
        <div class="flex min-h-screen flex-1 flex-col">
            <!-- Top bar -->
            <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/80 backdrop-blur">
                <div class="ui-container">
                    <div class="flex items-center justify-between gap-3 py-3">
                        <div class="flex items-center gap-3">
                            <div class="lg:hidden">
                                <details class="relative">
                                    <summary class="ui-btn ui-btn-secondary list-none">
                                        <i class="bi bi-list"></i>
                                        <span class="sr-only">Open menu</span>
                                    </summary>
                                    <div class="absolute left-0 mt-2 w-72 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                                        <div class="p-2">
                                            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                                                <i class="bi bi-grid-1x2"></i>
                                                Dashboard
                                            </a>
                                            <a href="{{ route('admin.books.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                                                <i class="bi bi-book"></i>
                                                Books
                                            </a>
                                            <a href="{{ route('admin.categories.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                                                <i class="bi bi-tags"></i>
                                                Categories
                                            </a>
                                            <a href="{{ route('admin.classifications.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                                                <i class="bi bi-diagram-3"></i>
                                                Classifications
                                            </a>
                                            <a href="{{ route('admin.types.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-100 no-underline">
                                                <i class="bi bi-collection"></i>
                                                Types
                                            </a>

                                            <div class="my-2 h-px bg-slate-200"></div>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="ui-btn ui-btn-danger w-full justify-center">
                                                    <i class="bi bi-box-arrow-right"></i>
                                                    Logout
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </details>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-sm">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <div class="leading-tight">
                                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Admin Panel</div>
                                    <div class="text-base font-bold tracking-tight text-slate-900">@yield('title', 'Dashboard')</div>
                                </div>
                            </div>
                        </div>

                        <span class="hidden sm:inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600">
                            <i class="bi bi-cloud-check"></i>
                            Production-ready UI
                        </span>
                    </div>
                </div>
            </header>

            <main class="ui-page">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
