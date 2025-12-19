@extends('layouts.auth')

@section('title', 'Admin Login')
@section('form-title', 'Sign in (Admin)')

@section('content')

@if(session('error'))
    <div class="ui-alert ui-alert-error mb-4">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.check') }}" class="space-y-4">
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
        <i class="bi bi-shield-lock"></i>
        Login
    </button>
</form>

@endsection
