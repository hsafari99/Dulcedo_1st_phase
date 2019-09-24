<?php use Illuminate\Support\Facades\Config as Config; ?>
@extends('layouts.main')

@section('title')
  Create New Application
@endsection

@section('content')
<label style="cursor: pointer;" for="loadContact" class="pl-4">
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

{{-- FORM REGISTRING THE APPLICATION (MAIN FORM) --}}
<form action="/registerApplication" enctype="multipart/form-data" method="POST">
  @csrf
  {{-- ============================================================================ --}}
  {{-- FIELD FOR PERSONAL INFORMATION (could be populated by previous form) --}}
  <fieldset class="border border-dark rounded p-3 my-3 shadow" id="badApplications">
    <legend class="w-50 pl-2"><i class="fas fa-address-card text-info" style="font-size: 25px;"></i>  Personal Information</legend>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
      </div>
      <input type="text" class="form-control" name="fName" id="fName">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
      </div>
      <input type="text" class="form-control" name="lName" id="lName">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Email:</span>
      </div>
      <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Phone:</span>
      </div>
      <input type="text" name="phone" list="phoneList" class="form-control" placeholder="Please select a number from list or add new phone number"/>
        <datalist id="phoneList"></datalist>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Adress:</span>
      </div>
      <input type="text" name="address" id="address" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">City:</span>
      </div>
      <input type="text" name="city" id="city" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Postal Code:</span>
      </div>
      <input type="text" name="postal" id="postal" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Country:</span>
      </div>
      <select name="country" id="country" class="form-control"></select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Birth Date:</span>
      </div>
      <input type="date" name="dob" id="dob" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">SIN no.:</span>
      </div>
      <input type="text" name="sin" id="sin" class="form-control"/>
    </div>
  </fieldset>

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SCOUT INFO --}}
  <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fas fa-address-book text-success" style="font-size: 25px;"></i>  Scout Information</legend>
    <label style="cursor: pointer;" for="ifScouted" class="pl-4">
      <input type="checkbox" class="form-check-input" id="ifScouted">
      <span class="font-weight-bold text-success">
        Talent <u>NOT</u> Scouted:
      </span>
    </label>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Office:</span>
      </div>
      <select class="form-control scoutedBy" name="office" id="office" onChange="officeChanged(this)">
        <option selected disabled>Please select the scout office</option>
        <option value="Montreal office">Montreal Office</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Scouted By:</span>
      </div>
      <select class="form-control scoutedBy" name="scouted" id="scouted">
        <option selected disabled>Please select the scout...</option>
      </select>
    </div>
  </fieldset>

    {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SOURCE INFO --}}
  <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fab fa-hubspot text-danger" style="font-size: 25px;"></i>  Source Information</legend>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Source:</span>
      </div>
      <select class="form-control" name="source" id="source">
        <option selected disabled>Please select the source...</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Remarks:</span>
      </div>
      <textarea class="form-control" name="source_note" id="source_note"></textarea>
    </div>
  </fieldset>

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SCOUT INFO --}}
    <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fab fa-hubspot text-danger" style="font-size: 25px;"></i>  Source Information</legend>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Source:</span>
      </div>
      <select class="form-control" name="source" id="source">
        <option selected disabled>Please select the source...</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Remarks:</span>
      </div>
      <textarea class="form-control" name="source_note" id="source_note"></textarea>
    </div>
  </fieldset>
</form>

{{-- PART for setting the Scout Information --}}

<script>
var sources;
$('document').ready(function(){
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/getSources",
    method: 'POST',
    success: function(result){
      var test = JSON.parse(result);
      $.each(test, function(index, value){
        console.log(value);
        $('#source').append('<option value="'+value._id+'">'+value.en+'</option>');
      }); 
    }        
  });
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
    var firstName = $('input[name="firstName"]').val();
    var lastName = $('input[name="lastName"]').val();
    var email = $('input[name="email"]').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/test",
      method: 'POST',
      data:{
        fname: firstName,
        lname: lastName,
        email: email
      },
      success: function(result){
          var test = JSON.parse(result);

          $('#listContent').children().remove();
          if (test.length == 0) {
            $('#listContent').append("<span class='text-danger font-weight-bold'>No Contact Found with Given Criteria...</span>");
          }else{
            $.each(test, function (index, value) { 
              var t = value._id;
              $('#listContent').append("<button onClick='test(this)' class='border rounded bg-info my-2 p-2 results w-100' style='cursor:pointer;' "+
                                        "id='"+value._id+"'>Full Name: "+
                                        "<span class='font-weight-bold'>"+value.firstname+" "+value.lastname+"</span>"+
                                        "<br/>Email: <span class='font-weight-bold'>"+value.email+
                                        "</span></button>");
            });            
          }
          $('#contactResult').show();
      }        
    });
  });
});
function test(e){
  var id = e.id;
  var countries;
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/getCountries",
      method: 'POST',
      success: function(result){
        var test = JSON.parse(result);
        countries = test;
      }        
    });
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/populate",
      method: 'POST',
      data:{
        contact_id : id
      },
      success: function(result){
        $('#contactResult').hide();
        $('#searchContact').hide();
        $('#loadContact'). prop("checked", false);
        
        var test = JSON.parse(result);
        $("#fName").val(test.firstname);
        $("#lName").val(test.lastname);
        $("#email").val(test.email);
        $.each(test.phone, function(index, value){
          $('#phoneList').append("<option value='"+value+"' selected>"+value+"</option>");
        });
        $("#address").val(test.address);
        $("#city").val(test.city);
        $("#postal").val(test.postal);
        $.each(countries, function(index, value){
          if (value._id == test.country_id) {
            $('#country').append('<option value="'+value._id+'" selected>'+value.en+'</option>');
          }else{
            $('#country').append('<option value="'+value._id+'">'+value.en+'</option>');
          }
        });
        $("#dob").val(test.birthdate);
        $("#sin").val(test.sin);
      }        
    });
}

function officeChanged(e){
  $('#office option').each(function(){
    if($(this).is(':selected')){
      var office = $(this).val();

      $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/getCountries",
      method: 'POST',
      success: function(result){
        var test = JSON.parse(result);
        countries = test;
      }        
    });
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/getScoutList",
      method: 'POST',
      data:{
        office_id : office
      },
      success: function(result){
        var test = JSON.parse(result);
        $.each(test, function(index, value){
          $('#scouted').append('<option value="'+value._id+'">'+value.firstname+" "+value.lastname+'</option>');
        });
      }        
    });
    }
  });
}

$('document').ready(function(){
        $('.crossbtn').click(function(){
                $('#contactResult').fadeOut(1000);   
        });
});
$('document').ready(function(){
    $('#ifScouted').click(function(){
      if($('#ifScouted').prop("checked") == true){
        $(".scoutedBy").prop("disabled", true);
      }else{
        $(".scoutedBy").prop("disabled", false);
      }  
    });
});
</script>

{{--  The Modal for showing the contact Search results --}}
<div class="modal" id="contactResult">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">List of contacts match your search criteria</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;" id="listContent">
      </div>
    </div>
  </div>
</div>
@endsection