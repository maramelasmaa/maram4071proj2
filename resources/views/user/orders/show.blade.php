@extends('layout.user')
@section('title', 'Order Receipt')

@section('content')
<div class="ui-container py-16">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 border-b border-yellow-600/20 pb-8 gap-4">
        <div>
            <a href="{{ route('orders.index') }}" class="text-[10px] font-bold uppercase tracking-widest text-purple-200/70 hover:text-white mb-4 inline-block transition-colors">
                <i class="bi bi-arrow-left"></i> Back to History
            </a>
            <h1 class="serif text-5xl">Order #{{ $order->id }}</h1>
        </div>
        <div class="text-sm font-bold uppercase tracking-widest text-white">
            Confirmed & Shipped
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-xs font-bold text-purple-200/70 uppercase tracking-widest">Ordered Materials</h2>
            <div class="divide-y divide-yellow-600/20 border-t border-yellow-600/20">
                @foreach($order->Orderitem as $item)
                <div class="py-6 flex items-center gap-6">
                    <div class="w-16 aspect-[3/4] bg-[#1a0b2e] border border-yellow-600/20 rounded flex-shrink-0 overflow-hidden">
                        <img src="{{ asset('storage/'.$item->book->picture) }}" class="w-full h-full object-cover grayscale">
                    </div>
                    <div class="flex-grow">
                        <h3 class="serif text-lg">{{ $item->book->title }}</h3>
                        <p class="text-xs text-purple-200/70">Quantity: {{ $item->quantity }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="bg-[#1a0b2e] rounded-3xl p-8 border border-yellow-600/20">
                <h3 class="serif text-2xl mb-8">Logistics</h3>
                <div class="space-y-6">
                    <div>
                        <p class="text-[10px] text-purple-200/70 font-bold uppercase tracking-widest mb-1">Contact</p>
                        <p class="text-sm font-medium">{{ $order->phonenumber }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-purple-200/70 font-bold uppercase tracking-widest mb-1">Destination</p>
                        <p class="text-sm font-medium leading-relaxed">{{ $order->location }}</p>
                    </div>
                    @if($order->note)
                    <div class="pt-4 border-t border-yellow-600/20">
                        <p class="text-[10px] text-purple-200/70 font-bold uppercase tracking-widest mb-1">Customer Note</p>
                        <p class="text-sm italic text-purple-200/70">"{{ $order->note }}"</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection