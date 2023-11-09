@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de prioridades</h4>
                        @auth
                        <a href="{{ route('priorities.create') }}" class="btn btn-success">Crear</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($priorities as $priority)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $priority->name }}</h5>
                                @auth
                                <form id="deleteForm" action="{{ route('priorities.destroy', $priority) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" onclick="confirmDelete()">Eliminar</button>
                                <a href="{{ route('priorities.edit', ['priority' => $priority]) }}" class="btn btn-primary">Editar</a>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        if (confirm('¿Estás seguro de que quieres eliminar la prioridad?')) {
                                            document.getElementById('deleteForm').submit();
                                        }
                                    }
                                </script>
                                @endauth
                            </div>
                        </div>
                        @include('issues.issue', ['priority'=>$priority,'issues'=>$priority->ultimas_issues])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
