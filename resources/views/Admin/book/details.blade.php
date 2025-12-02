@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Book Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $book->id }}</p>
            <p><strong>Name:</strong> {{ $book->name }}</p>
            <p><strong>author:</strong> {{ $book->author }}</p>
            <p><strong>description:</strong> {{ $book->description }}</p>
            <p><strong>quantity:</strong> {{ $book->quantity }}</p>
            <p><strong>price:</strong> {{ $book->price }}</p>





            <a href="{{ route('category.index') }}" class="btn btn-outline-primary mt-2">
                Back
            </a>

        </div>
    </div>

</div>

@endsection
