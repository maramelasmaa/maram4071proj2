@extends('layout.admin')

@section('content')
<div class="max-w-2xl mx-auto py-20 px-6">
    <div class="bg-[#1a0b2e] border border-yellow-600/20 rounded-[2.5rem] p-12 text-center relative overflow-hidden shadow-2xl">
        <div class="absolute top-0 right-0 p-10 opacity-5">
            <i class="bi bi-layers text-[12rem] text-white"></i>
        </div>

        <span class="inline-block px-4 py-1 rounded-full bg-[#07010d] border border-yellow-600/20 text-white text-[10px] font-black uppercase tracking-[0.3em] mb-6">Type Details</span>
        
        <h1 class="text-5xl font-black text-white luxury-text mb-2">{{ $type->name }}</h1>
        <p class="text-purple-200/70 font-mono text-sm tracking-widest uppercase mb-12">{{ $type->edition }}</p>

        <div class="grid grid-cols-1 gap-4 text-left">
            <div class="bg-[#07010d] border border-yellow-600/20 p-6 rounded-2xl">
                <h4 class="text-[9px] font-bold text-purple-200/70 uppercase tracking-widest mb-1">Category</h4>
                <p class="text-white text-lg font-bold">{{ $type->categoryType->name }}</p>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-yellow-600/20 flex justify-between items-center">
            <a href="{{ route('admin.types.index') }}" class="text-[10px] font-black text-purple-200/70 uppercase tracking-widest hover:text-white transition-colors">
                ← Back to Types
            </a>
            <a href="{{ route('admin.types.edit', $type) }}" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white rounded-lg font-bold text-[10px] uppercase tracking-widest border border-yellow-600/20">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection