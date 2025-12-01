@extends('layouts.app')

@section('content')

<style>
    .form-control, .form-select, textarea {
        background: var(--bg-light);
        border: 1px solid var(--border);
        color: var(--text-dark);
        transition: 0.2s;
    }

    .form-control:focus, .form-select:focus, textarea:focus {
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(90,52,114,0.2);
    }

    .card {
        background: var(--bg-light);
        border: 1px solid var(--border);
    }

    label {
        font-weight: 600;
        color: var(--primary);
    }

    .btn-primary {
        background: var(--secondary);
        border-color: var(--secondary);
    }

    .btn-primary:hover {
        background: var(--primary);
        border-color: var(--primary);
    }

    .btn-outline-primary {
        border-color: var(--secondary);
        color: var(--secondary);
    }

    .btn-outline-primary:hover {
        background: var(--secondary);
        color: #fff;
    }
</style>

<div class="container">

    <h3 class="fw-bold mb-3" style="color: var(--primary)">Edit Book</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title"
                        value="{{ old('title', $book->title) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Picture</label>
                    @if($book->Picture)
                        <img src="{{ $book->Picture }}" class="img-thumbnail mb-2"
                            style="max-height:150px;">
                    @endif
                    <input type="file" name="Picture" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author"
                        value="{{ old('author', $book->author) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <input type="text" name="publisher"
                        value="{{ old('publisher', $book->publisher) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3"
                              class="form-control" required>{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity"
                            value="{{ old('quantity', $book->quantity) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price"
                            value="{{ old('price', $book->price) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Type</label>
                        <select name="type_id" class="form-select">
                            @foreach($types as $t)
                                <option value="{{ $t->id }}" @selected($t->id == $book->type_id)>
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
