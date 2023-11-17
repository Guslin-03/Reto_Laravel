@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">{{$user->name}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Correo electrónico: {{$user->email}}</p>
                        <p class="card-text">Departamento: {{$user->usuario_departamento->name}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection

