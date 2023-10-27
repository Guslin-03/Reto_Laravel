@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($priorities as $priority)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $priority->name }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Últimas incidencias con esta prioridad:</h6>
                                <ul class="list-group">
                                    @php $issueCount = 0 @endphp
                                    @foreach ($issues as $issue)
                                        @if ($issue->priority_id == $priority->id)
                                        <li class="list-group-item">
                                            <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                                                {{ $issue->title }}
                                            </a>
                                        </li>
                                            @php $issueCount++ @endphp
                                        @endif
                                        @if ($issueCount >= 5)
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @auth
                            <form action="{{route('priorities.destroy',$priority)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            <a href="{{ route('priorities.edit', ['priority' => $priority]) }}" class="btn btn-primary">Editar</a>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @auth
    <a href="{{ route('priorities.create') }}" class="btn btn-primary">Crear</a>
    @endauth
@endsection
