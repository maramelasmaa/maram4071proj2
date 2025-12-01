@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Add Book</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           class="form-control @error('title') is-invalid @enderror"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Picture (upload)</label>
                    <input type="file"
                           name="Picture"
                           class="form-control @error('Picture') is-invalid @enderror">
                    @error('Picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text"
                           name="author"
                           value="{{ old('author') }}"
                           class="form-control @error('author') is-invalid @enderror"
                           required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <input type="text"
                           name="publisher"
                           value="{{ old('publisher') }}"
                           class="form-control @error('publisher') is-invalid @enderror"
                           required>
                    @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number"
                               name="quantity"
                               value="{{ old('quantity') }}"
                               class="form-control @error('quantity') is-invalid @enderror"
                               required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price') }}"
                               class="form-control @error('price') is-invalid @enderror"
                               required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Type</label>
                        <select name="type_id"
                                class="form-select @error('type_id') is-invalid @enderror"
                                required>
                            <option value="">Select...</option>
                            @foreach($types as $t)
                                <option value="{{ $t->id }}" {{ old('type_id') == $t->id ? 'selected' : '' }}>
                                    {{ $t->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('book.index') }}" class="btn btn-outline-primary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
