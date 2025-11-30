@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-3">Edit Type</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('type.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                @if($cat->id == $type->category_id) selected @endif>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Type Name --}}
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $type->name}}"
                           class="form-control"
                           required>
                </div>

                {{-- Edition --}}
                <div class="mb-3">
                    <label class="form-label">Edition</label>
                    <input type="text"
                           name="edition"
                           value="{{ $type->edition}}"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-success">Update</button>
                <a href="{{ route('type.index') }}" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
