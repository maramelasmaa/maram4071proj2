@extends('layout.admin')

@section('title', 'Edit Classification: ' . ($classification->name ?? ''))

@section('content')
<div class="max-w-3xl mx-auto py-20 px-6">
    
    <div class="mb-10 flex flex-col items-center text-center">
        <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-full bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
            <i class="bi bi-pencil-square"></i>
        </div>
        <h2 class="text-4xl font-extrabold text-white luxury-text uppercase tracking-tight">
            Edit Classification
        </h2>
        <p class="text-purple-400 mt-2 italic text-sm">Update classification name.</p>
    </div>

    <div class="bg-[#1a0b2e] border border-yellow-600/30 rounded-3xl p-10 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.7)] relative overflow-hidden">
        <div class="absolute -top-10 -left-10 h-32 w-32 bg-yellow-500/5 blur-3xl rounded-full"></div>

        <form action="{{ route('admin.classifications.update', $classification) }}" method="POST" class="space-y-10 relative z-10">
            @csrf 
            @method('PUT')

            <div>
                <label for="name" class="block text-xs font-bold text-yellow-500 uppercase tracking-[0.3em] mb-4">
                    Name
                </label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-purple-600 group-focus-within:text-yellow-500 transition-colors">
                        <i class="bi bi-vector-pen"></i>
                    </span>
                    <input type="text" name="name" id="name" required 
                           class="w-full bg-purple-900/10 border @error('name') border-red-500 @else border-purple-500/30 @enderror rounded-2xl pl-14 pr-6 py-5 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition-all duration-300 shadow-inner" 
                           placeholder="Enter name..." 
                           value="{{ old('name', $classification->name ?? '') }}">
                </div>
                
                @error('name')
                    <p class="mt-4 text-xs font-bold text-red-400 uppercase tracking-[0.2em] flex items-center">
                        <i class="bi bi-exclamation-triangle-fill mr-2"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-8 pt-6 border-t border-yellow-600/10">
                <a href="{{ route('admin.classifications.index') }}" 
                   class="text-xs font-bold text-purple-500 hover:text-red-400 transition-colors uppercase tracking-[0.2em] no-underline group">
                    <i class="bi bi-x-circle mr-1 group-hover:rotate-90 transition-transform inline-block"></i> 
                    Cancel
                </a>
                
                <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-gradient-to-r from-yellow-500 to-yellow-700 text-purple-950 font-black rounded-xl shadow-xl hover:shadow-yellow-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 uppercase tracking-widest text-[11px]">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <div class="mt-12 flex items-center justify-center gap-2 opacity-30">
        <i class="bi bi-shield-lock-fill text-purple-500"></i>
        <p class="text-[9px] text-purple-500 uppercase tracking-[0.3em]">Admin session active</p>
    </div>
</div>
@endsection