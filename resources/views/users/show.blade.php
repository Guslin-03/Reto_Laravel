@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{$user->name}}</h1>
                <p class="card-text">Correo electrónico: {{$user->email}}</p>
                <p class="card-text">Departamento: {{$user->usuario_departamento->name}}</p>
            </div>
        </div>
    </div>
@endsection
