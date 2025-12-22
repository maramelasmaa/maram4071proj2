@extends('layout.admin')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-6">
    <div class="bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-10 shadow-2xl">
        <h2 class="text-2xl font-black text-white mb-8 uppercase tracking-widest border-b border-yellow-600/20 pb-4">Add Type</h2>

        <form action="{{ route('admin.types.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.2em] mb-2">Name</label>
                    <input type="text" name="name" class="w-full bg-[#07010d] border border-yellow-600/20 rounded-xl px-4 py-3 text-white outline-none placeholder:text-purple-200/70 focus:border-yellow-600/20" placeholder="e.g. Hardcover" required>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.2em] mb-2">Edition</label>
                    <input type="text" name="edition" class="w-full bg-[#07010d] border border-yellow-600/20 rounded-xl px-4 py-3 text-white outline-none placeholder:text-purple-200/70 focus:border-yellow-600/20" placeholder="e.g. First Edition" required>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-purple-200/70 uppercase tracking-[0.2em] mb-2">Category</label>
                <select name="category_id" class="w-full bg-[#07010d] border border-yellow-600/20 rounded-xl px-4 py-3 text-white outline-none appearance-none" required>
                    <option value="" class="bg-[#07010d]">-- Select a Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="bg-[#07010d] text-white">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="w-full py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-black rounded-xl uppercase tracking-widest text-xs transition-transform border border-yellow-600/20">
                Create Type
            </button>
        </form>
    </div>
</div>
@endsection