@extends('layout.auth')
@section('title', 'Sign In')
@section('form-title', 'Customer Login')

@section('content')
    <form method="POST" action="{{ route('user.check') }}" class="space-y-6">
        @csrf
        <div>
            <label class="ui-label">Email</label>
            <input type="email" name="email" class="ui-input" placeholder="you@example.com" required>
        </div>

        <div>
            <label class="ui-label">Password</label>
            <input type="password" name="password" class="ui-input" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-black w-full">Sign In</button>

        <p class="text-center text-sm text-purple-200/70">
            New customer? <a href="{{ route('user.register') }}" class="font-bold text-white underline">Create account</a>
        </p>
    </form>
@endsection