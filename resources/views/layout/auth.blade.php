<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Dev Bookstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
        /* Tailwind CDN does not process @apply, so these are written as plain CSS */
        .ui-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid rgba(202, 138, 4, 0.2); /* yellow-600/20 */
            background: #1a0b2e;
            color: #ffffff;
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        .ui-input::placeholder {
            color: rgba(233, 213, 255, 0.7); /* purple-200/70 */
        }

        .ui-input:focus {
            border-color: rgba(250, 204, 21, 0.6); /* yellow-400 */
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.18);
        }

        .ui-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 10px;
            font-weight: 700;
            color: rgba(233, 213, 255, 0.7); /* purple-200/70 */
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        .btn-black {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 1.5rem;
            border-radius: 0.5rem;
            background-image: linear-gradient(to right, #facc15, #ca8a04);
            color: #ffffff;
            font-weight: 700;
            transition: filter 150ms ease, transform 100ms ease, box-shadow 150ms ease;
        }

        .btn-black:hover {
            filter: brightness(1.05);
        }

        .btn-black:active {
            transform: translateY(1px);
        }

        .btn-black:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.22);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6 antialiased bg-[#07010d] text-white">
    
    <div class="mb-10 text-center">
        <a href="/" class="serif text-3xl font-bold tracking-tight text-white flex items-center gap-2">
            <i class="bi bi-book-half"></i> DEV BOOKSTORE
        </a>
    </div>

    <div class="w-full max-w-[420px] bg-[#1a0b2e] border border-yellow-600/20 rounded-2xl p-8 md:p-10">
        <div class="mb-8">
            <h2 class="serif text-2xl text-white">@yield('form-title')</h2>
            <p class="text-purple-200/70 text-sm mt-1">Please enter your account details.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-600 text-white rounded-2xl">
                <ul class="text-sm font-bold list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 p-4 bg-[#07010d] border border-yellow-600/20 text-white rounded-2xl flex items-center gap-3">
                <i class="bi bi-check-circle text-lg"></i>
                <p class="text-sm font-bold">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-600 text-white rounded-2xl flex items-center gap-3">
                <i class="bi bi-exclamation-circle text-lg"></i>
                <p class="text-sm font-bold">{{ session('error') }}</p>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="mt-12 text-purple-200/70 text-[10px] uppercase tracking-widest">
        &copy; {{ date('Y') }} Dev Bookstore
    </footer>

</body>
</html>