@extends('layout.app')

{{-- Define the specific title for this page --}}
@section('title', 'Create New Category')

{{-- Define the content block to be inserted into @yield('content') in the layout --}}
@section('content')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Create New Category</h2>

        <div class="bg-white p-8 rounded-xl shadow-xl">
            <!-- Form points to the store route for creating a new category -->
            <form action="{{ route('admin.categories.store') }}" method="POST">
                
                <!-- REQUIRED: CSRF Token -->
                @csrf

                <!-- Category Name Field -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" id="name" required 
                           class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" 
                           placeholder="e.g., Science Fiction" 
                           value="{{ old('name') }}">
                    
                    <!-- Display validation error -->
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Classification Assignment Field -->
                <div class="mb-6">
                <label for="class_id" class="block text-sm font-medium text-gray-700 mb-2">Assign Classification</label>
                <select name="class_id" id="class_id" required 
                        class="w-full px-4 py-2 border @error('class_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
                    
                    <option value="">-- Select a Classification --</option>

                    @foreach ($classification as $class)
                    <option value="{{ $class->id }}" 
                            @if (old('class_id') == $class->id) selected @endif>
                        {{ $class->name }}
                    </option>
                    @endforeach

                </select>

                @error('class_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

                    <!-- Display validation error -->
                    @error('class_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <!-- Link back to index view -->
                    <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition duration-150">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 transition duration-150">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection