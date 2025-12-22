@extends('layout.auth')
@section('title', 'Admin Portal')
@section('form-title', 'Administrator Login')

@section('content')
    <form method="POST" action="{{ route('admin.check') }}" class="space-y-6">
        @csrf
        <div>
            <label class="ui-label">Admin Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="ui-input" placeholder="admin@devbookstore.com" required autofocus>
        </div>

        <div>
            <label class="ui-label">Password</label>
            <input type="password" name="password" class="ui-input" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-black w-full">
            Sign In to Dashboard
        </button>
    </form>

    <div class="mt-8 text-center pt-6 border-t border-yellow-600/20">
        <a href="{{ url('/') }}" class="text-[10px] font-bold text-purple-200/70 hover:text-white uppercase tracking-widest transition-colors flex items-center justify-center">
            <i class="bi bi-arrow-left mr-2"></i> Back to Bookstore
        </a>
    </div>
@endsection