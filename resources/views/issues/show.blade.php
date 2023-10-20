@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Incidencia </div>
        <div class="card-body">
            <h1 class="card-title">{{ $issue->title }}</h1>
            <p class="card-text">Descripción: {{ $issue->text }}</p>
            <p class="card-text">{{ $issue->estimated_time }} minutos</p>
            <p class="card-text">Departamento propietario: {{ $issue->incidencia_departamento->name }}</p>
            <p class="card-text">Usuario que reporta la incidencia: {{ $issue->incidencia_usuario->name }}</p>
            <p class="card-text">Creada el {{ $issue->created_at }}</p>
        </div>
    </div>

</div>

@auth
<div class="container">
    <div class="card">
        <div class="card-header">Comentarios Recientes </div>
    @foreach ($comments as $comment)
    @if ($issue->id == $comment->issue_id)
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $comment->text }}</p>
            <p class="card-text">{{ $comment->minutesUsed }} minutos empleados en solucionar la incidencia</p>
        </div>
    </div>
    @endif
    @endforeach
</div>
@auth

@include('comments.create', $issue)

<a href="{{ route('comments.create', ['issue' => $issue]) }}" class="btn btn-primary">Crear</a>
@endauth
</div>
@endauth
@endsection

