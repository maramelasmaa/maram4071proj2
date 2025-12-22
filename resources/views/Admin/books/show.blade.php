@extends('layout.admin')

@section('title', $book->title)

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6">
    
    <div class="mb-8">
        <a href="{{ route('admin.books.index') }}" class="text-xs font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-[0.2em] flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Books
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-12 items-start">
        
        <div class="w-full lg:w-2/5 sticky top-10">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-tr from-yellow-600 to-purple-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-1000"></div>
                
                <div class="relative bg-[#1a0b2e] rounded-2xl overflow-hidden border border-yellow-600/30 shadow-2xl">
                    @if ($book->picture)
                        <img src="{{ str_starts_with($book->picture, 'http') || str_starts_with($book->picture, '/') ? $book->picture : asset('storage/'.$book->picture) }}" alt="{{ $book->title }}" class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                    @else
                        <div class="aspect-[3/4] flex items-center justify-center bg-purple-900/20 italic text-purple-400">
                            No image
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="w-full lg:w-3/5 space-y-8">
            <div>
                <span class="px-4 py-1 text-[10px] font-bold rounded-full border border-yellow-500/50 text-yellow-500 bg-yellow-500/10 uppercase tracking-widest">
                    {{ $book->bookType->name ?? 'Standard Edition' }}
                </span>
                <h2 class="text-5xl font-black text-white mt-4 leading-tight">
                    {{ $book->title }}
                </h2>
                <p class="text-2xl text-purple-300 font-light mt-2 italic">by {{ $book->author }}</p>
            </div>

            <div class="grid grid-cols-3 gap-6 py-8 border-y border-yellow-600/10">
                <div>
                    <p class="text-[10px] text-yellow-500 uppercase tracking-tighter font-bold">Price</p>
                    <p class="text-2xl font-mono text-white mt-1">${{ number_format($book->price, 2) }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-yellow-500 uppercase tracking-tighter font-bold">Year</p>
                    <p class="text-2xl font-mono text-white mt-1">{{ $book->year }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-yellow-500 uppercase tracking-tighter font-bold">Availability</p>
                    <p class="text-2xl font-mono text-white mt-1">{{ $book->qtyInStock }} <span class="text-xs text-purple-400">Units</span></p>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-sm font-bold text-yellow-500 uppercase tracking-[0.2em]">Description</h3>
                <div class="prose prose-invert max-w-none">
                    <p class="text-purple-100 leading-relaxed text-lg italic font-light">
                        {{ $book->description ?: 'No description.' }}
                    </p>
                </div>
            </div>

            <div class="pt-10 flex items-center gap-4">
                <a href="{{ route('admin.books.edit', $book->id) }}" 
                   class="flex-1 text-center py-4 font-bold rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 hover:shadow-[0_0_20px_rgba(234,179,8,0.4)] transition-all">
                         Edit Book
                </a>
                <button class="px-6 py-4 rounded-xl border border-purple-500/40 text-purple-300 hover:bg-purple-900/40 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection