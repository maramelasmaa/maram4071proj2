@extends('layout.user')
@section('title', 'Finalize Order')

@section('content')
<div class="ui-container py-20">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-purple-200/70">Secure Checkout</span>
            <h1 class="serif text-5xl mt-4 mb-2">Delivery Details</h1>
            <p class="text-purple-200/70 italic">Where should we send your academic collection?</p>
        </div>

        <form action="{{ route('orders.store') }}" method="POST" class="bg-[#1a0b2e] border border-yellow-600/20 rounded-3xl p-10">
            @csrf
            <div class="space-y-8">
                {{-- Phone Number --}}
                <div>
                      <label class="block text-xs font-bold uppercase tracking-widest text-purple-200/70 mb-3">Phone Number</label>
                    <input type="text" name="phonenumber" required 
                          class="w-full px-0 py-3 border-b border-yellow-600/20 bg-transparent text-lg text-white focus:border-yellow-600/20 outline-none transition-all placeholder:text-purple-200/70"
                           placeholder="+1 (000) 000-0000">
                </div>

                {{-- Location --}}
                <div>
                      <label class="block text-xs font-bold uppercase tracking-widest text-purple-200/70 mb-3">Delivery Location</label>
                    <input type="text" name="location" required 
                          class="w-full px-0 py-3 border-b border-yellow-600/20 bg-transparent text-lg text-white focus:border-yellow-600/20 outline-none transition-all placeholder:text-purple-200/70"
                           placeholder="Campus Building, Room or Home Address">
                </div>

                {{-- Note --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-purple-200/70 mb-3">Special Instructions (Optional)</label>
                    <textarea name="note" rows="2" 
                              class="w-full px-0 py-3 border-b border-yellow-600/20 bg-transparent text-lg text-white focus:border-yellow-600/20 outline-none transition-all placeholder:text-purple-200/70 resize-none"
                              placeholder="e.g. Leave at the front desk..."></textarea>
                </div>

                <div class="pt-6">
                    <button type="submit" class="btn-luxury w-full justify-center py-5 text-base tracking-widest uppercase">
                        Confirm & Place Order
                    </button>
                    <a href="{{ route('user.cart.index') }}" class="block text-center mt-6 text-xs font-bold uppercase tracking-widest text-purple-200/70 hover:text-white transition-colors">
                        Return to Bag
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection