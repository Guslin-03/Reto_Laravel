@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    @if(isset($department))
                        Edición de departamento
                    @else
                        Creación de departamento
                    @endif
                </div>
                <div class="card-body">
                    <form class="mt-2" name="priority_form"
                        @if(isset($department))
                        action="{{ route('departments.update', $department) }}"
                        @else
                        action="{{ route('departments.store') }}"
                        @endif
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($department))
                            @method('PUT')
                        @endif
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                value="{{ isset($department) ? $department->name : '' }}"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="headquarters" class="form-label">Sede</label>
                            <input type="text" class="form-control" id="headquarters" name="headquarters" required
                                value="{{ isset($department) ? $department->headquarters : '' }}"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea rows="7" class="form-control" id="description" name="description" required>{{ isset($department) ? $department->description : '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @if(isset($department))
                                Actualizar
                            @else
                                Crear
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
