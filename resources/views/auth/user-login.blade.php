@extends('layouts.auth')

@section('title', 'User Login')
@section('form-title', 'Sign in (User)')

@section('content')

@if(session('error'))
    <div class="ui-alert ui-alert-error mb-4">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('user.check') }}" class="space-y-4">
    @csrf

    <div>
        <label class="ui-label">Email</label>
        <input type="email" name="email" class="ui-input" required>
    </div>

    <div>
        <label class="ui-label">Password</label>
        <input type="password" name="password" class="ui-input" required>
    </div>

    <button type="submit" class="ui-btn ui-btn-primary w-full justify-center">
        <i class="bi bi-box-arrow-in-right"></i>
        Login
    </button>

    <div class="flex items-center gap-3 py-2">
        <div class="h-px flex-1 bg-slate-200"></div>
        <span class="text-xs font-semibold text-slate-500">or</span>
        <div class="h-px flex-1 bg-slate-200"></div>
    </div>

    <a href="{{ route('user.register') }}" class="ui-btn ui-btn-secondary w-full justify-center no-underline">
        <i class="bi bi-person-plus"></i>
        Create account
    </a>
</form>

@endsection
