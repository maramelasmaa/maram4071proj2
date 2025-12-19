@extends('layout.app')

@section('title', $book->title)

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h2 class="text-3xl font-bold mb-4">{{ $book->title }}</h2>

    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Type:</strong> {{ $book->bookType->name ?? 'N/A' }}</p>
    <p class="mt-4"><strong>Description:</strong><br>{{ $book->description }}</p>

    @if ($book->picture)
        <img src="{{ $book->picture }}" class="mt-4 w-64 rounded shadow">
    @endif

</div>
@endsection
