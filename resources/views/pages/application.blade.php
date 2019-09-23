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
              $('#listContent').append("<button onClick='test()' class='border rounded bg-info my-2 p-2 results w-100' style='cursor:pointer;' "+
                                        "id='"+value._id+"'>Full Name: "+
                                        "<span class='font-weight-bold'>"+value.firstname+" "+value.lastname+"</span>"+
                                        "<br/>Email: <span class='font-weight-bold'>"+value.email+
                                        "</span></button onClick='test()'>");
            });            
          }
          $('#contactResult').show();
      }        
    });
  });
});
function test(){
  console.log($(this).attr('id'));
}

$('document').ready(function(){
        $('.crossbtn').click(function(){
                $('#contactResult').fadeOut(1000);   
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