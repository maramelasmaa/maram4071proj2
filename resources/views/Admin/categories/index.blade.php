@extends('layout.admin')

@section('title', 'Categories')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight luxury-text">
                Categories
            </h2>
            <p class="text-purple-300 mt-2 italic">Manage categories.</p>
        </div>
        
        <a href="{{ route('admin.categories.create') }}" 
           class="group relative px-6 py-3 overflow-hidden font-bold rounded-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-lg hover:shadow-yellow-500/40 transition-all duration-300">
            <span class="relative z-10 flex items-center">
                <i class="bi bi-plus-lg mr-2"></i>
                Add Category
            </span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center bg-[#1a0b2e]/60 border border-yellow-600/20 text-white px-6 py-4 rounded-2xl backdrop-blur-md">
            <i class="bi bi-check2-circle text-xl mr-3 text-yellow-500"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-3xl overflow-hidden shadow-2xl backdrop-blur-xl">
        <table class="min-w-full">
            <thead>
                <tr class="bg-purple-900/40 border-b border-yellow-600/20">
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Index</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Category</th>
                    <th class="px-8 py-5 text-left text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Classification</th>
                    <th class="px-8 py-5 text-right text-xs font-bold text-yellow-500 uppercase tracking-[0.2em]">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-800/30">
                @forelse ($categories as $category)
                <tr class="hover:bg-yellow-500/5 transition-colors duration-200">
                    <td class="px-8 py-6 text-sm font-mono text-purple-400">
                        #{{ str_pad($category->id, 3, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-8 py-6">
                        <a href="{{ route('admin.categories.show', $category->id) }}" class="text-sm font-bold text-white hover:text-yellow-400 transition-colors">
                            {{ $category->name }}
                        </a>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 text-[10px] font-bold rounded-full border border-purple-500/50 text-purple-300 bg-purple-900/40 uppercase">
                            {{ $category->Classcategory->name ?? 'Unassigned' }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right space-x-6">
                        <a href="{{ route('admin.categories.show', $category->id) }}" 
                           class="text-xs font-bold text-purple-300 hover:text-white transition-colors uppercase tracking-widest">
                           View
                        </a>

                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                           class="text-xs font-bold text-yellow-500 hover:text-yellow-300 transition-colors uppercase tracking-widest">
                           Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this category?')" 
                                    class="text-xs font-bold bg-rose-600 text-white px-4 py-2 rounded-lg uppercase tracking-widest">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-20 text-center text-purple-500 italic uppercase tracking-widest text-xs">
                        No categories found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection