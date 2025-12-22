@extends('layout.admin')

@section('title', 'Books')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight">
                Books
            </h2>
            <p class="text-purple-300 mt-2 italic">Manage books in the catalog.</p>
        </div>

        <form action="{{ route('admin.books.index') }}" method="GET" class="w-full md:w-[28rem] relative">
            <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-purple-200/70"></i>
            <input type="text" name="q" value="{{ $term ?? request('q') }}" placeholder="Search title, author, type, category..."
                   class="w-full pl-12 pr-4 py-3 bg-[#07010d] border border-yellow-600/20 rounded-xl text-sm outline-none text-white placeholder:text-purple-200/70 focus:border-yellow-600/20 transition-all">
        </form>
        
        <a href="{{ route('admin.books.create') }}" 
           class="group relative px-6 py-3 overflow-hidden font-bold rounded-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-lg hover:shadow-yellow-500/40 transition-all duration-300">
            <span class="relative z-10 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Book
            </span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center bg-[#1a0b2e]/60 border border-yellow-600/20 text-white px-6 py-4 rounded-2xl backdrop-blur-md">
            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-3xl overflow-hidden shadow-2xl backdrop-blur-xl">
        <table class="min-w-full">
            <thead>
                <tr class="bg-purple-900/40 border-b border-yellow-600/20">
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Cover</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Title</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Author</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Type</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Price</th>
                    <th class="px-8 py-5 text-right text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-800/30">
                @foreach ($books as $book)
                <tr class="hover:bg-yellow-500/5 transition-colors duration-200">
                    <td class="px-8 py-6">
                        @if($book->picture)
                            <img
                                src="{{ str_starts_with($book->picture, 'http') || str_starts_with($book->picture, '/') ? $book->picture : asset('storage/'.$book->picture) }}"
                                alt="{{ $book->title }}"
                                class="w-10 h-14 object-cover rounded border border-yellow-600/20 bg-[#07010d]"
                            />
                        @else
                            <div class="w-10 h-14 rounded border border-yellow-600/20 bg-[#07010d] flex items-center justify-center">
                                <i class="bi bi-book text-purple-200/70"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-8 py-6">
                        <div class="text-sm font-bold text-white group-hover:text-yellow-400">{{ $book->title }}</div>
                        <div class="text-[10px] text-purple-400 uppercase mt-1">ID: #{{ str_pad($book->id, 4, '0', STR_PAD_LEFT) }}</div>
                    </td>
                    <td class="px-8 py-6 text-sm text-purple-200">{{ $book->author }}</td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 text-[10px] font-bold rounded-full border border-purple-500/50 text-purple-300 bg-purple-900/40 uppercase">
                            {{ $book->bookType->name ?? 'Unassigned' }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-sm font-mono text-yellow-500 font-bold">
                        ${{ number_format($book->price, 2) }}
                    </td>
                    <td class="px-8 py-6 text-right space-x-4">
                        <a href="{{ route('admin.books.show', $book->id) }}" 
                           class="text-xs font-bold text-purple-300 hover:text-white transition-colors uppercase tracking-widest">
                           View
                        </a>

                        <a href="{{ route('admin.books.edit', $book->id) }}" 
                           class="text-xs font-bold text-yellow-500 hover:text-yellow-300 transition-colors uppercase tracking-widest">
                           Edit
                        </a>

                        <form action="{{ route('admin.books.destroy', $book->id) }}"
                              method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this book?')" 
                                    class="text-xs font-bold bg-rose-600 text-white px-4 py-2 rounded-lg uppercase tracking-widest">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($books->isEmpty())
    <div class="text-center py-20 bg-[#1a0b2e]/40 rounded-3xl mt-6 border border-dashed border-purple-700">
        <p class="text-purple-400 italic">No books found.</p>
    </div>
    @endif

</div>
@endsection