@extends('layout.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Type Details</h1>

<div class="bg-white p-6 rounded shadow">
    <p><strong>Name:</strong> {{ $type->name }}</p>
    <p class="mt-2"><strong>Edition:</strong> {{ $type->edition }}</p>
    <p class="mt-2"><strong>Category:</strong> {{ $type->categoryType->name }}</p>
</div>

<a href="{{ route('admin.types.index') }}" 
   class="mt-4 inline-block text-indigo-600 hover:underline">
    ← Back to Types
</a>

@endsection
