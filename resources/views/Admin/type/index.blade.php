@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Types</h3>
        <a href="{{ route('type.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Edition</th>
                        <th>Category</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($types as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->edition }}</td>
                            <td>{{ $item->category?->name }}</td>

                          

                            <td>
                                {{-- Details --}}
                                <a href="{{ route('type.show', $item->id) }}"
                                   class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('type.edit', $item->id) }}"
                                   class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('type.destroy', $item->id) }}"
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
