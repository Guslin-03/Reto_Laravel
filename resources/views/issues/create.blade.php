@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Nueva incidencia</div>
        <div class="card-body">
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

            <label class="form-label">Estado</label>
            <div class="form-group mb-3">
                <select class="form-select" id="status_id" name="status_id"  required>
                    @foreach ($statuses as $status)
                    <option  value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                    @endforeach
                </select>

                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <label class="form-label">Categoria</label>
            <div class="form-group mb-3">
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
            <div class="form-group mb-3">
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
                <button type="submit" class="btn btn-primary" name="">Crear</button>
            </div>

        </form>
    </div>
</div>
</div>
@endsection
