<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                @if(isset($comment))
                    Comentario
                @else
                    Creación de comentario
                @endif
            </div>
            <div class="container">
                <form name="priority_form"
                    @if(isset($comment))
                        action="{{ route('comments.update', $comment) }}"
                    @else
                        action="{{ route('comments.store') }}"
                    @endif
                        method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($comment))
                        @method('PUT')
                    @endif
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="text" name="text" required
                            value="{{ isset($comment) ? $comment->text : ''}}"
                            @if(isset($comment) && auth()->user()->id != $comment->user_id)
                            readonly
                        @endif/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="minutesUsed" class="form-label">Tiempo utilizado en la tarea</label>
                        <input type="number" class="form-control" id="minutesUsed" name="minutesUsed" required
                            value="{{ isset($comment) ? $comment->minutesUsed:'' }}" min="0"
                            @if(isset($comment) && auth()->user()->id != $comment->user_id)
                            readonly
                        @endif/>
                    </div>
                    <input type="hidden" id="issue_id" name="issue_id" value="{{ $issue->id }}" />
                    @if(!isset($comment))
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">
                                Añadir
                            </button>
                        </div>
                    @endif
                    @if(isset($comment) && auth()->user()->id == $comment->user_id)
                        <button type="submit" class="btn btn-primary d-inline">
                                Actualizar
                        </button>
                    @endif
                </form>
                @if(isset($comment) && auth()->user()->id == $comment->user_id)
                    <form id="deleteForm" action="{{route('comments.destroy',$comment)}}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="button" onclick="confirmDelete()">Eliminar</button>
                    </form>
                @endif
                <script>
                    function confirmDelete() {
                        if (confirm('¿Estás seguro de que quieres eliminar el comentario?')) {
                            document.getElementById('deleteForm').submit();
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>
