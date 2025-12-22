@extends('layout.auth')
@section('title', 'Login')
@section('form-title', 'Welcome Back')

@section('content')
@php
    $isAdmin = request()->routeIs('admin.*');
    $action = $isAdmin ? route('admin.check') : route('user.check');
@endphp

<form action="{{ $action }}" method="POST" class="space-y-5">
    @csrf
    <div>
        <label class="ui-label">Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" class="ui-input" placeholder="name@example.com" required>
    </div>

    <div>
        <div class="flex justify-between items-center mb-2">
            <label class="ui-label mb-0">Password</label>
            <a href="#" class="text-[10px] font-bold text-purple-200/70 hover:text-white uppercase">Forgot?</a>
        </div>
        <input type="password" name="password" class="ui-input" placeholder="••••••••" required>
    </div>

    <button type="submit" class="btn-black w-full">Sign In</button>

    @unless($isAdmin)
        <div class="relative py-2">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-yellow-600/20"></div></div>
            <div class="relative flex justify-center text-[10px] uppercase"><span class="bg-[#1a0b2e] px-4 text-purple-200/70 font-bold tracking-widest">or</span></div>
        </div>

        <a href="{{ route('user.register') }}" class="w-full flex items-center justify-center py-3.5 border border-yellow-600/20 rounded-lg text-sm font-bold text-white bg-[#07010d] transition-all">
            Create an Account
        </a>
    @endunless
</form>
@endsection