@extends('layout.app')

@section('title', 'Edit Book')

@section('content')
<div class="max-w-3xl mx-auto py-10 bg-white p-8 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Book</h2>

    <form action="{{ route('admin.books.update', $book->id) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title"
                   value="{{ old('title', $book->title) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Author -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Author</label>
            <input type="text" name="author"
                   value="{{ old('author', $book->author) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description"
                      class="w-full p-2 border rounded"
                      rows="4">{{ old('description', $book->description) }}</textarea>
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Price</label>
            <input type="number" step="0.01" name="price"
                   value="{{ old('price', $book->price) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Quantity In Stock</label>
            <input type="number" name="qtyInStock"
                   value="{{ old('qtyInStock', $book->qtyInStock) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Year -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Year</label>
            <input type="number" name="year"
                   value="{{ old('year', $book->year) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Publisher -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Publisher</label>
            <input type="text" name="publisher"
                   value="{{ old('publisher', $book->publisher) }}"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Type -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Type</label>
            <select name="type_id" class="w-full p-2 border rounded">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $book->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Picture -->
        <div class="mb-6">
            <label class="block font-semibold mb-1">Book Picture</label>

            @if($book->picture)
                <img src="{{ $book->picture }}"
                     class="w-32 h-40 object-cover mb-3 rounded">
            @endif

            <input type="file" name="picture"
                   class="w-full p-2 border rounded">
        </div>

        <!-- Submit -->
        <button class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Update Book
        </button>

    </form>
</div>
@endsection
