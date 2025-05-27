@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (count($errors) > 0)
                        @foreach ( $errors->all() as $message )
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                    <form action="{{ route('tag.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="form-label">name</label>
                          <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $data->name ?? old('name') }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="indonesia" class="form-label">indonesia</label>
                          <input type="text" class="form-control" id="indonesia" aria-describedby="indonesia" name="indonesia" value="{{ $data->name->id ?? old('indonesia') }}" required>
                        </div>
                        <a class="btn btn-secondary" href="{{ route('tag.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
