<div class="container">
    <div class="card">
        <div class="card-header">Nuevo comentario</div>
            <div class="card-body">
                <form class="mt-2" name="create_platform"
                action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="text" class="form-label">Descripción</label>
                    <textarea type="textarea" rows="5" class="form-control" id="text" name="text"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="minutesUsed" class="form-label">Tiempo utilizado en la tarea</label>
                    <input type="text" class="form-control" id="minutesUsed" name="minutesUsed"/>
                </div>
                <input type="hidden" id="issue_id" name="issue_id" value="{{ $issue->id }}" />
                <button type="submit" class="btn btn-primary" name="">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
