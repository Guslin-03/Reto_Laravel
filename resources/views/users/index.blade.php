@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('users.show', ['user' => $user->id]) }}">
                                {{ $user->name }}
                            </a>
                        </h5>
                    </div>
                    @auth
                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary">Editar</a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection
