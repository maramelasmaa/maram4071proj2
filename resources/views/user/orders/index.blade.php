@extends('layout.user')

@section('title', 'My Orders')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Order History</h2>
                <p class="mt-1 text-sm text-gray-500">Check the status of recent orders and manage returns.</p>
            </div>
            <a href="{{ route('user.Home.index') }}" class="text-indigo-600 hover:text-indigo-500 font-medium text-sm">
                Continue Shopping &rarr;
            </a>
        </div>

        @if($orders->isEmpty())
            <div class="text-center bg-white rounded-2xl shadow-sm border border-gray-100 py-16">
                <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">No orders yet</h3>
                <p class="text-gray-500">When you buy books, they will appear here.</p>
            </div>
        @else
            <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Order ID</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Date Placed</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Delivery To</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Total Price</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-5 whitespace-nowrap font-medium text-indigo-600">
                                #ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-5 text-sm text-gray-600">
                                <div class="font-medium text-gray-900">{{ $order->phonenumber }}</div>
                                <div class="text-xs">{{ Str::limit($order->location, 30) }}</div>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-900">${{ number_format($order->price, 2) }}</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm">
                                <a href="{{ route('orders.show', $order->id) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection