@extends('layout.user')
@section('title', 'Browse Collection')

@section('content')
{{-- Minimal Header --}}
<header class="bg-[#1a0b2e] border-b border-yellow-600/20">
    <div class="ui-container py-12 flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="text-center md:text-left">
            <h1 class="serif text-5xl tracking-tight">The Library</h1>
            <p class="text-purple-200/70 text-sm italic mt-1 font-medium">Displaying all available academic titles.</p>
        </div>
        
        <div class="w-full md:w-96">
            <form action="{{ route('user.books.search') }}" method="GET" class="relative group">
                <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-purple-200/70"></i>
                <input type="text" name="q" placeholder="Search by title, author, or ISBN..." 
                       class="w-full pl-12 pr-4 py-4 bg-[#07010d] border border-yellow-600/20 rounded-xl text-sm outline-none text-white placeholder:text-purple-200/70 focus:border-yellow-600/20 transition-all">
            </form>
        </div>
    </div>
</header>

<div class="ui-container py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-10 gap-y-16">
        @forelse ($books ?? [] as $book)
            <div class="group">
                {{-- Book Cover --}}
                <div class="aspect-[3/4.5] bg-[#1a0b2e] rounded-sm overflow-hidden mb-6 relative group-hover:shadow-2xl transition-all duration-700 border border-yellow-600/20">
                    @if($book->picture)
                        <img src="{{ str_starts_with($book->picture, 'http') || str_starts_with($book->picture, '/') ? $book->picture : asset('storage/'.$book->picture) }}" 
                             class="w-full h-full object-cover grayscale-[0.5] group-hover:grayscale-0 transition-all duration-700 scale-[1.01] group-hover:scale-105">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-[#07010d]">
                            <i class="bi bi-book text-purple-200/70 text-6xl"></i>
                        </div>
                    @endif
                    
                    @if($book->qtyInStock <= 0)
                        <div class="absolute inset-0 bg-[#07010d]/80 backdrop-blur-sm flex items-center justify-center p-6 text-center">
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] border-b border-yellow-600/20 pb-1">Out of Stock</span>
                        </div>
                    @else
                        <div class="absolute inset-0 bg-[#07010d]/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center p-6">
                             <form action="{{ route('user.cart.store') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-white py-4 text-[10px] font-black uppercase tracking-widest shadow-2xl translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    Add to Collection
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                {{-- Book Info --}}
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-purple-200/70">{{ $book->bookType?->categoryType?->name ?? 'Volume' }}</p>
                        <p class="text-[10px] font-bold text-white border border-yellow-600/20 bg-[#1a0b2e] px-2 py-0.5 rounded">Qty: {{ $book->qtyInStock }}</p>
                    </div>
                    <h3 class="serif text-xl group-hover:text-purple-200/70 transition-colors">{{ $book->title }}</h3>
                    <p class="text-sm text-purple-200/70 italic font-medium">By {{ $book->author }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-40 text-center border border-dashed border-yellow-600/20 rounded-3xl">
                <i class="bi bi-archive text-4xl text-purple-200/70 block mb-4"></i>
                <p class="serif text-2xl text-purple-200/70 italic">No matches found in our current archives.</p>
                <a href="{{ route('user.Home.index') }}" class="text-xs font-bold uppercase tracking-widest mt-4 inline-block hover:underline">Reset Filters</a>
            </div>
        @endforelse
    </div>
</div>
@endsection