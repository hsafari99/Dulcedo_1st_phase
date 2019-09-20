@extends('layouts.main')

@section('title')
  Create New Application
@endsection

@section('content')
<label style="cursor: pointer;" for="loadContact">
  <input type="checkbox" class="form-check-input" id="loadContact">
    <span class="font-weight-bold text-danger">
      Not a New applicant? Please click here to load the information
    </span>
</label>

{{-- FORM FOR LOADING THE ALREADY APPLIED CONTACT --}}
<div id="searchContact">
    <fieldset class="border border-dark rounded p-3 my-3 shadow">
    <legend class="w-50 pl-2 pl-5">Search Contact</legend>
    <div class="input-group pt-2">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
      </div>
      <input type="text" class="form-control" name="firstName">
    </div>
    <div class="input-group pt-2">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
      </div>
      <input type="text" class="form-control" name="lastName">
    </div>
    <div class="input-group pt-2">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Email:</span>
      </div>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="input-group pt-2">
      <button class="btn btn-info w-100" id="search">Search</button>
    </div>
    </fieldset>
</div>


<form action="/registerApplication" enctype="multipart/form-data" method="POST">
  @csrf
  <fieldset class="border border-dark rounded p-3 my-3 shadow" id="badApplications">
  <legend class="w-50 pl-2"><i class="fas fa-address-card text-info" style="font-size: 25px;"></i>  Personal Information</legend>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
    </div>
    <input type="text" class="form-control" name="firstName" value=" {{ old('firstName') }}">
  </div>
    <div  class="mb-3 pl-3"><span class='text-danger'>{{ $errors->first('firstName') }}</span></div>
  </fieldset>
</form>


<script>
$('document').ready(function(){
  $("#searchContact").hide();
  $('#loadContact').change(function(){
      if (this.checked) {
        $("#searchContact").fadeIn(500);
      }else{
        $("#searchContact").fadeOut(500);
      }
  });
  $("#search").click(function(e){
    e.preventDefault();
    var firstName = ($('input[name="firstName"]').val() === null || $('input[name="firstName"]').val() === '')? 'NA' :  $('input[name="firstName"]').val();
    var lastName = ($('input[name="lastName"]').val() === null || $('input[name="lastName"]').val() === '')? 'NA' :  $('input[name="lastName"]').val();
    var email = ($('input[name="email"]').val() === null || $('input[name="email"]').val() === '')? 'NA' :  $('input[name="email"]').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/test",
      method: 'POST',
      success: function(result){
        console.log('come back successfully...');
      }        
    });
  });

});
</script>
@endsection