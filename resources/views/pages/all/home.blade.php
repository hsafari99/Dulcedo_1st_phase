@extends('layouts.main')

@section('title')
    Home
@endsection
@section('content')
    <div class="card my-3">
        <div class="card-header">Newsfeed</div>
        <div class="card-body">
            @include('assets.feed')
        </div>
    </div>
@endsection
