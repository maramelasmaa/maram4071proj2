@extends('layout.app')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Types</h1>

    <a href="{{ route('admin.types.create') }}" 
       class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        + Add Type
    </a>
</div>

<table class="table-auto w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Edition</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($types as $type)
            <tr class="border">
                <td class="px-4 py-2">{{ $type->name }}</td>
                <td class="px-4 py-2">{{ $type->edition }}</td>
                <td class="px-4 py-2">{{ $type->categoryType->name }}</td>

                <td class="px-4 py-2">
                    <a href="{{ route('admin.types.edit', $type) }}" 
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('admin.types.destroy', $type) }}"
                          method="POST" class="inline ml-2">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
