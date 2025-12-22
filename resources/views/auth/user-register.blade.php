@extends('layout.auth')
@section('title', 'Register')
@section('form-title', 'Create Account')

@section('content')
    <form method="POST" action="{{ route('user.register.store') }}" class="space-y-5">
        @csrf
        <div>
            <label class="ui-label">Full Name</label>
            <input type="text" name="name" class="ui-input" placeholder="Jane Doe" required>
        </div>

        <div>
            <label class="ui-label">Email Address</label>
            <input type="email" name="email" class="ui-input" placeholder="jane@example.com" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="ui-label">Password</label>
                <input type="password" name="password" class="ui-input" placeholder="••••••" required>
            </div>
            <div>
                <label class="ui-label">Confirm</label>
                <input type="password" name="password_confirmation" class="ui-input" placeholder="••••••" required>
            </div>
        </div>

        <button type="submit" class="btn-black w-full mt-4">Register</button>

        <p class="text-center text-sm text-purple-200/70">
            Already have an account? <a href="{{ route('user.login') }}" class="font-bold text-white underline">Sign in</a>
        </p>
    </form>
@endsection