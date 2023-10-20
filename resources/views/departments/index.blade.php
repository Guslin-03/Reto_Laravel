@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($departments as $department)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('departments.show', ['department' => $department->id]) }}">
                                {{ $department->name }}
                            </a>
                            </h5>
                        <p class="card-text">Localizado en {{ $department->headquarters }}</p>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Últimas incidencias:</h6>
                                <ul class="list-group">
                                    @php $issueCount = 0 @endphp
                                    @foreach ($issues as $issue)
                                        @if ($issue->department_id == $department->id)
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
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @auth
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Crear</a>
    @endauth
@endsection
