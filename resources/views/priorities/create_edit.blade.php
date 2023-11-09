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
                    <div class="form-group mb-3">
                        <label for="priority" class="form-label">Número de prioridad (1 Baja - 5 Alta)</label>
                        <input type="number" class="form-control" id="priority" name="priority" required
                        value="{{ isset($priority) ? $priority->priority : '1' }}" min="1" max="5" />
                    </div>
                    @if(isset($priority))
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="submit" class="btn btn-success">
                            Crear
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
