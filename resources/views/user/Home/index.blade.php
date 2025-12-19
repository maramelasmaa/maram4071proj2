@extends('layout.user')

@section('title', 'User Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    @if(session('success'))
        <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Header with search + cart -->
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Welcome to the Book Store</h2>

        <a href="{{ route('user.cart.index') }}" 
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
            🛒 My Cart
        </a>
    </div>

    <!-- Search Bar -->
    <form action="{{ route('user.books.search') }}" method="GET" class="mb-8">
        <input
            type="text"
            name="q"
            value="{{ request('q', request('title')) }}"
            placeholder="Search books by title, author, or publisher..."
            class="w-full p-3 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-300"
        >
    </form>

    <!-- Books Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($books as $book)
        <div class="bg-white p-5 rounded-xl shadow">
            <img
                src="{{ $book->picture ?: asset('images/book-placeholder.svg') }}"
                alt="{{ $book->title }} cover"
                class="w-full h-48 object-cover rounded-lg mb-3"
            >

            <h3 class="text-lg font-bold text-gray-800">{{ $book->title }}</h3>
            <p class="text-gray-600">Author: {{ $book->author }}</p>
            <p class="text-gray-900 font-semibold mt-2">Stock: {{ $book->qtyInStock }}</p>

            <form action="{{ route('cart.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button class="bg-indigo-600 text-white px-4 py-2 w-full rounded-lg hover:bg-indigo-700">
                    Add to Cart
                </button>
            </form>
        </div>
        @endforeach
    </div>

</div>
@endsection
