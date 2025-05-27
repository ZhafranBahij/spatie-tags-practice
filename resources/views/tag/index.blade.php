@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center mb-3 gap-2">
        <h2 class="mb-0">Tags</h2>
        <a href="{{ route('tag.create') }}" class="btn btn-primary" title="Add tag">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 160px;">Actions</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Name (ID)</th>
                        <th>Name (EN)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $tag)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index  }}</td>
                            <td>
                                <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-sm btn-info text-white" title="Show">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this tag?')" type="submit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->getTranslation('name', 'id') }}</td>
                            <td>{{ $tag->getTranslation('name', 'en') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No tags found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $data->links()  }}
    </div>
</div>
@endsection
