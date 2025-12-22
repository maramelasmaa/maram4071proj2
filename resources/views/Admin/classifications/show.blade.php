@extends('layout.admin')

@section('title', 'Classification: ' . $classification->name)

@section('content')
<div class="max-w-5xl mx-auto py-16 px-6">
    
    <div class="mb-10 flex justify-between items-center">
        <a href="{{ route('admin.classifications.index') }}" class="text-xs font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-[0.2em] flex items-center">
            <i class="bi bi-arrow-left-circle mr-2"></i>
            Back to Classifications
        </a>
        
        <div class="flex gap-3">
                 <a href="{{ route('admin.classifications.edit', $classification->id) }}" class="px-4 py-2 text-xs font-bold text-yellow-500 border border-yellow-500/30 rounded-lg hover:bg-yellow-500/10 transition-all uppercase tracking-widest">
                     Edit
             </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1 bg-gradient-to-b from-[#1a0b2e] to-[#150726] border border-yellow-600/30 rounded-3xl p-8 shadow-2xl">
            <div class="text-center">
                <div class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-yellow-500/10 text-yellow-500 mb-6 border border-yellow-500/20">
                    <i class="bi bi-diagram-3-fill text-4xl"></i>
                </div>
                <h3 class="text-[10px] font-bold text-yellow-500 uppercase tracking-[0.4em] mb-2">Classification</h3>
                <h2 class="text-3xl font-black text-white luxury-text">{{ $classification->name }}</h2>
            </div>

            <div class="mt-10 space-y-6">
                <div class="border-t border-yellow-600/10 pt-6 text-center">
                    <p class="text-[10px] text-purple-500 uppercase font-bold tracking-widest">ID</p>
                    <p class="text-2xl font-mono text-white mt-1">#{{ str_pad($classification->id, 3, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="border-t border-yellow-600/10 pt-6 text-center">
                    <p class="text-[10px] text-purple-500 uppercase font-bold tracking-widest">Categories</p>
                    <p class="text-2xl font-mono text-white mt-1">{{ $classification->categories_count ?? '0' }}</p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-3xl p-8 backdrop-blur-xl">
                <h3 class="text-sm font-bold text-yellow-500 uppercase tracking-[0.2em] mb-6 flex items-center">
                    <i class="bi bi-tags-fill mr-3"></i> Categories
                </h3>

                @if(isset($classification->categories) && $classification->categories->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($classification->categories as $genre)
                            <div class="p-4 rounded-2xl bg-purple-900/20 border border-purple-500/20 flex items-center justify-between">
                                <span class="text-white font-semibold">{{ $genre->name }}</span>
                                <a href="{{ route('admin.categories.show', $genre->id) }}" class="text-yellow-500 hover:text-white transition-colors">
                                    <i class="bi bi-arrow-right-short text-2xl"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-10 text-center border border-dashed border-purple-800 rounded-2xl">
                        <p class="text-purple-500 italic text-sm">No categories assigned yet.</p>
                        <a href="{{ route('admin.categories.create') }}" class="mt-4 inline-block text-xs font-bold text-yellow-500 underline underline-offset-4 tracking-widest uppercase">
                            Add Category
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection