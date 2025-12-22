@extends('layout.admin')

@section('title', 'Add Classification')

@section('content')
<div class="max-w-3xl mx-auto py-20 px-6">
    
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight luxury-text uppercase">
            Add Classification
        </h2>
        <p class="text-purple-300 mt-3 italic text-sm">Create a new classification.</p>
    </div>

    <div class="bg-[#1a0b2e] border border-yellow-600/30 rounded-3xl p-10 shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 p-4 opacity-10">
            <i class="bi bi-diagram-3-fill text-9xl text-yellow-500"></i>
        </div>

        <form action="{{ route('admin.classifications.store') }}" method="POST" class="space-y-8 relative z-10">
            @csrf 

            <div>
                <label for="name" class="block text-xs font-bold text-yellow-500 uppercase tracking-[0.3em] mb-4">
                    Classification Nomenclature
                </label>
                <input type="text" name="name" id="name" required 
                       class="w-full bg-purple-900/10 border @error('name') border-red-500 @else border-purple-500/30 @enderror rounded-2xl px-6 py-4 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition-all duration-300 placeholder-purple-800" 
                       placeholder="e.g., Digital Manuscripts" 
                       value="{{ old('name') }}">
                
                @error('name')
                    <p class="mt-3 text-xs font-bold text-red-400 uppercase tracking-widest">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-end gap-6 pt-4">
                <a href="{{ route('admin.classifications.index') }}" 
                   class="text-xs font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-[0.2em] no-underline">
                    Cancel
                </a>
                
                <button type="submit" class="w-full sm:w-auto px-12 py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 font-black rounded-xl shadow-lg hover:shadow-yellow-500/20 active:scale-95 transition-all uppercase tracking-widest text-xs">
                    Create Classification
                </button>
            </div>
        </form>
    </div>
</div>
@endsection