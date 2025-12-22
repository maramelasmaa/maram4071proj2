@extends('layout.admin')

@section('title', 'Add Book')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight">
            Add Book
        </h2>
        <p class="text-purple-300 mt-2 italic">Create a new book in the catalog.</p>
    </div>

    <form action="{{ route('admin.books.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-[#1a0b2e] border border-yellow-600/30 rounded-2xl p-8 shadow-2xl space-y-8">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Book Title</label>
                    <input type="text" name="title" placeholder="e.g. The Clean Code Alchemist"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Author Name</label>
                    <input type="text" name="author" placeholder="Enter author name"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Price ($)</label>
                        <input type="number" name="price" step="0.01"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Stock</label>
                        <input type="number" name="qtyInStock"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Year</label>
                        <input type="number" name="year"
                               class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Edition Type</label>
                        <select name="type_id" class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 outline-none transition duration-300" required>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" class="bg-purple-900 text-white">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                          <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Publisher</label>
                    <input type="text" name="publisher"
                           class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Book Cover Image</label>
                    <div class="relative group">
                        <input type="file" name="picture" accept="image/png, image/jpg"
                               class="w-full bg-purple-900/10 border-2 border-dashed border-purple-500/40 rounded-xl px-4 py-3 text-purple-300 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-purple-900 hover:file:bg-yellow-400 cursor-pointer">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-yellow-500 uppercase tracking-wider mb-2">Description</label>
            <textarea name="description" rows="4" placeholder="Optional description..."
                      class="w-full bg-purple-900/20 border border-purple-500/40 rounded-xl px-4 py-3 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300"></textarea>
        </div>

        <div class="pt-6 border-t border-yellow-600/20 flex justify-end">
            <button class="group relative px-8 py-3 overflow-hidden font-bold rounded-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-[0_0_20px_rgba(234,179,8,0.3)] hover:shadow-[0_0_30px_rgba(234,179,8,0.5)] transition-all duration-300">
                <span class="relative z-10">Create Book</span>
            </button>
        </div>
    </form>
</div>
@endsection