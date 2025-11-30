@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Category Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $category->id }}</p>
            <p><strong>Name:</strong> {{ $category->name }}</p>
            <p><strong>Classification:</strong> {{ $category->classification->name }}</p>

            <a href="{{ route('category.index') }}" class="btn btn-secondary mt-2">
                Back
            </a>

        </div>
    </div>

</div>

@endsection
