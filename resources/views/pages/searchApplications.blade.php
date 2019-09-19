@extends('layouts.main')

@section('title')
	Search for Applications
@endsection

@section('content')
{{-- Return error if no option selected for application statu --}}
@if($errors->any())
   <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first()}}</strong>
   </div>
@endif

<div class="container">
   <form action="/search" method="POST">
        @csrf
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
   <form  action="/searchStatus" method="POST">
      @csrf
      <fieldset class="border border-dark rounded p-3 mt-5 shadow" name="status">
         <legend  class="w-50 pl-3">By Application Status</legend>
         <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text d-block new_talent_subscription_form">Status:</span>
            </div>
            <select name="status" id="statusList" class="form-control">
               <option value="NA" disabled selected>Please select the application Status</option>
            </select>
         {{-- <input type="text" name="statusTest"> --}}
         </div>
         <div class="input-group mt-2">
            <input type="submit" class="btn btn-warning w-100" value="Search">
         </div>
      </fieldset>
   </form>

   {{--  Search by event criterias  --}}
   <form action="/searchEvent" method="POST">
      @csrf
      <fieldset class="border border-dark rounded p-3 mt-5 shadow" name="event">
         <legend  class="w-25 pl-3">By Event</legend>
         <div class="input-group">
         <div class="input-group-prepend">
            <span class="input-group-text d-block new_talent_subscription_form">Event Name:</span>
         </div>
         <input type="text" class="form-control" name="eventName">
         </div>
         <div class="input-group mt-2">
            <input type="submit" class="btn btn-info w-100" value="Search">
         </div>
      </fieldset>
   </form> 
</div>


<script>
$('document').ready(function(){
   $.ajax({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/getStatusList",
      method: 'POST',
      success: function(result){
         var test = JSON.parse(result);
         //console.log(test);
         $.each(test, function(index, value){
            $('#statusList').append("<option value='"+index+"'>"+value+"</option>");    
         });
      }  
    });
});
</script>

@endsection
