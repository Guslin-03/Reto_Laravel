@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
        <div class="card-header">Edición de usuario</div>
        <div class="card-body">
        <form class="mt-2" name="create_platform"
                action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required
                value="{{$user->name}}"/>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" id="email" name="email" required
                value="{{$user->email}}"/>
            </div>

            <button type="submit" class="btn btn-primary" name="">Actualizar</button>
        </form>
    </div>
    </div>
    </div>
@endsection
