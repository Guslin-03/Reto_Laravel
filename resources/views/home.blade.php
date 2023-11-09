@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Página de inicio de {{ Auth::user()->name }}</div>
                @include('issues.issue', ['user'=>Auth::user(),'issues'=>$issues])
            </div>
        </div>
    </div>
</div>
@endsection
