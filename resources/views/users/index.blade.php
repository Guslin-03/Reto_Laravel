@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <a href="{{ route('users.show', ['user' => $user]) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
