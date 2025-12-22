<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVBOOKS | @yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;700;800&family=Inter:wght@300;400;600;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #07010D; color: white; }
        .heading-font { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom Scrollbar for the Deep Background */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #07010D; }
        ::-webkit-scrollbar-thumb { background: #1A0B2E; border-radius: 10px; border: 2px solid #07010D; }
        ::-webkit-scrollbar-thumb:hover { background: #CA8A04; }

        .ui-container { max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; }
    </style>
</head>
<body class="antialiased">

    {{-- Header / Navbar --}}
    @if(!View::hasSection('hide_navbar'))
    <nav class="sticky top-0 z-50 bg-[#1a0b2e]/80 backdrop-blur-xl border-b border-yellow-600/10">
        <div class="ui-container h-20 flex items-center justify-between">
            <a href="{{ route('user.Home.index') }}" class="heading-font text-2xl font-black tracking-tighter text-white uppercase">
                DEV<span class="text-yellow-500">BOOKS</span>
            </a>
            
            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('user.Home.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-purple-200/70 hover:text-yellow-500 transition-colors">Catalog</a>
                <a href="{{ route('orders.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-purple-200/70 hover:text-yellow-500 transition-colors">My Orders</a>
                
                <div class="h-4 w-[1px] bg-yellow-600/20"></div>

                <a href="{{ route('user.cart.index') }}" class="relative group flex items-center gap-3">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white group-hover:text-yellow-500 transition-colors">Bag</span>
                    <div class="relative">
                        <i class="bi bi-bag text-xl text-white group-hover:text-yellow-500 transition-colors"></i>
                        <span class="absolute -top-2 -right-2 bg-yellow-500 text-[#07010d] text-[9px] font-black w-4 h-4 flex items-center justify-center rounded-full ring-4 ring-[#1a0b2e]">
                            {{-- Add your dynamic cart count here --}}
                            0
                        </span>
                    </div>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="bg-rose-600 px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-rose-700 hover:shadow-[0_0_20px_rgba(225,29,72,0.3)] transition-all">
                        Logout
                    </button>
                </form>
            </div>

            <div class="md:hidden">
                <i class="bi bi-list text-3xl text-yellow-500"></i>
            </div>
        </div>
    </nav>
    @endif

    {{-- Main Content Area --}}
    <main class="relative">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#07010d] border-t border-yellow-600/10 py-12">
        <div class="ui-container flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-purple-200/30">
                &copy; {{ date('Y') }} DEVBOOKS COLLECTIVE. ALL RIGHTS RESERVED.
            </p>
            <div class="flex gap-8">
                <a href="#" class="text-[10px] font-black uppercase tracking-widest text-purple-200/30 hover:text-yellow-500">Privacy</a>
                <a href="#" class="text-[10px] font-black uppercase tracking-widest text-purple-200/30 hover:text-yellow-500">Terms</a>
            </div>
        </div>
    </footer>

</body>
</html>