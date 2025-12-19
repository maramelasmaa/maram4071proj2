@extends('layout.user')

@section('title', 'My Cart')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">My Cart</h2>

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

    @if($cart->count() == 0)
        <p class="text-gray-600 text-lg">Your cart is empty.</p>
    @else
    @php
        $totalCost = $cart->sum(function ($item) {
            $unitPrice = (int) (optional($item->book)->price ?? 0);
            $quantity = (int) ($item->quantity ?? 0);
            return $unitPrice * $quantity;
        });
    @endphp
    <table class="w-full text-left bg-white rounded-xl shadow-lg">
        <thead>
            <tr class="text-gray-500 text-xs font-semibold uppercase tracking-wider border-b">
                <th class="py-3 px-4">Book</th>
                <th class="py-3 px-4 w-16 text-center">Qty</th>
                <th class="py-3 px-4 w-40">Actions</th>
            </tr>
        </thead>

        <tbody class="text-gray-700 divide-y divide-gray-100">
            @foreach ($cart as $item)
            <tr>
                <td class="py-4 px-4">
                    <strong class="text-base text-gray-800">{{ $item->book->title }}</strong><br>
                    <span class="text-gray-500 text-sm italic">{{ $item->book->author }}</span>
                </td>

                <td class="py-4 px-4 text-center text-lg font-medium">{{ $item->quantity }}</td>

                <td class="py-4 px-4">
                    <div class="flex items-center space-x-2">

                        <form action="{{ route('cart.update', $item->book_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button
                                type="submit"
                                title="Increase Quantity"
                                class="w-8 h-8 flex items-center justify-center bg-green-500 text-white rounded-full transition duration-150 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </button>
                        </form>

                        @if ($item->quantity > 1)
                        <form action="{{ route('cart.remove', $item->book_id) }}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                title="Decrease Quantity"
                                class="w-8 h-8 flex items-center justify-center bg-yellow-500 text-white rounded-full transition duration-150 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"></path></svg>
                            </button>
                        </form>
                        @endif

                        <form action="{{ route('cart.destroy', $item->book_id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                title="Remove All of This Book"
                                class="flex items-center justify-center px-3 py-2 text-sm bg-red-600 text-white font-medium rounded-lg transition duration-150 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
                            >
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Remove
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 bg-white rounded-xl shadow-lg border border-gray-100">
        <div class="px-4 py-4 flex items-center justify-between">
            <div>
                <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">Total cost</div>
                <div class="text-sm text-gray-600">Sum of all items in your cart</div>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($totalCost) }}</div>
        </div>
    </div>

    {{-- ORDER BUTTON --}}
<div class="mt-6 flex justify-end">
    <a href="{{ route('orders.checkout') }}"
   class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold shadow-md
          hover:bg-indigo-700 transition duration-150">
    🛒 Order Now
</a>

</div>
    @endif

</div>
@endsection