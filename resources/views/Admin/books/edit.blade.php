@extends('layout.admin')

@section('title', 'Edit Book')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <div class="mb-10 flex justify-between items-end border-b border-yellow-600/20 pb-6">
        <div>
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight">
                Edit Book
            </h2>
            <p class="text-purple-300 mt-2 italic">Update book details.</p>
        </div>
        <div class="text-right">
            <span class="text-xs font-mono text-yellow-500/60 tracking-widest uppercase">Book ID: #{{ $book->id }}</span>
        </div>
    </div>

    <form action="{{ route('admin.books.update', $book->id) }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-[#1a0b2e] border border-yellow-600/30 rounded-2xl p-8 shadow-2xl space-y-8">
        
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Book Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Author</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Price ($)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $book->price) }}"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Stock</label>
                        <input type="number" name="qtyInStock" value="{{ old('qtyInStock', $book->qtyInStock) }}"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300">
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Year</label>
                        <input type="number" name="year" value="{{ old('year', $book->year) }}"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 outline-none transition duration-300">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Type</label>
                        <select name="type_id" class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 outline-none transition duration-300">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $book->type_id == $type->id ? 'selected' : '' }} class="bg-purple-900 text-white">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                          <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Publisher</label>
                    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 outline-none transition duration-300">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Cover Image</label>
                    <div class="flex items-center space-x-6 bg-purple-900/10 p-4 rounded-xl border border-purple-500/20">
                        @if($book->picture)
                            <div class="relative group">
                                <div class="absolute -inset-1 bg-gradient-to-r from-yellow-600 to-yellow-400 rounded blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                                <img src="{{ str_starts_with($book->picture, 'http') || str_starts_with($book->picture, '/') ? $book->picture : asset('storage/'.$book->picture) }}" class="relative w-20 h-28 object-cover rounded shadow-lg border border-yellow-500/30">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="picture" 
                                   class="text-xs text-purple-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-purple-800 file:text-yellow-500 hover:file:bg-purple-700 cursor-pointer">
                            <p class="text-[10px] text-purple-400 mt-2 italic">Upload a new image (JPG/PNG)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Description</label>
            <textarea name="description" rows="4" 
                      class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="pt-8 flex justify-between items-center">
            <a href="{{ url()->previous() }}" class="text-sm font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-widest">
                &larr; Cancel
            </a>
            <button class="px-10 py-3 font-bold rounded-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-lg hover:shadow-yellow-500/20 transition-all active:scale-95">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection