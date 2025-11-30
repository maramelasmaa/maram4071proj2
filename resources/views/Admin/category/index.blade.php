@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Categories</h3>
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Classification</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            {{-- Category Name --}}
                            <td>{{ $item->name }}</td>

                            <td>{{ $item->classification?->name }}</td>


                            {{-- Actions --}}
                            <td>
                                <!-- Details -->
                                <a href="{{ route('category.show', $item->id) }}"
                                   class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('category.edit', $item->id) }}"
                                   class="btn btn-outline-warning btn-sm me-1">
                                   <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('category.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete?')"
                                            class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
