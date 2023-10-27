@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de categorías</h4>
                        @auth
                        <a href="{{ route('categories.create') }}" class="btn btn-success">Crear</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($categories as $category)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $category->name }}</h5>
                                @auth
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-primary">Editar</a>
                                </form>
                                @endauth
                            </div>
                        </div>
                        @include('issues.issue', ['category'=>$category,'issues'=>$category->ultimas_issues])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
