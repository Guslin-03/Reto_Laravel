@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Nuevo departamento</div>
            <div class="card-body">
        <form class="mt-2" name="create_platform"
                action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <div class="form-group mb-3">
                <label for="sede" class="form-label">Sede</label>
                <input type="text" class="form-control" id="headquarters" name="headquarters"/>
            </div>
            <div class="form-group mb-3">
                <label for="sede" class="form-label">Descripción</label>
                <textarea type="textarea" rows="5" class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="">Crear</button>
        </form>
    </div>
</div>
</div>
@endsection
