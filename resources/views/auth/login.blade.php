@extends('layouts.auth')

@section('title', 'Login - Library')
@section('form-title', 'Sign in to your account')

@section('content')

@if(session('error'))
    <div class="ui-alert ui-alert-error mb-4">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="ui-alert ui-alert-error mb-4">
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login.attempt') }}" method="POST" autocomplete="off" class="space-y-4">
    @csrf

    {{-- Email --}}
    <div>
        <label class="ui-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="ui-input" placeholder="Enter your email" required>
    </div>

    {{-- Password --}}
    <div>
        <label class="ui-label">Password</label>
        <input type="password" name="password" class="ui-input" placeholder="••••••" required>
    </div>

    {{-- Submit --}}
    <button type="submit" class="ui-btn ui-btn-primary w-full justify-center">
        <i class="bi bi-box-arrow-in-right"></i>
        Login
    </button>

    <div class="flex items-center gap-3 py-2">
        <div class="h-px flex-1 bg-slate-200"></div>
        <span class="text-xs font-semibold text-slate-500">or</span>
        <div class="h-px flex-1 bg-slate-200"></div>
    </div>

    <a href="{{ route('user.register') }}"
       class="ui-btn ui-btn-secondary w-full justify-center no-underline">
        <i class="bi bi-person-plus"></i>
        Create account
    </a>
</form>

@endsection
