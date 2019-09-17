@extends('layouts.main')

@section('title')
    User Management
@endsection

@section('content')

    <script>
        function toggleRole(e) {
            if ($(e).hasClass('badge-secondary'))
                $(e).removeClass('badge-secondary');
            else
                $(e).addClass('badge-secondary');
        }
    </script>

    <div class="row">
        <div class="col form-group input-group">
            <span class="input-group-prepend"><i class="input-group-text fa fa-search"></i></span>
            <input oninput='' class="form-control" placeholder="Search user">
        </div>
        <div class="col">
            <div class="float-right btn btn-secondary" data-toggle="collapse" href="#new-user-card"><i class="fa fa-plus-circle mx-1"></i>Create a new user</div>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center my-2">

    <!-- NEW USER -->
    <div class='collapse my-2' id="new-user-card">
        <form action="/users/new" method="POST" class="card my-2">
            @csrf
            <div class="card-header font-weight-bold">
                <span class="badge-pill">New user</span>
                <div class="row">
                    <div class="col">
                        <input name="new-firstname" class="form-control" type="text" placeholder="Firstname" required>
                        <input name="new-lastname" type="text" class="form-control" placeholder="Lastname" required>
                    </div>
                    <input type="submit" class="btn badge-pill btn-secondary m-2" value="Add"/>
                </div>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-sign-in"></i></span>
                    <input name="new-username" class="form-control" type="text" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-at"></i></span>
                    <input name="new-email" class="form-control" type="email" placeholder="email@example.com" required>
                </div>
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-unlock"></i></span>
                    <input name="new-password" class="form-control" type="text" placeholder="Password" required>
                </div>
            </div>
        </form>
    </div>

    <!-- LOOPED USERS -->
    @foreach($users as $user)
        <form class="card m-2" action="/users/edit/{{ $user->id }}" method="POST">
            @csrf
            <div class="card-header font-weight-bold">
                <div class="row">
                    <div class="col">
                        <input name="edit-firstname" class="form-control" type="text" placeholder="Firstname" value="{{ $user->contact->firstname }}" required>
                        <input name="edit-lastname" type="text" class="form-control" placeholder="Lastname" value="{{ $user->contact->lastname }}" required>
                    </div>
                    <input type="submit" class="btn badge-pill btn-secondary m-2" value="Save"/>
                </div>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-sign-in"></i></span>
                    <input name="edit-username" class="form-control" type="text" placeholder="Username" value="{{ $user->username }}" required>
                </div>
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-at"></i></span>
                    <input name="edit-email" class="form-control" type="email" placeholder="email@example.com" value="{{ $user->contact->email }}">
                </div>
                <div class="input-group">
                    <span class="input-group-prepend"><i class="input-group-text fa fa-unlock"></i></span>
                    <input name="edit-password" class="form-control" type="text" placeholder="Reset the password...">
                </div>
                <div class="input-group">
                    <span class="input-group-prepend input-group-text">Scout Group</i></span>
                    <select name="edit-headscout_id" class="form-control">
                    <!-- LOOPED HEADSCOUTS -->
                        @if($user->hasAccess('headscout'))
                            <option value='' disabled selected>Leader</option>
                        @elseif($user->hasAccess('scout'))
                            <option value="" disabled selected>-</option>
                            @foreach($headscouts as $headscout)
                            <option value="{{ $headscout->id }}"
                            <?php if($user->headscout_id() == $headscout->id) { echo "selected"; } ?> >{{ $headscout->contact->firstname ." ". $headscout->contact->lastname }}</option>
                            @endforeach
                        @else
                            <option value="" disabled selected>-</option>
                        @endif
                    </select>
                </div>
                <div class='d-flex justify-content-center mt-3'>
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input name="edit-{{$role}}" class="form-check-input d-none" type="checkbox"
                                @if($user->hasAccess($role)) {{"checked"}} @endif
                            >
                            <label class="btn form-check-label badge
                                @if($user->hasAccess($role)) {{"badge-secondary"}} @endif
                            " for="admin{{ $user->id }}" onclick="toggleRole(this)">{{ucwords($role)}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    @endforeach

@endsection