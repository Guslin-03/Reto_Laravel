@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de departamentos</h4>
                        @auth
                        <a href="{{ route('departments.create') }}" class="btn btn-success">Crear</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($departments as $department)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $department->name }}</h5>
                                @auth
                                    @if (($department->departamento_usuarios->isEmpty()))
                                        <form action="{{route('departments.destroy',$department)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                            <a href="{{ route('departments.edit', ['department' => $department]) }}" class="btn btn-primary">Editar</a>
                                        </form>
                                    @else
                                    <a href="{{ route('departments.edit', ['department' => $department]) }}" class="btn btn-primary">Editar</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        @include('issues.issue', ['department'=>$department,'issues'=>$department->ultimas_issues])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
