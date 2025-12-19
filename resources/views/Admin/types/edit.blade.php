@extends('layout.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Type</h1>

<form action="{{ route('admin.types.update', $type) }}" method="POST" 
      class="bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name"
               value="{{ $type->name }}"
               class="w-full border rounded px-3 py-2 mt-1" required>
        @error('name')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Edition</label>
        <input type="text" name="edition"
               value="{{ $type->edition }}"
               class="w-full border rounded px-3 py-2 mt-1" required>
        @error('edition')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Category</label>
        <select name="category_id" 
                class="w-full border rounded px-3 py-2 mt-1" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $type->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Update
    </button>
</form>

@endsection
