@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Classification Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $classification->id }}</p>
            <p><strong>Name:</strong> {{ $classification->name }}</p>

            <a href="{{ route('classification.index') }}" class="btn btn-outline-primary mt-2">
                Back
            </a>

        </div>
    </div>

</div>

@endsection
