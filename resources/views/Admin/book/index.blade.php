@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Books</h3>
        <a href="{{ route('book.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($books as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($item->Picture)
                                        <img src="{{ $item->Picture }}" alt="thumb" style="height:48px;width:auto;object-fit:cover;" class="me-2">
                                    @endif
                                    {{ $item->title ?? $item->titel }}
                                </td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->type?->name ?? 'No Type' }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>

                            <td>
                                {{-- Details --}}
                                <a href="{{ route('book.show', $item->id) }}"
                                   class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('book.edit', $item->id) }}"
                                   class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('book.destroy', $item->id) }}"
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
