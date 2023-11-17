@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(isset($category))
                    Edición de categoría
                @else
                    Creación de categoría
                @endif
            </div>
            <div class="card-body">
                <form class="mt-2" name="category_form"
                      @if(isset($category))
                      action="{{ route('categories.update', $category) }}"
                      @else
                      action="{{ route('categories.store') }}"
                      @endif
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="{{ isset($category) ? $category->name : '' }}"/>
                    </div>
                    @if(isset($category))
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
