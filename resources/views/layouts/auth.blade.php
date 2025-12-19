<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">

<div class="min-h-screen bg-gradient-to-b from-slate-50 to-white">
    <div class="ui-container py-10">
        <div class="mx-auto max-w-md">

            <div class="mb-6 text-center">
                <div class="mx-auto mb-4 inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-sm">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Academic Bookstore</div>
                <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">@yield('form-title')</h1>
                <p class="mt-2 text-sm text-slate-600">Sign in or create an account to continue.</p>
            </div>

            <div class="ui-card">
                <div class="ui-card-body">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
