@if(session('error'))
    <div class="alert alert-danger text-center font-weight-bold">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center font-weight-bold">{{ session('success') }}</div>
@endif