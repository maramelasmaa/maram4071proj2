@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    <div class="mb-12">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight luxury-text uppercase">
            Dashboard
        </h2>
        <p class="text-purple-400 mt-2 italic text-sm tracking-widest">Overview of your bookstore data.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        
        <div class="relative group overflow-hidden bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-8 shadow-2xl transition-all hover:-translate-y-2">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="bi bi-book text-8xl text-yellow-500"></i>
            </div>
            <h3 class="text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.3em] mb-1">Total Books</h3>
            <p class="text-4xl font-black text-white tracking-tighter">{{ number_format($totalBooks) }}</p>
            <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full"></div>
        </div>

        <div class="relative group overflow-hidden bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-8 shadow-2xl transition-all hover:-translate-y-2">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="bi bi-tags text-8xl text-purple-200/70"></i>
            </div>
            <h3 class="text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.3em] mb-1">Total Categories</h3>
            <p class="text-4xl font-black text-white tracking-tighter">{{ $totalCategories }}</p>
            <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full"></div>
        </div>

        <div class="relative group overflow-hidden bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-8 shadow-2xl transition-all hover:-translate-y-2">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="bi bi-layers text-8xl text-yellow-500"></i>
            </div>
            <h3 class="text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.3em] mb-1">Total Types</h3>
            <p class="text-4xl font-black text-white tracking-tighter">{{ $totalTypes }}</p>
            <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full"></div>
        </div>

        <div class="relative group overflow-hidden bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-8 shadow-2xl transition-all hover:-translate-y-2">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="bi bi-diagram-3 text-8xl text-yellow-500"></i>
            </div>
            <h3 class="text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.3em] mb-1">Total Classifications</h3>
            <p class="text-4xl font-black text-white tracking-tighter">{{ $totalClassifications }}</p>
            <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full"></div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-3xl p-8 backdrop-blur-xl shadow-2xl">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-sm font-bold text-yellow-500 uppercase tracking-[0.2em] flex items-center">
                    <i class="bi bi-trophy-fill mr-3"></i> Top Stock
                </h3>
                <span class="text-[9px] text-purple-200/70 font-bold uppercase tracking-widest">By Stock Volume</span>
            </div>

            <div class="space-y-4">
                @foreach ($topBooks as $book)
                <div class="flex items-center justify-between p-4 bg-[#07010d] border border-yellow-600/20 rounded-2xl hover:bg-yellow-500/5 transition-all">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-white leading-none mb-1">{{ $book->title }}</span>
                        <span class="text-[10px] text-purple-200/70 uppercase tracking-wider">{{ $book->author }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-lg font-mono text-yellow-500">{{ $book->qtyInStock }}</span>
                        <span class="block text-[8px] text-purple-200/70 uppercase font-bold">Units</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-3xl p-8 backdrop-blur-xl shadow-2xl">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-sm font-bold text-purple-200/70 uppercase tracking-[0.2em] flex items-center">
                    <i class="bi bi-clock-history mr-3"></i> Recent Books
                </h3>
            </div>

            <div class="overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[9px] text-purple-200/70 uppercase tracking-[0.2em] border-b border-yellow-600/20">
                            <th class="pb-4">Book</th>
                            <th class="pb-4">Added On</th>
                        </tr>
                    </thead>
                    <tbody class="text-purple-200/70">
                        @foreach ($latestBooks as $book)
                        <tr class="group">
                            <td class="py-4">
                                <p class="text-sm font-bold text-white group-hover:text-yellow-400 transition-colors">{{ $book->title }}</p>
                                <p class="text-[10px] text-purple-200/70">{{ $book->author }}</p>
                            </td>
                            <td class="py-4 text-right">
                                <span class="text-xs font-mono text-purple-200/70">{{ $book->created_at->format('M d, Y') }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection