@extends('layout.user')

@section('title', 'Browse Books')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="border-b border-yellow-600/20 pb-8 mb-8">
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Book Collection</h1>
        <p class="mt-2 text-lg text-purple-200/70">Browse and search our complete library of titles.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="md:col-span-2">
            <form action="{{ route('books.index') }}" method="GET" class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-purple-200/70">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="block w-full pl-10 pr-3 py-3 border border-yellow-600/20 rounded-lg bg-[#07010d] text-white placeholder:text-purple-200/70 focus:outline-none focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-600/20 transition duration-150" 
                       placeholder="Search by title, author, or ISBN...">
            </form>
        </div>
        
        <select class="block w-full py-3 pl-3 pr-10 border border-yellow-600/20 bg-[#07010d] rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500/20">
            <option>All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <select class="block w-full py-3 pl-3 pr-10 border border-yellow-600/20 bg-[#07010d] rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500/20">
            <option>Sort by: Newest</option>
            <option>Title (A-Z)</option>
            <option>Stock Level</option>
        </select>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse ($books as $book)
        <div class="flex flex-col bg-[#1a0b2e] border border-yellow-600/20 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="aspect-[3/4] bg-[#07010d] flex items-center justify-center border-b border-yellow-600/20">
                <i class="bi bi-book text-purple-200/70 text-6xl"></i>
            </div>

            <div class="p-5 flex flex-col flex-grow">
                <div class="mb-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#07010d] border border-yellow-600/20 text-white">
                        {{ $book->category->name }}
                    </span>
                </div>
                <h3 class="text-lg font-bold text-white line-clamp-2 mb-1">
                    {{ $book->title }}
                </h3>
                <p class="text-sm text-purple-200/70 mb-4 italic">by {{ $book->author }}</p>
                
                <div class="mt-auto pt-4 border-t border-yellow-600/20 flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-xs text-purple-200/70 uppercase font-bold tracking-wider">Availability</span>
                        <span class="text-sm font-semibold {{ $book->qtyInStock > 0 ? 'text-white' : 'text-purple-200/70' }}">
                            {{ $book->qtyInStock > 0 ? $book->qtyInStock . ' in stock' : 'Out of stock' }}
                        </span>
                    </div>
                    <a href="{{ route('books.show', $book->id) }}" 
                       class="inline-flex items-center px-4 py-2 border border-yellow-600/20 text-sm font-medium rounded-md text-white bg-gradient-to-r from-yellow-400 to-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500/20 transition-colors">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center border border-dashed border-yellow-600/20 rounded-2xl">
            <i class="bi bi-journal-x text-5xl text-purple-200/70"></i>
            <p class="mt-4 text-purple-200/70 font-medium">No books match your current search criteria.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $books->links() }}
    </div>
</div>
@endsection