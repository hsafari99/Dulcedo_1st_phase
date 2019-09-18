{{--  php section for calculation of the number of the result  --}}
<?php $counter = 0; 
        foreach ($contactIDs as $contact):
                $counter += count($contact['appsInfo']);
        endforeach;     
?>


@extends('layouts.main')

@section('title')
        Search Results
@endsection

@section('content')
<div class="p-2 bg-info rounded shadow row mt-3">
        <div class="col">
        <span class="font-weight-bold">Total number of results: </span>
        <span class=" font-weight-bold text-danger">{{ $counter }} applications</span>
        <h5 class="pt-3">Please click on each applicant and event for having more information</h5>
        </div>
</div>
        @foreach ($contactIDs as $contact)
        @foreach ($contact['appsInfo'] as $pplication)
                <div class="container border border-dark rounded p-1 my-4 text-center shadow bg-light">
                        <h4 class="text-dark my-3 ">Application ID: {{ $pplication['applicationId'] }}</h4>
                        <table class="table table-striped table-bordered table-hover thead-dark table-responsive">
                                <tr>
                                        <th width='18%'>Applicant</th>
                                        <th width='18%'>Scout</th>
                                        <th width='18%'>Event</th>
                                        <th width='18%'>Status</th>
                                        <th width='28%'>Actions</th>
                                </tr>
                                <tr>
                                        <td width='18%' name='{{ $contact['id'] }}' class= 'applicant align-middle'>{{ $contact['firstname'] }} {{ $contact['lastname'] }}</td>
                                        <td width='18%' class= 'align-middle'>{{ $pplication['scoutedBy'] }}</td>
                                        <td width='18%' name='{{ $pplication['applicationId'] }}' class= 'event align-middle'>{{ $pplication['event_name'] }}</td>
                                        <td width='18%' class= 'align-middle'>{{ $pplication['applicationStatus'] }}</td>
                                        <td width='28%'  class= 'align-middle'>
                                        <button type="button" class="btn btn-warning m-1 px-3 editBtn" name="{{ $pplication['applicationId'] }}">Edit</button> 
                                        <button type="button" class="btn btn-danger m-1 px-2 deleteBtn" name="{{ $pplication['applicationId'] }}">Delete</button>
                                        </td>
                                </tr>
                        </table>
                </div>
        @endforeach
        @endforeach  
<a href="/home" class="btn btn-info mt-5"><i class="fas fa-home"></i>  <span class="font-weight-bold"> Back to home</span></a>
<script>
// =========================== >> APPLICANT SECTION (Talent/Contact) << =========================== 
// Retrieve the applicant information through the Ajax and populate the relevant modal
$('.applicant').click(function(e){
    var applicant =  $(e.target).attr('name');

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/applicant",
        method: 'POST',
        data: {
           contact_id: applicant     
        } , 
        success: function(result){
                var test = JSON.parse(result);
                $('#modalfname').text(test.firstname);
                $('#modallname').text(test.lastname);
                $('#modalemail').text(test.email);
                //$('#modalphone').text(test.phone);
                $('#modaladdress').text(test.address);
                $('#modalcity').text(test.city);
                $('#modalpcode').text(test.postal);
                $('#modalcountry').text(test.country);
                $('#modalbirthdate').text(test.birthdate);
                $('#modalsin').text(test.sin);
                $.each(test.phone, function(index, value){
                    $('#modalphone').append("<li>"+value+"</li>");    
                });
                $.each(test.notes, function(index, value){
                    $('#modalnotes').append("<li>"+value+"</li>");    
                });
                $('#myModal').show();
        }  
    });
});

// ======================================= >> Event SECTION << ======================================= 
// Retrieve the event information through the Ajax and populate the relevant modal
$('.event').click(function(e){
    var event =  $(e.target).attr('name');

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/event",
        method: 'POST',
        data: {
           application_id: event     
        } , 
        success: function(result){
                var test = JSON.parse(result);
                $('#ModalEventName').text(test.name);  
                $('#ModalEventDesc').text(test.description);
                $('#ModalEventCrAt').text(test.creation_date);
                $('#ModalEventlstUpAt').text(test.last_update);

                $('#eventModal').show();

        }  
    });
});


// ======================================= >> Application SECTION << ======================================= 
// Retrieve the application information through the Ajax and populate the relevant modal and enable the user
//  to edit the contents.
$('.editBtn').click(function(e){
    var application =  $(e.target).attr('name');

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/application",
        method: 'POST',
        data: {
           application_id: application     
        } , 
        success: function(result){
                var test = JSON.parse(result);
                $('#scoutedBy').val(test.scout_id);  
                // $('#ModalEventDesc').text(test.description);
                // $('#ModalEventCrAt').text(test.creation_date);
                // $('#ModalEventlstUpAt').text(test.last_update);

                $('#appModal').show();

        }  
    });    

});

$('document').ready(function(){
        $('.crossbtn').click(function(){
                $('#myModal').fadeOut(3000);
                $('#eventModal').fadeOut(3000);   
        });

        $('.closebtn').click(function(){
                $('#myModal').hide(3000); 
                $('#eventModal').hide(3000);   
        });  
});
</script>

{{--  <!-- The Modal for showing the application information and let the user modify it. -->  --}}
<div class="modal" id="appModal">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Editing the application information</h5>
        <button type="button" class="close notEdit" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <form>
           <div class="input-group mb-3">
               <div class="input-group-prepend">
                   <span class="input-group-text">Scouted By:</span>
               </div>
               <input type="text" class="form-control" value="test" id="scoutedBy" disabled>
           </div>     
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

{{--  =========================================>> Modals <<=========================================  --}}
{{--  <!-- The Modal for showing the application (talent) information-->  --}}
<div class="modal" id="myModal">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Applicant Information</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="font-weight-bold pl-2">First Name: <span id='modalfname' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Last Name: <span id='modallname' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Email: <span id='modalemail' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Phone Numbers: <ul id='modalphone' class="font-weight-normal"></ul></div>
        <div class="font-weight-bold pl-2">Address: <span id='modaladdress' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">City: <span id='modalcity' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Postal Code: <span id='modalpcode' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Country: <span id='modalcountry' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Date Of Birth: <span id='modalbirthdate' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">SIN No.: <span id='modalsin' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Notes: <ul id='modalnotes' class="font-weight-normal"></ul></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-danger closebtn" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

{{--  <!-- The Modal for showing the event information-->  --}}
<div class="modal" id="eventModal">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Event Information</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="font-weight-bold pl-2">Event Name: <span id='ModalEventName' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Description: <p id='ModalEventDesc' class="font-weight-normal d-inline"></p></div>
        <div class="font-weight-bold pl-2">Date of Creation: <span id='ModalEventCrAt' class="font-weight-normal"></span></div>
        <div class="font-weight-bold pl-2">Last Update: <span id='ModalEventlstUpAt' class="font-weight-normal"></span></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-danger closebtn" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endSection