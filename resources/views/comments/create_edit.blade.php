<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                @if(isset($comment))
                    Edición de comentario
                @else
                    Creación de comentario
                @endif
            </div>
            <form class="mt-2" name="priority_form"
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
                @if ($issue->user_id == Auth::user()->id)
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="text" name="text" required
                            value="{{ isset($comment) ? $comment->text : ''}}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="minutesUsed" class="form-label">Tiempo utilizado en la tarea</label>
                        <input type="minutesUsed" class="form-control" id="minutesUsed" name="minutesUsed" required
                        value="{{ isset($comment) ? $comment->minutesUsed:'' }}"/>
                    </div>
                    <input type="hidden" id="issue_id" name="issue_id" value="{{ $issue->id }}" />
                    <button type="submit" class="btn btn-primary">
                        @if(isset($comment))
                            Editar

                        @else
                            Crear
                        @endif
                    </button>
                @endif
            </form>
            @if(isset($comment))
                <form action="{{route('comments.destroy',$comment)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>
