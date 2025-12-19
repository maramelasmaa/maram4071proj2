@extends('layout.app')

{{-- Define the specific title for this page. We show the classification's name if available. --}}
@section('title', 'Edit Classification: ' . ($classification->name ?? ''))

{{-- Define the content block to be inserted into @yield('content') in the layout --}}
@section('content')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Display classification name dynamically -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Classification: {{ $classification->name ?? 'Classification Name' }}</h2>

        <div class="bg-white p-8 rounded-xl shadow-xl">
            <!-- Form points to the update route for the specific classification -->
            <form action="{{ route('admin.classifications.update', $classification) }}" method="POST">
                
                <!-- REQUIRED: CSRF Token and Method Spoofing for PUT (Laravel RESTful convention) -->
                @csrf 
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Classification Name</label>
                    <input type="text" name="name" id="name" required 
                           class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" 
                           placeholder="e.g., Fiction Books" 
                           value="{{ old('name', $classification->name ?? '') }}">
                    
                    <!-- Display validation error -->
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <!-- Link back to index view -->
                    <a href="{{ route('admin.classifications.index') }}" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition duration-150">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 transition duration-150">
                        Update Classification
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection