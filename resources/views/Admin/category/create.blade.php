@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Add Category</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                {{-- Select Classification --}}
                <div class="mb-3">
                    <label class="form-label">Classification</label>
                    <select name="class_id" class="form-select @error('class_id') is-invalid @enderror" required>
                        <option value="">Select...</option>

                        @foreach($classes as $cls)
                            <option value="{{ $cls->id}}">
                                {{ $cls->name}}
                            </option>
                        @endforeach
                    </select>

                    @error('class_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category Name --}}
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror"
                           required>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('category.index') }}" class="btn btn-outline-primary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
