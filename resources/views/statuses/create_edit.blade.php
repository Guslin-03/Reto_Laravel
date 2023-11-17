@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(isset($status))
                    Edición de estado
                @else
                    Creación de estado
                @endif
            </div>
            <div class="card-body">
                <form class="mt-2" name="status_form"
                      @if(isset($status))
                      action="{{ route('statuses.update', $status) }}"
                      @else
                      action="{{ route('statuses.store') }}"
                      @endif
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($status))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="{{ isset($status) ? $status->name : '' }}"/>
                    </div>
                    @if(isset($status))
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
