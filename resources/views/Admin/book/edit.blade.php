@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Edit Book</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                          <input type="text"
                              name="title"
                              value="{{ old('title', $book->title) }}"
                              class="form-control @error('title') is-invalid @enderror"
                              required>
                          @error('title')
                           <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Picture</label>
                    @if($book->Picture)
                        <div class="mb-2">
                            <img src="{{ $book->Picture }}" alt="Book Image" class="img-thumbnail" style="max-height:150px;">
                        </div>
                    @endif
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
                           value="{{ old('author', $book->author) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <input type="text"
                           name="publisher"
                           value="{{ old('publisher', $book->publisher) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              required>{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number"
                               name="quantity"
                               value="{{ old('quantity', $book->quantity) }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price', $book->price) }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Type</label>
                        <select name="type_id" class="form-select">
                            @foreach($types as $t)
                                <option value="{{ $t->id }}"
                                    @if($t->id == $book->type_id) selected @endif>
                                    {{ $t->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('book.index') }}" class="btn btn-outline-primary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
