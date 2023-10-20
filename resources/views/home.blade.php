@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard de {{ Auth::user()->name }}</div>
                        <div class="card-body">
                        <h5 class="card-title">Tus últimas incidencias</h5>
                            @foreach ($issues as $issue)
                                @if($issue->id == Auth::user()->id)
                                    <p class="card-title">{{ $issue->title }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
