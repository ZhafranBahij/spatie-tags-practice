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
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">name</label>
                          <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="indonesia" class="form-label">indonesia</label>
                          <input type="text" class="form-control" id="indonesia" aria-describedby="indonesia" name="indonesia" value="{{ old('indonesia') }}" required>
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

@section('scripts')
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=tags]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
@endsection
