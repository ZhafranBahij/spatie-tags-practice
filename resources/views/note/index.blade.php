@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Note') }}</div>
                <div class="card-body">
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('note.create') }}">Create</a>
                    <form>
                        {{-- @csrf --}}
                        <input type="text" name="search" value="{{ request('search') }}" >
                        <button type="submit">Submit</button>
                    </form>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Note</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <th scope="row">{{ ++$index }}</th>
                                    <td>
                                        <a class="btn btn-warning btn-sm mb-2" href="{{ route('note.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('note.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
