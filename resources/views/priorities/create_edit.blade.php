@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(isset($priority))
                    Edición de prioridad
                @else
                    Creación de prioridad
                @endif
            </div>
            <div class="card-body">
                <form class="mt-2" name="priority_form"
                      @if(isset($priority))
                      action="{{ route('priorities.update', $priority) }}"
                      @else
                      action="{{ route('priorities.store') }}"
                      @endif
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($priority))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="{{ isset($priority) ? $priority->name : '' }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($priority))
                            Actualizar
                        @else
                            Crear
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
