@extends('layout.user')
@section('title', 'Your Cart')

@section('content')
<div class="ui-container py-16">
    <div class="mb-12 border-b border-yellow-600/20 pb-8">
        <h1 class="serif text-5xl mb-2">Shopping Bag</h1>
        <p class="text-purple-200/70 italic">Review your selections for the upcoming term.</p>
    </div>

    @if($cart->isEmpty())
        <div class="text-center py-32 bg-[#1a0b2e] rounded-3xl border border-dashed border-yellow-600/20">
            <h2 class="serif text-2xl mb-4">Your bag is empty</h2>
            <a href="{{ route('user.Home.index') }}" class="btn-luxury inline-flex mx-auto">Continue Browsing</a>
        </div>
    @else
        <div class="grid lg:grid-cols-12 gap-16">
            <div class="lg:col-span-8">
                <div class="divide-y divide-yellow-600/20">
                    @foreach($cart as $item)
                    <div class="py-8 flex gap-8 items-start">
                        <div class="w-32 aspect-[3/4] bg-[#1a0b2e] rounded-lg overflow-hidden shadow-sm border border-yellow-600/20">
                            @if($item->book?->picture)
                                <img src="{{ str_starts_with($item->book->picture, 'http') || str_starts_with($item->book->picture, '/') ? $item->book->picture : asset('storage/'.$item->book->picture) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-[#07010d]">
                                    <i class="bi bi-book text-purple-200/70 text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="serif text-xl mb-1">{{ $item->book->title }}</h3>
                            <p class="text-sm text-purple-200/70 mb-4">By {{ $item->book->author }}</p>
                            
                            <div class="flex items-center gap-6">
                                <div class="flex items-center border border-yellow-600/20 bg-[#1a0b2e] rounded-full px-2">
                                    <form action="{{ route('user.cart.remove', $item->book_id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="p-2 text-purple-200/70 hover:text-white">－</button>
                                    </form>
                                    <span class="px-4 text-sm font-bold">{{ $item->quantity }}</span>
                                    <form action="{{ route('user.cart.update', $item->book_id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="p-2 text-purple-200/70 hover:text-white">＋</button>
                                    </form>
                                </div>
                                <form action="{{ route('user.cart.destroy', $item->book_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-xs font-bold uppercase tracking-widest bg-rose-600 text-white px-4 py-2 rounded-full">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="bg-[#1a0b2e] border border-yellow-600/20 rounded-2xl p-8 sticky top-32">
                    <h3 class="serif text-2xl mb-6">Summary</h3>
                    <div class="space-y-4 text-sm mb-8">
                        <div class="flex justify-between">
                            <span class="text-purple-200/70">Total Items</span>
                            <span class="font-bold">{{ $cart->sum('quantity') }}</span>
                        </div>
                        <div class="pt-4 border-t border-yellow-600/20 flex justify-between items-end">
                            <span class="font-bold">Estimated Total</span>
                            <span class="text-2xl serif">${{ number_format(($estimatedTotal ?? 0) / 1, 2) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('orders.checkout') }}" class="btn-luxury w-full justify-center py-4">Checkout Now</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection