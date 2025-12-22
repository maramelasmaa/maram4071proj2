@extends('layout.user')
@section('title', 'Dev Bookstore | The Academic Standard')
@section('hide_navbar', '1')

@section('content')
<div class="min-h-screen">
    {{-- Custom Landing Nav --}}
    <nav class="sticky top-0 z-50 bg-[#07010D]/95 backdrop-blur-xl border-b border-yellow-600/10">
        <div class="h-24 flex items-center justify-between ui-container">
            <a href="{{ route('user.Home.index') }}" class="heading-font text-2xl font-black tracking-tighter text-white uppercase">
                DEV<span class="text-yellow-500">BOOKS</span>
            </a>
            <div class="flex gap-8 items-center">
                <a href="{{ route('user.login') }}" class="text-xs font-bold uppercase tracking-widest text-purple-200/70 hover:text-white transition-colors">Login</a>
                <a href="{{ route('user.register') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-8 py-3 rounded-full text-xs font-bold uppercase tracking-widest">Join The Library</a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative h-[90vh] flex items-center">
        <div class="ui-container grid lg:grid-cols-2 gap-12 relative z-10">
            <div class="max-w-xl">
                <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-purple-200/70 block mb-6">Your Campus Bookstore, Online</span>
                <h1 class="serif text-7xl lg:text-9xl leading-[0.85] mb-8">Books <br>for <br><span class="italic text-purple-200/70">Every Term.</span></h1>
                <p class="text-lg text-purple-200/70 leading-relaxed mb-12 max-w-sm">Shop textbooks, programming guides, and essential reads with real-time stock and a checkout built for student life.</p>
            </div>
            <div class="hidden lg:block relative">
                <div class="absolute inset-0 bg-[#1a0b2e] rounded-[4rem] rotate-3 -z-10 translate-y-8 border border-yellow-600/20"></div>
                <div class="max-w-lg xl:max-w-xl mx-auto">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800" alt="Bookshelf" class="w-full h-auto max-h-[40rem] object-cover rounded-[4rem] shadow-2xl grayscale brightness-110">
                </div>
            </div>
        </div>
    </section>

    {{-- Footer/CTA --}}
    <footer class="py-24 bg-[#1a0b2e] border-t border-yellow-600/20 text-center">
        <div class="ui-container">
            <h2 class="serif text-5xl mb-10">Find your next book today.</h2>
            <a href="{{ route('user.register') }}" class="btn-luxury mx-auto">Create Your Account</a>
            <p class="mt-8 text-[10px] font-bold text-purple-200/70 uppercase tracking-widest">&copy; {{ date('Y') }} DEVBOOKS</p>
        </div>
    </footer>
</div>
@endsection