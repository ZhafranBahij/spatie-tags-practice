@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center mb-3 gap-2">
        <h2 class="mb-0">Notes</h2>
        <a href="{{ route('note.create') }}" class="btn btn-primary" title="Add Note">
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
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $note)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index  }}</td>
                            <td>
                                <a href="{{ route('note.show', $note->id) }}" class="btn btn-sm btn-info text-white" title="Show">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('note.edit', $note->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('note.destroy', $note->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this note?')" type="submit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $note->title }}</td>
                            <td>
                                <ul>
                                    @foreach ($note->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if(strlen($note->description) > 69)
                                    {{ Str::limit($note->description, 69) }}
                                    <a href="{{ route('note.show', $note->id) }}" class="ms-1">Read More</a>
                                @else
                                    {{ $note->description  }}
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No notes found.</td>
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
