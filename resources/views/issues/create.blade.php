@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform"
    action="{{route('issues.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title" required/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Descripción</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        </textarea>
    </div>

    <div class="form-group mb-3">
        <label for="estimated_time" class="form-label">Tiempo Requerido</label>
        <input type="text" class="form-control" id="estimated_time" name="estimated_time"/>
    </div>

    <div class="form-group mb-3">
        <label for="department_name" class="form-label">Nombre departamento</label>
        <input type="text" class="form-control" id="department_name" name="department_name" value="{{Auth::user()->usuario_departamento->name}}" readonly/>
    </div>

    <div class="form-group mb-3">
        <label for="status_name" class="form-label">Estado</label>
        @foreach ($statuses as $status)
        <input type="text" class="form-control" id="status_name" name="status_name" value="{{$status->name}}" readonly/>
        @endforeach
    </div>

    <label class="form-label">Categoria</label>
    <div class="col-md-6">
        <select class="form-select" id="category_id" name="category_id"  required>
            @foreach ($categories as $category)
            <option  value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>

        @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label class="form-label">Prioridad</label>
    <div class="col-md-6">
        <select class="form-select" id="priority_id" name="priority_id" required>
            @foreach ($priorities as $priority)
            <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                {{ $priority->name }}
            </option>
            @endforeach
        </select>

        @error('priority_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="hidden" class="form-control" id="status_name" name="status_id" value="{{$status->id}}" readonly/>
    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}" readonly/>
    <input type="hidden" id="department_id" name="department_id" value="{{Auth::user()->usuario_departamento->id}}" readonly/>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
</form>
</div>
@endsection
