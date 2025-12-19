@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- Total Books -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700">Total Books</h3>
            <p class="text-3xl font-bold text-indigo-600">{{ $totalBooks }}</p>
        </div>

        <!-- Categories -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700">Categories</h3>
            <p class="text-3xl font-bold text-indigo-600">{{ $totalCategories }}</p>
        </div>

        <!-- Types -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700">Types</h3>
            <p class="text-3xl font-bold text-indigo-600">{{ $totalTypes }}</p>
        </div>

        <!-- Classifications -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700">Classifications</h3>
            <p class="text-3xl font-bold text-indigo-600">{{ $totalClassifications }}</p>
        </div>

    </div>

    <!-- Top Books -->
    <div class="bg-white p-6 rounded-xl shadow mb-10">
        <h3 class="text-xl font-bold text-gray-700 mb-4">Top Books (By Stock)</h3>

        <table class="w-full text-left">
            <thead>
                <tr class="text-gray-500 text-sm uppercase">
                    <th class="py-2">Title</th>
                    <th class="py-2">Author</th>
                    <th class="py-2">Stock</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($topBooks as $book)
                <tr>
                    <td class="py-2">{{ $book->title }}</td>
                    <td class="py-2">{{ $book->author }}</td>
                    <td class="py-2">{{ $book->qtyInStock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Latest Books Added -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-bold text-gray-700 mb-4">Latest Added Books</h3>

        <table class="w-full text-left">
            <thead>
                <tr class="text-gray-500 text-sm uppercase">
                    <th class="py-2">Title</th>
                    <th class="py-2">Author</th>
                    <th class="py-2">Created At</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($latestBooks as $book)
                <tr>
                    <td class="py-2">{{ $book->title }}</td>
                    <td class="py-2">{{ $book->author }}</td>
                    <td class="py-2">{{ $book->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
