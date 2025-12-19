@extends('layout.user')

@section('title', 'Create Order')

@section('content')
<div class="max-w-xl mx-auto px-4 py-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Order Details
    </h2>

    <form action="{{ route('orders.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Phone -->
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Phone Number
            </label>
            <input type="text" name="phonenumber"
                   class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                   required>
        </div>

        <!-- Location -->
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Location
            </label>
            <input type="text" name="location"
                   class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                   required>
        </div>

        <!-- Note -->
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Note (optional)
            </label>
            <textarea name="note"
                      rows="3"
                      class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold
                       hover:bg-indigo-700 transition">
            Confirm Order
        </button>
    </form>
</div>
@endsection
