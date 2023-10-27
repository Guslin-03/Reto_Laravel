<div class="card-body">
    <h6 class="card-title">
        @if(@isset($status) || @isset($priority) || @isset($category) || @isset($department) || @isset($user))
            Últimas incidencias:
        @else
            No hay incidencias
        @endif
    </h6>
    <ul class="list-group">
        @foreach ($issues as $issue)
            @if (@isset($status) && $issue->status_id == $status->id)
            <li class="list-group-item">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </li>
            @endif

            @if (@isset($priority) && $issue->priority_id == $priority->id)
            <li class="list-group-item">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </li>
            @endif

            @if (@isset($category) && $issue->category_id == $category->id)
            <li class="list-group-item">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </li>
            @endif

            @if (@isset($department) && $issue->department_id == $department->id)
            <li class="list-group-item">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </li>
            @endif

            @if (@isset($user) && $issue->user_id == $user->id)
            <li class="list-group-item">
                <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                    {{ $issue->title }}
                </a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
