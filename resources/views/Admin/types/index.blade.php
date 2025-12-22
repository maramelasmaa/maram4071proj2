@extends('layout.admin')

@section('title', 'Types')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600 tracking-tight luxury-text uppercase">
                Types
            </h2>
            <p class="text-purple-300 mt-2 italic text-sm tracking-widest">Manage types.</p>
        </div>
        
        <a href="{{ route('admin.types.create') }}" 
           class="px-8 py-3 font-black rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-white border border-yellow-600/20 transition-all duration-300 uppercase tracking-widest text-xs">
            <i class="bi bi-layers-half mr-2"></i> Add Type
        </a>
    </div>

    <div class="bg-[#1a0b2e]/60 border border-yellow-600/20 rounded-[2rem] overflow-hidden shadow-2xl backdrop-blur-xl">
        <table class="min-w-full">
            <thead>
                <tr class="bg-[#07010d] border-b border-yellow-600/20">
                    <th class="px-8 py-6 text-left text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em]">Name</th>
                    <th class="px-8 py-6 text-left text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em]">Edition</th>
                    <th class="px-8 py-6 text-left text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em]">Category</th>
                    <th class="px-8 py-6 text-right text-[10px] font-black text-purple-200/70 uppercase tracking-[0.3em]">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-yellow-600/20">
                @foreach ($types as $type)
                <tr class="group hover:bg-[#07010d] transition-colors">
                    <td class="px-8 py-6 text-sm font-bold text-white uppercase tracking-wider">{{ $type->name }}</td>
                    <td class="px-8 py-6 text-xs text-purple-200/70 font-mono">{{ $type->edition }}</td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 rounded-lg bg-[#07010d] border border-yellow-600/20 text-[10px] font-bold text-white uppercase">
                            {{ $type->categoryType->name }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right space-x-3">
                        <a href="{{ route('admin.types.show', $type) }}" class="text-purple-200/70 hover:text-white transition-colors"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('admin.types.edit', $type) }}" class="text-purple-200/70 hover:text-white transition-colors"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="bg-rose-600 text-white px-2 py-1 rounded-lg"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection