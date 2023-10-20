@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Últimas incidencias con esta categoria:</h6>
                                <ul class="list-group">
                                    @php $issueCount = 0 @endphp
                                    @foreach ($issues as $issue)
                                        @if ($issue->category_id == $category->id)
                                        <li class="list-group-item">
                                            <a href="{{ route('issues.show', ['issue' => $issue->id]) }}">
                                                {{ $issue->title }}
                                            </a>
                                        </li>
                                            @php $issueCount++ @endphp
                                        @endif
                                        @if ($issueCount >= 5)
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
