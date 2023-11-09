@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de estados</h4>
                        @auth
                        <a href="{{ route('statuses.create') }}" class="btn btn-success">Crear</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($statuses as $status)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $status->name }}</h5>
                                @auth
                                <form id="deleteForm" action="{{ route('statuses.destroy', $status) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" onclick="confirmDelete()">Eliminar</button>
                                <a href="{{ route('statuses.edit', ['status' => $status]) }}" class="btn btn-primary">Editar</a>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        if (confirm('¿Estás seguro de que quieres eliminar el estado?')) {
                                            document.getElementById('deleteForm').submit();
                                        }
                                    }
                                </script>
                                @endauth
                            </div>
                        </div>
                        @include('issues.issue', ['status'=>$status,'issues'=>$status->ultimas_issues])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
