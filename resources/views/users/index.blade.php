@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de usuarios</h4>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($users as $user)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}">
                                    {{ $user->name }}
                                </a>
                            </h5>
                            @auth
                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary">Editar</a>
                            @endauth
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
