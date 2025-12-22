@extends('layout.user')
@section('title', 'Dev Bookstore | The Academic Standard')
@section('hide_navbar', '1')

@section('content')
<div class="min-h-screen">
    {{-- Custom Landing Nav --}}
    <nav class="sticky top-0 z-50 bg-[#07010D]/70 backdrop-blur-xl">
        <div class="h-24 flex items-center justify-between ui-container">
            <span class="serif text-2xl font-bold text-white tracking-tighter uppercase">Dev<span class="text-purple-200/70">.</span>B</span>
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
                <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-purple-200/70 block mb-6">Curated Academic Inventory</span>
                <h1 class="serif text-7xl lg:text-9xl leading-[0.85] mb-8">The <br>Modern <br><span class="italic text-purple-200/70">Scholar.</span></h1>
                <p class="text-lg text-purple-200/70 leading-relaxed mb-12 max-w-sm">A meticulously curated collection of technical titles and academic essentials, delivered to your campus door.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('user.Home.index') }}" class="btn-luxury px-10 py-5">Enter Collection</a>
                    <a href="#about" class="btn-outline px-10 py-5">Our Philosophy</a>
                </div>
            </div>
            <div class="hidden lg:block relative">
                <div class="absolute inset-0 bg-[#1a0b2e] rounded-[4rem] rotate-3 -z-10 translate-y-8 border border-yellow-600/20"></div>
                <div class="max-w-md xl:max-w-lg mx-auto">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800" alt="Bookshelf" class="w-full h-auto max-h-[32rem] object-cover rounded-[4rem] shadow-2xl grayscale brightness-110">
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="about" class="py-32">
        <div class="ui-container">
            <div class="grid md:grid-cols-3 gap-20">
                <div class="space-y-4">
                    <span class="serif text-4xl italic text-purple-200/70 block">01</span>
                    <h3 class="serif text-2xl">Vetted Catalog</h3>
                    <p class="text-purple-200/70 text-sm leading-relaxed">We don't stock everything. We stock the right things. Every title is approved for current academic standards.</p>
                </div>
                <div class="space-y-4">
                    <span class="serif text-4xl italic text-purple-200/70 block">02</span>
                    <h3 class="serif text-2xl">Campus Ready</h3>
                    <p class="text-purple-200/70 text-sm leading-relaxed">Direct delivery to university buildings and dorms. We understand student life because we are part of it.</p>
                </div>
                <div class="space-y-4">
                    <span class="serif text-4xl italic text-purple-200/70 block">03</span>
                    <h3 class="serif text-2xl">Simple Logistics</h3>
                    <p class="text-purple-200/70 text-sm leading-relaxed">Real-time inventory tracking and a seamless checkout process. No more waiting for standard shipping.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer/CTA --}}
    <footer class="py-24 bg-[#1a0b2e] border-t border-yellow-600/20 text-center">
        <div class="ui-container">
            <h2 class="serif text-5xl mb-10">Start your semester right.</h2>
            <a href="{{ route('user.register') }}" class="btn-luxury mx-auto">Create Your Account</a>
            <p class="mt-8 text-[10px] font-bold text-purple-200/70 uppercase tracking-widest">&copy; {{ date('Y') }} Dev Bookstore Professional Editions</p>
        </div>
    </footer>
</div>
@endsection