@extends('layout.admin')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-6">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight">
            Edit Category
        </h2>
        <p class="text-purple-300 mt-2 italic">Update category details.</p>
    </div>

    <div class="bg-[#1a0b2e] border border-yellow-600/30 rounded-3xl p-10 shadow-2xl relative overflow-hidden">
        <div class="absolute -top-24 -right-24 h-48 w-48 bg-yellow-500/10 blur-3xl rounded-full"></div>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-8 relative z-10">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-yellow-500 uppercase tracking-[0.2em] mb-3">
                    Category Name
                </label>
                <input type="text" name="name" id="name" required
                       class="w-full bg-purple-900/20 border @error('name') border-red-500 @else border-purple-500/40 @enderror rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 outline-none transition duration-300 placeholder-purple-700"
                       value="{{ old('name', $category->name) }}">

                @error('name')
                    <p class="mt-2 text-xs font-bold text-red-400 uppercase tracking-wide">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="class_id" class="block text-sm font-semibold text-yellow-500 uppercase tracking-[0.2em] mb-3">
                    Classification
                </label>
                <div class="relative">
                    <select name="class_id" id="class_id" required
                            class="w-full bg-purple-900/20 border @error('class_id') border-red-500 @else border-purple-500/40 @enderror rounded-xl px-5 py-4 text-white focus:border-yellow-500 outline-none transition duration-300 appearance-none cursor-pointer">
                        <option value="" class="bg-purple-950 text-purple-400">-- Select a Classification --</option>
                        @foreach ($classification as $class)
                            <option value="{{ $class->id }}"
                                    class="bg-purple-950 text-white"
                                    @if (old('class_id', $category->class_id) == $class->id) selected @endif>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-yellow-500">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>

                @error('class_id')
                    <p class="mt-2 text-xs font-bold text-red-400 uppercase tracking-wide">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-end gap-6 border-t border-yellow-600/10">
                <a href="{{ route('admin.categories.index') }}"
                   class="text-xs font-bold text-purple-400 hover:text-yellow-500 transition-colors uppercase tracking-[0.2em]">
                    Cancel
                </a>

                <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 font-bold rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-purple-950 shadow-lg hover:shadow-yellow-500/20 active:scale-95 transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection