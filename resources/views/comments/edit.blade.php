<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.update',$comment)}}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="text" class="form-label">Descripción</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text" required>{{$comment->text}}
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="minutesUsed" class="form-label">Tiempo Utilizado en la tarea</label>
        <input type="text" class="form-control" id="minutesUsed" name="minutesUsed" required
        value="{{$comment->minutesUsed}}"/>
    </div>
    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
</form>
</div>

