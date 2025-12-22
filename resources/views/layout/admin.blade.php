<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Dev Bookstore Admin</title>
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    
    {{-- Icons & Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#07010d] text-white antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-72 bg-[#1a0b2e] text-white flex-shrink-0 flex flex-col border-r border-yellow-600/20">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-10">
                    <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 p-2 rounded-lg">
                        <i class="fas fa-terminal text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight">Dev<span class="text-purple-200/70">Admin</span></span>
                </div>
                
                <nav class="space-y-8 sidebar-scroll overflow-y-auto max-h-[calc(100vh-250px)]">

                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard*') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-chart-pie w-5"></i>
                            <span class="font-semibold text-sm">Analytics</span>
                        </a>

                        <a href="{{ route('admin.books.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.books.index') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-book w-5"></i>
                            <span class="font-semibold text-sm">Books</span>
                        </a>

                        <a href="{{ route('admin.books.create') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.books.create') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-plus w-5"></i>
                            <span class="font-semibold text-sm">Add Book</span>
                        </a>

                        <a href="{{ route('admin.categories.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.categories*') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-tags w-5"></i>
                            <span class="font-semibold text-sm">Categories</span>
                        </a>

                        <a href="{{ route('admin.classifications.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.classifications*') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-folder-tree w-5"></i>
                            <span class="font-semibold text-sm">Classifications</span>
                        </a>

                        <a href="{{ route('admin.types.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.types*') ? 'bg-[#07010d] text-white border border-yellow-600/20' : 'text-purple-200/70 hover:bg-[#07010d]' }}">
                            <i class="fas fa-layer-group w-5"></i>
                            <span class="font-semibold text-sm">Types</span>
                        </a>
                    </div>

                </nav>
            </div>

            {{-- Logout Footer --}}
            <div class="mt-auto p-6 border-t border-yellow-600/20">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="w-full flex items-center justify-center gap-2 bg-rose-600 text-white py-3 rounded-xl transition text-sm font-bold">
                        <i class="fas fa-sign-out-alt"></i> Logout Session
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            {{-- Header --}}
            <header class="h-20 bg-[#1a0b2e] border-b border-yellow-600/20 flex items-center justify-between px-10">
                <h1 class="font-bold text-white text-lg uppercase tracking-tight">@yield('header_title')</h1>
                
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-bold text-white leading-none">Admin Portal</p>
                        <p class="text-[10px] text-purple-200/70 font-black uppercase mt-1 tracking-wider">Access Verified</p>
                    </div>
                    <div class="h-10 w-10 bg-[#07010d] border border-yellow-600/20 rounded-xl flex items-center justify-center font-bold text-white">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </header>

            {{-- Main Scrollable Content --}}
            <main class="flex-1 overflow-y-auto p-10 bg-[#07010d]">
                
                {{-- Session Feedback --}}
                @if(session('success'))
                    <div class="mb-8 p-4 bg-[#1a0b2e] border border-yellow-600/20 text-white rounded-2xl flex items-center gap-3">
                        <i class="fas fa-check-circle text-lg"></i>
                        <p class="text-sm font-bold">{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 p-4 bg-rose-600 text-white rounded-2xl flex items-center gap-3">
                        <i class="fas fa-exclamation-circle text-lg"></i>
                        <p class="text-sm font-bold">{{ session('error') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>