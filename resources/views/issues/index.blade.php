@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
    @auth
    <div class="text-right mb-3">
        <a href="{{ route('issues.create') }}" class="btn btn-success">Crear</a>
    </div>
    @endauth

    @foreach ($issues as $issue)
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h1 class="card-title">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </h1>

            @auth
                @if($issue->user_id == Auth::user()->id)
                <form action="{{ route('issues.destroy', $issue) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    <a href="{{ route('issues.edit', ['issue' => $issue]) }}" class="btn btn-primary ml-2">Editar</a>
                </form>
                @endif
            @endauth
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
