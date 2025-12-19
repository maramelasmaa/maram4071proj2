@extends('layouts.auth')

@section('title', 'User Registration')
@section('form-title', 'Create your account')

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

<form method="POST" action="{{ route('user.register.store') }}" class="space-y-4">
    @csrf

    <div>
        <label class="ui-label">Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="ui-input" placeholder="Enter your name" required>
    </div>

    <div>
        <label class="ui-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="ui-input" placeholder="you@example.com" required>
    </div>

    <div>
        <label class="ui-label">Password</label>
        <input type="password" name="password" class="ui-input" placeholder="••••••" required>
        <p class="ui-help">Minimum 6 characters.</p>
    </div>

    <div>
        <label class="ui-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="ui-input" placeholder="••••••" required>
    </div>

    <button type="submit" class="ui-btn ui-btn-primary w-full justify-center">
        <i class="bi bi-person-check"></i>
        Create Account
    </button>

    <div class="pt-2 text-center text-sm text-slate-600">
        <a href="{{ route('user.login') }}" class="font-semibold text-indigo-700 hover:text-indigo-800 no-underline">Already have an account? Login</a>
    </div>
</form>

@endsection
