@extends('layout.user')

@section('title', 'Order #' . $order->id)

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="{{ route('orders.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center mb-2">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Back to My Orders
                </a>
                <h2 class="text-3xl font-extrabold text-gray-900">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h2>
                <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
            </div>
            
            <button onclick="window.print()" class="hidden md:inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Print Invoice
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800">Order Items</h3>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        @foreach($order->Orderitem as $item)
                        <li class="p-6 flex items-center">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">{{ $item->book->title }}</h4>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }} × ${{ number_format($item->book->price, 2) }}</p>
                            </div>
                            <div class="text-right">
                                <span class="font-bold text-gray-900">${{ number_format($item->book->price * $item->quantity, 2) }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="md:col-span-1 space-y-6">
                <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Delivery Details</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex flex-col">
                            <span class="text-gray-400 text-xs uppercase font-bold tracking-wider">Phone Number</span>
                            <span class="text-gray-900 font-medium">{{ $order->phonenumber }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-gray-400 text-xs uppercase font-bold tracking-wider">Location</span>
                            <span class="text-gray-900 font-medium">{{ $order->location }}</span>
                        </div>
                        @if($order->note)
                        <div class="flex flex-col pt-2 border-t border-gray-50">
                            <span class="text-gray-400 text-xs uppercase font-bold tracking-wider">Customer Note</span>
                            <span class="text-gray-600 italic">"{{ $order->note }}"</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="bg-indigo-600 shadow-lg rounded-2xl p-6 text-white">
                    <h3 class="font-bold mb-4 opacity-80">Payment Summary</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="opacity-80">Subtotal</span>
                            <span>${{ number_format($order->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="opacity-80">Shipping</span>
                            <span class="text-green-300 font-medium">Free</span>
                        </div>
                        <div class="border-t border-indigo-400 pt-3 mt-3 flex justify-between items-baseline">
                            <span class="text-lg font-bold">Total</span>
                            <span class="text-2xl font-black">${{ number_format($order->price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection