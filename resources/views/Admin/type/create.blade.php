@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Add Type</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('type.store') }}" method="POST">
                @csrf

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror"
                            required>
                        <option value="">Select...</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Type Name --}}
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Edition --}}
                <div class="mb-3">
                    <label class="form-label">Edition</label>
                    <input type="text"
                           name="edition"
                           value="{{ old('edition') }}"
                           class="form-control @error('edition') is-invalid @enderror"
                           required>
                    @error('edition')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('type.index') }}" class="btn btn-outline-primary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
