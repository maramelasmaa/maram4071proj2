@extends('layout.admin')

@section('title', 'Category: ' . $category->name)

@section('content')
<div class="max-w-4xl mx-auto py-16 px-6">
    
    <div class="mb-10">
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-[0.2em] flex items-center">
            <i class="bi bi-arrow-left-circle mr-2"></i>
            Back to Categories
        </a>
    </div>

    <div class="bg-[#1a0b2e] border border-yellow-600/30 rounded-3xl p-10 shadow-2xl relative overflow-hidden">
        
        <div class="absolute -bottom-20 -left-20 h-64 w-64 bg-purple-600/10 blur-3xl rounded-full"></div>

        <div class="relative z-10">
            <div class="flex justify-between items-start mb-8 border-b border-yellow-600/10 pb-6">
                <div>
                    <span class="text-[10px] font-bold text-yellow-500 uppercase tracking-[0.4em]">Category</span>
                    <h2 class="text-5xl font-black text-white mt-2 luxury-text">{{ $category->name }}</h2>
                </div>
                <div class="text-right">
                    <div class="bg-yellow-500/10 border border-yellow-500/20 px-4 py-2 rounded-xl">
                        <p class="text-[10px] text-yellow-500 uppercase font-bold tracking-widest">Entry ID</p>
                        <p class="text-xl font-mono text-white">#{{ $category->id }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-10">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-purple-500 uppercase tracking-widest flex items-center">
                        <i class="bi bi-diagram-3 mr-2"></i> Classification
                    </h3>
                    <p class="text-2xl text-white font-medium">
                        {{ $category->Classcategory->name ?? 'Unassigned' }}
                    </p>
                </div>

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-purple-500 uppercase tracking-widest flex items-center">
                        <i class="bi bi-book mr-2"></i> Books
                    </h3>
                    <p class="text-2xl text-white font-medium">
                        {{-- Assuming a relationship 'books' exists --}}
                        {{ $category->books_count ?? '0' }} <span class="text-sm text-purple-400 uppercase">Books</span>
                    </p>
                </div>
            </div>

            <div class="mt-16 pt-8 border-t border-yellow-600/10 flex items-center justify-between">
                <div class="text-[10px] text-purple-500 uppercase tracking-widest italic">
                    Established: {{ $category->created_at->format('M d, Y') }}
                </div>
                
                <div class="flex gap-4">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" 
                       class="px-8 py-3 font-bold rounded-xl bg-purple-900/40 border border-purple-500/30 text-yellow-500 hover:bg-yellow-500/10 transition-all">
                       Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection