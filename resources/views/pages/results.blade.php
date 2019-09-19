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
        <span class=" font-weight-bold text-danger" id="resultCounter">{{ $counter }}</span><span class=" font-weight-bold text-danger"> applications</span>
        <h5 class="pt-3">Please click on each applicant and event for having more information</h5>
        </div>
</div>
        @foreach ($contactIDs as $contact)
        @foreach ($contact['appsInfo'] as $pplication)
                <div class="container border border-dark rounded p-1 my-4 text-center shadow bg-light" id="{{ $pplication['applicationId'] }}">
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
          
          $('#scoutedBy').text(test.scout_id);  
          $('#votes').text(test.votes);
          $('#stepId').text(test.step_id);
          $('#source').text(test.source_id);
          $('#source_note').text(test.source_note);
          $('#eventID').text(test.event_id);
          $('#officeID').text(test.office_id);
          $('#gender').text(test.gender == 'f'? 'Female': 'Male');
          $('#eye_color').text(test.eye_color);
          $('#hair_color').text(test.hair_color);
          $('#height').text(test.height);
          $('#waist').text(test.waist);
          $('#bust').text(test.bust);
          $('#hips').text(test.hips);
          $('#neck').text(test.neck);
          $('#sleeve').text(test.sleeve);
          $('#dress').text(test.dress);
          $('#shoe').text(test.shoe);
          $('#inseam').text(test.inseam);
          $.each(test.networks, function(index, value){
            var fontAwsome;
              switch (value.toLowerCase()) {
                case 'youtube':
                  fontAwsome = '<i style="font-size: 25px;" class="fab fa-youtube-square text-danger"></i>';
                break;
                case 'tweeter':
                  fontAwsome = '<i style="font-size: 25px;" class="fab fa-twitter-square text-info"></i>';
                break;
                case 'instagram':
                  fontAwsome = '<i style="font-size: 25px;" class="fab fa-instagram text-danger"></i>';
                break;
                case 'linkedin':
                  fontAwsome = '<i style="font-size: 25px;" class="fab fa-linkedin text-info"></i>';
                break;
                case 'facebook':
                  fontAwsome = '<i style="font-size: 25px;" class="fab fa-facebook-square text-info"></i>';
                break;
                default:
                  fontAwsome = '<i style="font-size: 25px;" class="fas fa-question-circle text-danger"></i>';
                  break;
              }
              $('#networks').children('ul').append("<li>"+fontAwsome+" "+value+"</li>");    
          });
          $.each(test.answers, function(index, value){
            $('#answers').children('ul').append("<li>"+value+"</li>");    
          });
          $('#contact_id').text(test.contact_id);
          $('#guardian_id').text(test.guardian_id);
          $('#guardian_relation').text(test.guardian_relation);
          $.each(test.citizenships, function(index, value){
            $('#citizenships').children('ul').append("<li><i  style='font-size: 25px;' class='fas fa-flag text-warning'></i>"+" "+value+"</li>");    
          });
          $('#can_work_in').text(test.can_work_in);
          $('#note').text(test.note);
          $('#updated_at').text((test.updated_at).substring(0,10));
          $('#created_at').text((test.created_at).substring(0,10));
          $('#appModal').show();
        }  
    });    

});

// ======================================= >> Soft Delete SECTION << ======================================= 
// This part will soft delete the application
$('.deleteBtn').click(function(e, test=1){
    var target = e.target;
    var application =  $(e.target).attr('name');
    $('#confirmModal').show();
    $('#confirm').click(function (target){
      $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/deleteApplication",
          method: 'POST',
          data: {
             application_id: application     
          } , 
          success: function(result){
            if (result === "Deleted Successfully") {
              $('#resultCounter').text(parseInt($('#resultCounter').text()) - 1); 
              $('#confirmModal').hide();
              $('#'+application).hide(3000);
            }else{
              $('#confirmModal').hide();
              return;
            }
          }        
      });    
    });
});

$('document').ready(function(){
        $('.crossbtn').click(function(){
                $('#myModal').fadeOut(3000);
                $('#eventModal').fadeOut(3000);
                $('#appModal').fadeOut(3000); 
                $('#confirmModal').fadeOut(1000);    
        });

        $('.closebtn').click(function(){
                $('#myModal').hide(3000); 
                $('#eventModal').hide(3000); 
                $('#appModal').hide(3000);  
        });  
});
</script>

