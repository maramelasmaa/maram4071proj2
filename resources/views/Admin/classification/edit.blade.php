@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Edit Classification</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('classification.update', $classification->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $classification->name }}"
                           class="form-control @error('name') is-invalid @enderror"
                           required>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success">Update</button>
                <a href="{{ route('classification.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>

@endsection
