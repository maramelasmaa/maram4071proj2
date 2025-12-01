@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Classifications</h3>
        <a href="{{ route('classification.create') }}" class="btn btn-primary">
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
                        <th width="140">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($classifications as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>

                            <td>
                                <a href="{{ route('classification.show', $item->id) }}"
                                   class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('classification.edit', $item->id) }}"
                                   class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('classification.destroy', $item->id) }}"
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
