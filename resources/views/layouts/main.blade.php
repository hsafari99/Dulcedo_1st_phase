@extends('layouts.html')

@section('layout')
    @include('layouts.feedback')
    <main class="py-3">
        <div style='max-width: 800px;' class="container">
            <h2 id="pagetitle" class="my-1 mx-auto text-center">@yield('title')</h2>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
@endsection