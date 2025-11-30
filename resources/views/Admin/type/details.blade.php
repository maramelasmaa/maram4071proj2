@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Type Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $type->id}}</p>
            <p><strong>Name:</strong> {{ $type->name}}</p>
            <p><strong>Edition:</strong> {{ $type->edition}}</p>
            <p><strong>Category:</strong> {{ $type->category?->name ?? 'No Category' }}</p>

            <a href="{{ route('type.index') }}" class="btn btn-secondary mt-2">Back</a>

        </div>
    </div>

</div>

@endsection
