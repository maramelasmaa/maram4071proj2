@extends('layout.admin')

@section('title', 'Classifications')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight luxury-text uppercase">
                Classifications
            </h2>
            <p class="text-purple-300 mt-2 italic text-sm tracking-widest">Manage classifications.</p>
        </div>
        
        <a href="{{ route('admin.classifications.create') }}" 
           class="group relative px-8 py-3 overflow-hidden font-black rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-[0_10px_20px_rgba(234,179,8,0.3)] hover:shadow-yellow-500/50 transition-all duration-300 uppercase tracking-widest text-xs">
            <span class="relative z-10 flex items-center">
                <i class="bi bi-shield-plus mr-2 text-lg"></i>
                Add Classification
            </span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 flex items-center bg-[#1a0b2e]/60 border border-yellow-600/20 text-white px-6 py-4 rounded-2xl backdrop-blur-md">
            <div class="h-8 w-8 rounded-full bg-yellow-500/10 border border-yellow-600/20 flex items-center justify-center mr-4 text-yellow-500">
                <i class="bi bi-check-lg"></i>
            </div>
            <p class="text-xs font-bold uppercase tracking-widest">Update Verified: {{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-[#1a0b2e]/40 border border-yellow-600/20 rounded-[2rem] overflow-hidden shadow-2xl backdrop-blur-xl">
        <table class="min-w-full">
            <thead>
                <tr class="bg-purple-900/30 border-b border-yellow-600/20">
                    <th class="px-8 py-6 text-left text-[10px] font-black text-yellow-500 uppercase tracking-[0.3em]">ID</th>
                    <th class="px-8 py-6 text-left text-[10px] font-black text-yellow-500 uppercase tracking-[0.3em]">Name</th>
                    <th class="px-8 py-6 text-center text-[10px] font-black text-yellow-500 uppercase tracking-[0.3em]">Categories</th>
                    <th class="px-8 py-6 text-right text-[10px] font-black text-yellow-500 uppercase tracking-[0.3em]">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-yellow-600/10">
                @forelse ($classifications as $classification)
                <tr class="group hover:bg-yellow-500/[0.03] transition-colors duration-300">
                    <td class="px-8 py-6 whitespace-nowrap">
                        <span class="font-mono text-xs text-purple-500">#{{ str_pad($classification->id, 3, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap">
                        <div class="text-sm font-bold text-white group-hover:text-yellow-400 transition-colors">
                            {{ $classification->name }}
                        </div>
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-900/40 border border-purple-500/30 text-[10px] font-bold text-purple-300">
                            <i class="bi bi-link-45deg mr-1"></i>
                            {{ $classification->categories_count ?? '0' }} Categories
                        </span>
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap text-right space-x-4">
                        <a href="{{ route('admin.classifications.show', $classification->id) }}" 
                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-purple-900/30 text-purple-400 hover:text-white transition-all border border-transparent hover:border-purple-500/30">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('admin.classifications.edit', $classification->id) }}" 
                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-purple-950 transition-all border border-yellow-500/20">
                            <i class="bi bi-pencil"></i>
                        </a>
                        
                        <form action="{{ route('admin.classifications.destroy', $classification->id) }}" method="POST" class="inline-block">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-rose-600 text-white transition-all border border-yellow-600/20"
                                    onclick="return confirm('Delete this classification?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-24 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-layers text-5xl text-purple-200/70 mb-4"></i>
                            <p class="text-purple-500 text-xs font-bold uppercase tracking-widest italic">No classifications found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 flex justify-center">
        <div class="px-4 py-2 rounded-full border border-yellow-600/10 bg-yellow-500/[0.02] text-[9px] font-bold text-purple-600 uppercase tracking-[0.3em]">
            Total: {{ $classifications->count() }} classifications
        </div>
    </div>
</div>
@endsection