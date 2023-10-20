@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach ($issues as $issue)
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                        {{ $issue->title }}
                    </a>
                </h1>
                <p class="card-text">Departamento: {{$issue->incidencia_departamento->name}}</p>
                <p class="card-text">{{$issue->created_at}}</p>
                <a href="{{ route('issues.show', ['issue' => $issue]) }}" class="btn btn-primary">Ver Detalles</a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('issues.create') }}" class="btn btn-primary">Crear</a>
@endsection
