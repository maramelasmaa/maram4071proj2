@extends('layout.admin')

@section('title', 'Edit Type: ' . $type->name)

@section('content')
<div class="max-w-4xl mx-auto py-20 px-6">
    
    <div class="mb-12 text-center">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-white border border-yellow-600/20 mb-4">
            <i class="bi bi-pencil-square text-2xl"></i>
        </div>
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600 tracking-tight luxury-text uppercase">
            Edit Type
        </h2>
        <p class="text-purple-200/70 mt-2 italic text-sm tracking-widest">
            Updating: <span class="text-white font-bold">{{ $type->name }}</span>
        </p>
    </div>

    <div class="bg-[#1a0b2e] border border-yellow-600/20 rounded-[2.5rem] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] relative overflow-hidden">
        <div class="absolute -top-24 -right-24 h-64 w-64 bg-yellow-500/10 blur-[100px] rounded-full"></div>

        <form action="{{ route('admin.types.update', $type) }}" method="POST" class="space-y-8 relative z-10">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="name" class="block text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em] mb-3 ml-1">
                        Name
                    </label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name', $type->name) }}"
                           class="w-full bg-[#07010d] border @error('name') border-rose-600 @else border-yellow-600/20 @enderror rounded-2xl px-6 py-4 text-white focus:border-yellow-600/20 outline-none transition-all placeholder:text-purple-200/70" 
                           required>
                    @error('name')
                        <p class="mt-3 bg-rose-600 text-white rounded-lg px-3 py-2 text-[10px] font-bold uppercase tracking-widest">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edition" class="block text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em] mb-3 ml-1">
                        Edition
                    </label>
                    <input type="text" name="edition" id="edition"
                           value="{{ old('edition', $type->edition) }}"
                           class="w-full bg-[#07010d] border @error('edition') border-rose-600 @else border-yellow-600/20 @enderror rounded-2xl px-6 py-4 text-white focus:border-yellow-600/20 outline-none transition-all placeholder:text-purple-200/70" 
                           required>
                    @error('edition')
                        <p class="mt-3 bg-rose-600 text-white rounded-lg px-3 py-2 text-[10px] font-bold uppercase tracking-widest">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="category_id" class="block text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em] mb-3 ml-1">
                    Category
                </label>
                <div class="relative">
                    <select name="category_id" id="category_id" 
                            class="w-full bg-[#07010d] border @error('category_id') border-rose-600 @else border-yellow-600/20 @enderror rounded-2xl px-6 py-4 text-white focus:border-yellow-600/20 outline-none appearance-none cursor-pointer transition-all" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $type->category_id == $category->id ? 'selected' : '' }} class="bg-[#07010d] text-white">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-6 text-purple-200/70">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
                @error('category_id')
                    <p class="mt-3 bg-rose-600 text-white rounded-lg px-3 py-2 text-[10px] font-bold uppercase tracking-widest">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-6 border-t border-yellow-600/20">
                <a href="{{ route('admin.types.index') }}" 
                   class="text-[10px] font-black text-purple-200/70 hover:text-white transition-colors uppercase tracking-[0.3em]">
                    Cancel
                </a>
                
                <button type="submit" class="w-full sm:w-auto px-12 py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-black rounded-xl border border-yellow-600/20 shadow-lg hover:-translate-y-1 active:scale-95 transition-all uppercase tracking-widest text-[11px]">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection