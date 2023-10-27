@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de incidencias</h4>
                        @auth
                        <a href="{{ route('issues.create') }}" class="btn btn-success">Crear</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($issues as $issue)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                                    {{ $issue->title }}
                                </a>
                            </h5>
                            @auth
                            @if($issue->user_id == Auth::user()->id)
                            <div class="btn-group">
                                <form action="{{ route('issues.destroy', $issue) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                <a href="{{ route('issues.edit', ['issue' => $issue]) }}" class="btn btn-primary">Editar</a>
                            </div>
                            @endif
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
