@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{$department->name}}</h1>
                <p class="card-text">Sede: {{$department->headquarters}}</p>
                <p class="card-text">{{$department->description}}</p>
                <p class="card-text">Creado el {{$department->created_at}}</p>
            </div>
        </div>
    </div>
    <div class="container">
    <h1>Empleados del departamento</h1>
    @foreach ($department->departamento_usuarios as $usuario)

    <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{$usuario->name}}</h1>
            </div>
            </div>
    @endforeach
    </div>
@endsection
