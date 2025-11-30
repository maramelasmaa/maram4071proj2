@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Book Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $book->id }}</p>
            <p><strong>Title:</strong> {{ $book->titel }}</p>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
            <p><strong>Type:</strong> {{ $book->type?->name ?? 'No Type' }}</p>
            <p><strong>Price:</strong> {{ $book->price }}</p>
            <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
            <p><strong>Description:</strong> {{ $book->description }}</p>

            @if($book->Picture)
                <p><strong>Picture:</strong></p>
                <img src="{{ $book->Picture }}" alt="Book Image" class="img-fluid rounded" style="max-height: 200px;">
            @endif

            <a href="{{ route('book.index') }}" class="btn btn-secondary mt-3">Back</a>

        </div>
    </div>

</div>

@endsection
