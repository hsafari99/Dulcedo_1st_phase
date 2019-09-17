@extends('layouts.main')

@section('title')
	Search for Applications
@endsection

@section('content')
<div class="container">
    <form action="/search" method="POST">
        @csrf
        {{--  <div class="p-2 bg-info shadow row mt-3">
            <div class="col">
                <span class="font-weight-bold">Total number of applications: </span>
                <span class=" font-weight-bold text-danger">{{ $results }}</span>
            </div>
            <div class="col text-right">
                <span class="font-weight-bold">Total number of Results: </span>
                <span class=" font-weight-bold text-danger">{{ 0 }}</span>
            </div>
        </div>  --}}

        {{--  Search by Talent criterias  --}}
        <fieldset class="border border-dark rounded p-3 shadow" name="talent">
            <legend class="w-25 pl-3">By Talent</legend>
            {{--  Search By First Name  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
				</div>
				<input type="text" class="form-control" name="firstName">
            </div>
            {{--  Search By Last Name  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
				</div>
				<input type="text" class="form-control" name="lastName">
            </div>
            {{--  Search By Email  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">Email:</span>
				</div>
				<input type="text" class="form-control" name="email">
            </div>
            {{--  Search By Phone  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">Phone:</span>
				</div>
				<input type="text" class="form-control" name="phone">
            </div>
            {{--  Search By City  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">City:</span>
				</div>
				<input type="text" class="form-control" name="city">
            </div>
            {{--  Search By Country  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">Country:</span>
				</div>
				<input type="text" class="form-control" name="country">
            </div>
            {{--  Search By Age  --}}
            <div class="input-group mb-2">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">Age From:</span>
				</div>
				<input type="number" class="form-control" name="ageFrom">
                <div class="input-group-prepend">
					<span class="input-group-text d-block">To:</span>
				</div>
				<input type="number" class="form-control" name="ageTo">
            </div>
            <div class="input-group">
				<input type="submit" class="btn btn-danger w-100" value="Search">
			</div>
        </fieldset>
    </form>
        {{--  Search by application status criterias  --}}
        <fieldset class="border border-dark rounded p-3 mt-5 shadow" name="status">
            <legend  class="w-50 pl-3">By Application Status</legend>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
				</div>
				<input type="text" class="form-control" name="statusTest">
            </div>
        </fieldset>

        {{--  Search by event criterias  --}}
        <fieldset class="border border-dark rounded p-3 mt-5 shadow" name="event">
            <legend  class="w-25 pl-3">By Event</legend>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
				</div>
				<input type="text" class="form-control" name="eventTest">
            </div>
        </fieldset>
    
</div>


@endsection