{{--  =========================================>> Modals <<=========================================  --}}
{{--  <!-- The Modal for showing the application information and let the user modify it. -->  --}}
<div class="modal" id="appModal">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Editing the application information</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="row">
          <div class="col font-weight-bold">Scout_id:</div>
          <div class="col" id="scoutedBy"></div>
        </div> {{--  Scout ID --}}
        <div class="row">
          <div class="col font-weight-bold">Votes:</div>
          <div class="col" id="votes"></div>
        </div> {{--  Votes --}}
        <div class="row">
          <div class="col font-weight-bold">Status:</div>
          <div class="col" id="stepId"></div>
        </div> {{--  Step --}}
        <div class="row">
          <div class="col font-weight-bold">Source:</div>
          <div class="col" id="source"></div>
        </div> {{-- Source --}}
        <div class="row">
          <div class="col font-weight-bold">Source Note:</div>
          <div class="col" id="source_note"></div>
        </div> {{--  Source Note --}}
        <div class="row">
          <div class="col font-weight-bold">Event:</div>
          <div class="col" id="eventID"></div>
        </div>{{--  Event name --}}
        <div class="row">
          <div class="col font-weight-bold">Office:</div>
          <div class="col" id="officeID"></div>
        </div>{{--  Office --}}
        <div class="row">
          <div class="col font-weight-bold">Gender:</div>
          <div class="col" id="gender"></div>
        </div>{{--  Gender --}}
        <div class="row">
          <div class="col font-weight-bold">Eye Color:</div>
          <div class="col" id="eye_color"></div>
        </div>{{--  eye_color --}}
        <div class="row">
          <div class="col font-weight-bold">Hair Color:</div>
          <div class="col" id="hair_color"></div>
        </div>{{--  hair_color --}}
        <div class="row">
          <div class="col font-weight-bold">Height:</div>
          <div class="col" id="height"></div>
        </div> {{--  height --}}       
        <div class="row">
          <div class="col font-weight-bold">Waist:</div>
          <div class="col" id="waist"></div>
        </div>{{--  waist --}}
        <div class="row">
          <div class="col font-weight-bold">Bust:</div>
          <div class="col" id="bust"></div>
        </div>{{--  bust --}}
        <div class="row">
          <div class="col font-weight-bold">Hips:</div>
          <div class="col" id="hips"></div>
        </div>{{--  hips --}}
        <div class="row">
          <div class="col font-weight-bold">Neck:</div>
          <div class="col" id="neck"></div>
        </div>{{--  neck --}}
        <div class="row">
          <div class="col font-weight-bold">Sleeve:</div>
          <div class="col" id="sleeve"></div>
        </div>{{--  sleeve --}}
        <div class="row">
          <div class="col font-weight-bold">Dress:</div>
          <div class="col" id="dress"></div>
        </div>{{--  dress --}}
        <div class="row">
          <div class="col font-weight-bold">Shoe:</div>
          <div class="col" id="shoe"></div>
        </div>{{--  shoe --}}
        <div class="row">
          <div class="col font-weight-bold">Inseam:</div>
          <div class="col" id="inseam"></div>
        </div>{{--  inseam --}}
        <div class="row">
          <div class="col font-weight-bold">Networks:</div>
          <div class="col" id="networks"><ul></ul></div>
        </div>{{--  networks --}}
        <div class="row">
          <div class="col font-weight-bold">Answers:</div>
          <div class="col" id="answers"><ul></ul></div>
        </div>{{--  answers --}}
        <div class="row">
          <div class="col font-weight-bold">Contact:</div>
          <div class="col" id="contact_id"></div>
        </div>{{--  contact_id --}}
        <div class="row">
          <div class="col font-weight-bold">Guardian:</div>
          <div class="col" id="guardian_id"></div>
        </div>{{--  guardian_id --}}
        <div class="row">
          <div class="col font-weight-bold">Guardian Relation:</div>
          <div class="col" id="guardian_relation"></div>
        </div>{{--  guardian_relation --}}
        <div class="row">
          <div class="col font-weight-bold">Citizenships:</div>
          <div class="col" id="citizenships"><ul></ul></div>
        </div>{{--  citizenships --}}
        <div class="row">
          <div class="col font-weight-bold">Work Permit:</div>
          <div class="col" id="can_work_in"></div>
        </div>{{--  can_work_in --}}
        <div class="row">
          <div class="col font-weight-bold">Remarks:</div>
          <div class="col" id="note"></div>
        </div>{{--  note --}}
        <div class="row">
          <div class="col font-weight-bold">Last Update:</div>
          <div class="col" id="updated_at"></div>
        </div>{{--  updated_at --}}
        <div class="row">
          <div class="col font-weight-bold">Created at:</div>
          <div class="col" id="created_at"></div>
        </div>{{--  created_at --}}
      </div>
      <!-- Modal footer -->
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-danger closebtn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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

{{-- The Modal for showing the delete confirmation --}}
<div class="modal" id="confirmModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h4 class="modal-title">Deleting...</h4>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <strong>you sure you want to delete this application?</strong></br> 
        Please click the <span><mark class="text-danger font-weight-bold">button</mark></span> for complete deleting the application or 
        click the <span><mark class="text-danger font-weight-bold">'X'</mark></span> at the top for cancelation the request. 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirm">Delete</button>
      </div>

    </div>
  </div>
</div>
@endSection