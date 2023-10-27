@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(isset($issue))
                    Edición de incidencia
                @else
                    Creación de incidencia
                @endif
            </div>
            <div class="card-body">
                <form class="mt-2" name="status_form"
                      @if(isset($issue))
                      action="{{ route('issues.update', $issue) }}"
                      @else
                      action="{{ route('issues.store') }}"
                      @endif
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($issue))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="title" name="title" required
                               value="{{ isset($issue) ? $issue->title : '' }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="text" class="form-label">Descripción</label>
                        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">{{ isset($issue) ? $issue->text : '' }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="estimated_time" class="form-label">Tiempo Estimado</label>
                        <input type="text" class="form-control" id="estimated_time" name="estimated_time" required
                               value="{{ isset($issue) ? $issue->estimated_time : '' }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-select" id="status_id" name="status_id" required>
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}"
                                {{ (isset($issue) && $issue->status_id == $status->id) || old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ (isset($issue) && $issue->category_id == $category->id) || old('category_id') == $category->id ? 'selected' : '' }}>
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
                    <div class="form-group mb-3">
                        <select class="form-select" id="priority_id" name="priority_id" required>
                            @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}"
                                {{ (isset($issue) && $issue->priority_id == $priority->id) || old('priority_id') == $priority->id ? 'selected' : '' }}>
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
                    <button type="submit" class="btn btn-primary">
                        @if(isset($issue))
                            Editar
                        @else
                            Crear
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
