@extends('layout.app')

@section('title', 'Books')

@section('content')
<div class="max-w-7xl mx-auto py-10">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Books List</h2>
        <a href="{{ route('admin.books.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">New Book</a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Author</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($books as $book)
                <tr>
                    <td class="px-4 py-3">{{ $book->title }}</td>
                    <td class="px-4 py-3">{{ $book->author }}</td>
                    <td class="px-4 py-3">{{ $book->bookType->name ?? 'N/A' }}</td>
                    <td class="px-4 py-3">${{ $book->price }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-indigo-600">Edit</a>

                        <form action="{{ route('admin.books.destroy', $book->id) }}"
                              method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete book?')" class="text-red-600 ml-3">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
