<div class="card-body">
    <h6 class="card-title">
        @php
        $issuesList = [];
        @endphp
        @foreach ($issues as $issue)
            @if (@isset($status) && $issue->status_id == $status->id)
                @php
                $issuesList[] = $issue
                @endphp
            @endif
            @if (@isset($priority) && $issue->priority_id == $priority->id)
                @php
                $issuesList[] = $issue
                @endphp
            @endif
            @if (@isset($category) && $issue->category_id == $category->id)
                @php
                $issuesList[] = $issue
                @endphp
            @endif
            @if (@isset($department) && $issue->department_id == $department->id)
                @php
                $issuesList[] = $issue
                @endphp
            @endif
            @if (@isset($user) && $issue->user_id == $user->id)
                @php
                $issuesList[] = $issue
                @endphp
            @endif
        @endforeach

        @if (@empty($issuesList))
            No hay incidencias
        @elseif (count($issuesList) == 1)
            Última incidencia:
        @else
            Últimas incidencias:
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
                <span class="small text-muted">Creación: {{ $issue->created_at }}</span>
            </li>
            @endif
        @endforeach
    </ul>
</div>
