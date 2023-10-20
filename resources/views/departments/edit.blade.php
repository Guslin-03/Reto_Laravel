@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="mt-2" name="create_platform" action="{{route('departments.update',$department)}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required
                value="{{$department->name}}"/>
            </div>
            <div class="form-group mb-3">
                <label for="headquarters" class="form-label">Sede</label>
                <input type="text" class="form-control" id="headquarters" name="headquarters" required
                value="{{$department->headquarters}}"/>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea type="textarea" rows="7" class="form-control" id="description" name="description" required>
                    {{$department->description}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="">Actualizar</button>
        </form>
    </div>
@endsection