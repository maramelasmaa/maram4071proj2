@extends('layout.app')

@section('title', 'Create Book')

@section('content')
<div class="max-w-3xl mx-auto py-10">

    <h2 class="text-2xl font-bold mb-6">Create Book</h2>

    <form action="{{ route('admin.books.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf

        <!-- Title -->
        <div>
            <label class="block font-medium mb-1">Title</label>
            <input type="text" 
                   name="title" 
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Author -->
        <div>
            <label class="block font-medium mb-1">Author</label>
            <input type="text" 
                   name="author" 
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Description -->
        <div>
            <label class="block font-medium mb-1">Description</label>
            <textarea name="description" 
                      rows="4" 
                      class="w-full border-gray-300 rounded-lg"></textarea>
        </div>

        <!-- Price -->
        <div>
            <label class="block font-medium mb-1">Price ($)</label>
            <input type="number" 
                   name="price" 
                   step="0.01"
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Quantity -->
        <div>
            <label class="block font-medium mb-1">Quantity in Stock</label>
            <input type="number" 
                   name="qtyInStock" 
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Year -->
        <div>
            <label class="block font-medium mb-1">Year</label>
            <input type="number" 
                   name="year" 
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Publisher -->
        <div>
            <label class="block font-medium mb-1">Publisher</label>
            <input type="text" 
                   name="publisher" 
                   class="w-full border-gray-300 rounded-lg" 
                   required>
        </div>

        <!-- Type -->
        <div>
            <label class="block font-medium mb-1">Book Type</label>
            <select name="type_id" class="w-full border-gray-300 rounded-lg" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Picture -->
        <div>
            <label class="block font-medium mb-1">Book Cover (jpg or png)</label>
            <input type="file" 
                   name="picture" 
                   class="w-full border-gray-300 rounded-lg"
                   accept="image/png, image/jpg">
        </div>

        <!-- Submit -->
        <button class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Save Book
        </button>
    </form>

</div>
@endsection
