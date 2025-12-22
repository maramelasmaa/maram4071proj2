@extends('layout.user')
@section('title', 'My Orders')

@section('content')
<div class="ui-container py-16">
    <div class="mb-12 border-b border-yellow-600/20 pb-8">
        <h1 class="serif text-5xl mb-2">Order History</h1>
        <p class="text-purple-200/70 italic">Tracking your curated academic materials.</p>
    </div>

    @if($orders->isEmpty())
        <div class="text-center py-32 bg-[#1a0b2e] rounded-3xl border border-dashed border-yellow-600/20">
            <i class="bi bi-journal-text text-4xl text-purple-200/70 mb-4 block"></i>
            <p class="text-purple-200/70 serif text-xl">No orders found yet.</p>
            <a href="{{ route('user.Home.index') }}" class="btn-luxury inline-flex mt-6">Explore Books</a>
        </div>
    @else
        <div class="overflow-hidden bg-[#1a0b2e] border border-yellow-600/20 rounded-2xl">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-[#07010d] border-b border-yellow-600/20">
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.2em] text-purple-200/70">Order Ref</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.2em] text-purple-200/70">Date Placed</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.2em] text-purple-200/70">Inventory</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-[0.2em] text-purple-200/70">Status</th>
                        <th class="px-8 py-5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-yellow-600/20">
                    @foreach($orders as $order)
                    <tr class="hover:bg-[#07010d] transition-colors">
                        <td class="px-8 py-6 font-medium">#{{ $order->id }}</td>
                        <td class="px-8 py-6 text-purple-200/70 text-sm">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-8 py-6 text-purple-200/70 text-sm">{{ $order->Orderitem->count() }} Items</td>
                        <td class="px-8 py-6">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#07010d] border border-yellow-600/20 text-white text-[10px] font-bold uppercase tracking-wider">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                Processed
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <a href="{{ route('orders.show', $order->id) }}" class="text-xs font-bold uppercase tracking-widest text-purple-200/70 hover:text-white hover:underline transition-colors">View Receipt</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection