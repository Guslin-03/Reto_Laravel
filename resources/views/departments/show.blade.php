@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ $department->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Sede: {{ $department->headquarters }}</p>
                        <p class="card-text">{{ $department->description }}</p>
                        <p class="card-text">Creado el {{ $department->created_at }}</p>
                    </div>
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Empleados del departamento</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($department->departamento_usuarios as $usuario)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <p class="card-text">{{ $usuario->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

