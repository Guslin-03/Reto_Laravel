@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"> <h4 class="card-title">{{ $issue->title }}</h4></div>
            <div class="card-body">
                <p class="card-text">Descripción: {{ $issue->text }}</p>
                <p class="card-text">Tiempo estimado: {{ $issue->estimated_time }} minutos</p>
                <p class="card-text">Departamento propietario: {{ $issue->incidencia_departamento->name }}</p>
                <p class="card-text">Usuario que reporta la incidencia: {{ $issue->incidencia_usuario->name }}</p>
                <p class="card-text">Categoría: {{ $issue->incidencia_categoria->name ?? 'Eliminado'}}</p>
                <p class="card-text">Prioridad: {{ $issue->incidencia_prioridad->name ?? 'Eliminado'}}</p>
                <p class="card-text">Estado: {{ $issue->incidencia_estado->name ?? 'Eliminado' }}</p>
                <p class="card-text">Creada el {{ $issue->created_at }}</p>
            </div>
    </div>
    <div class="container">
        @auth
            @if($issue->department_id == Auth::user()->department_id)
                @foreach ($issue->incidencia_comentarios as $comment)
                    @if ($issue->id == $comment->issue_id)
                        @include('comments.create_edit', ['comment'=>$comment])
                    @endif
                @endforeach
            @endif
        @endauth
</div>
@auth
    @if($issue->department_id == Auth::user()->department_id)
        <div class="container">
            @include('comments.create_edit', ['comment'=>null])
        </div>
    @endif
@endauth
@endsection
