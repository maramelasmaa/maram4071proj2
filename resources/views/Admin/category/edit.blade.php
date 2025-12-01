@extends('layouts.app')

@section('content')

<h3 class="fw-bold mb-3">Edit Category</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Classification</label>
                <select name="class_id" class="form-select">
                    @foreach($classes as $cls)
                        <option value="{{ $cls->id}}"
                            @if($cls->id == $category->class_id) selected @endif>
                            {{ $cls->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('category.index') }}" class="btn btn-outline-primary">Back</a>
        </form>
    </div>
</div>

@endsection
