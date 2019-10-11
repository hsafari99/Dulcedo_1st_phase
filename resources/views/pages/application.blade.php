<?php use Illuminate\Support\Facades\Config as Config; ?>
@extends('layouts.main')

@section('title')
  Create New Application
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div id="AppRegister"></div>
{{-- showing the errors in the alert --}}

{{-- <label for="loadContact" class="pl-4 showPointer">
  <input type="checkbox" class="form-check-input" id="loadContact" onchange="loadContactSearch()">
    <span class="font-weight-bold text-danger">
      Not a New applicant? Please click here to load the information
    </span>
</label> --}}
{{-- <label style="cursor: pointer;" for="loadGuardian" class="pl-4">
  <input type="checkbox" class="form-check-input" id="loadGuardian" onchange="loadGuardianSearch()">
    <span class="font-weight-bold text-info">
      Not a New Guardian? Please click here to load the information
    </span>
</label> --}}
{{-- FORM FOR LOADING THE ALREADY APPLIED CONTACT --}}
{{-- <div id="searchContact" hidden>
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
      <span class="btn btn-info w-100" onclick="showContacts()">Search</span>
    </div>
    </fieldset>
</div> --}}

{{-- FORM REGISTRING THE APPLICATION (MAIN FORM) --}}
{{-- <form action="/registerApplication" enctype="multipart/form-data" method="POST">
@csrf
</form> --}}
  {{-- ============================================================================ --}}
  {{-- FIELD FOR APPLICANT PERSONAL INFORMATION (could be populated by previous form) --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="Applicant">
    <legend class="w-50 pl-2"><i class="fas fa-address-card text-info" style="font-size: 25px;"></i>  Personal Information</legend>
    <input type="text" hidden name='id' id="id" value=''>
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
      <select name="country" id="country" class="form-control countries">
        <option disabled selected>Select a country from the list</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Birth Date:</span>
      </div>
      <input type="date" name="dob" id="dob" class="form-control"/>
    </div>
  </fieldset> --}}

    {{-- ============================================================================ --}}
  {{-- FIELD FOR GUARDIAN PERSONAL INFORMATION (could be populated by previous form) --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="Guardian">
    <legend class="w-50 pl-2"><i class="fas fa-address-card text-info" style="font-size: 25px;"></i>  Guardian Information</legend>
    <input type="text" hidden name='gid' id="gid" class="form-control">
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form" data-toggle="tooltip" title="Guardian- Applicant Family Relationship"><i class="fas fa-info-circle text-dark"></i>&nbsp Relation:</span>
      </div>
      <select name="guardian_relation" id="guardian_relation" class="form-control">
        <option value='' disabled selected>Please select one of the below options</option>
        <option value='father'>Father</option>
        <option value='mother'>Mother</option>
        <option value='legal_guardian'>Legal Guardian</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
      </div>
      <input type="text" class="form-control" name="gfName" id="gfName">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
      </div>
      <input type="text" class="form-control" name="glName" id="glName">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Email:</span>
      </div>
      <input type="text" class="form-control" name="gemail" id="gemail">
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Phone:</span>
      </div>
      <input type="text" name="gphone" list="phoneList" class="form-control" placeholder="Please select a number from list or add new phone number"/>
        <datalist id="gphoneList"></datalist>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Adress:</span>
      </div>
      <input type="text" name="gaddress" id="gaddress" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">City:</span>
      </div>
      <input type="text" name="gcity" id="gcity" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Postal Code:</span>
      </div>
      <input type="text" name="gpostal" id="gpostal" class="form-control"/>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Country:</span>
      </div>
      <select name="gcountry" id="gcountry" class="form-control countries">
        <option disabled selected>Select a country from the list</option>
      </select>
    </div>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Birth Date:</span>
      </div>
      <input type="date" name="gdob" id="gdob" class="form-control"/>
    </div>
  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SCOUT INFO --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fas fa-address-book text-success" style="font-size: 25px;"></i>  Scout Information</legend>
    <label style="cursor: pointer;" for="ifScouted" class="pl-4">
      <input type="checkbox" class="form-check-input" id="ifScouted" onchange="isScouted()">
      <span class="font-weight-bold text-success">
        Talent <u>NOT</u> Scouted:
      </span>
    </label>
    <div class="input-group my-1 scoutedBy">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Office:</span>
      </div>
      <select class="form-control" name="office" id="office" onChange="officeChanged(this)">
        <option selected disabled>Please select the scout office</option>
        <option value="Montreal office">Montreal Office</option>
      </select>
    </div>
    <div class="input-group my-1 scoutedBy">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Scouted By:</span>
      </div>
      <select class="form-control" name="scouted" id="scouted">
        <option selected disabled>Please select the scout...</option>
      </select>
    </div>
  </fieldset> --}}

    {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SOURCE INFO --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
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
  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE EVENT INFO --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fas fa-calendar-alt text-danger" style="font-size: 25px;"></i>  Event Information</legend>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Event ID:</span>
      </div>
      <input type="text" name="event" id="event" class="form-control" placeholder="Please search the event by name to find the ID...">
    </div>
    <div class="input-group my-1">
      <span class="btn btn-info w-100" onclick="eventSearchs()"><i class="fas fa-search text-danger" style="font-size: 20px;"></i>  Find Event</span>
    </div>
    <div class="input-group my-1">
      <label style="cursor: pointer;" for="loadContact" class="pl-4">
        <input type="checkbox" class="form-check-input" id="chkbox" onchange="activate()">
        <span class="font-weight-bold text-secondary">
          Search Again
        </span>
      </label>
    </div>
  </fieldset> --}}

    {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE PHYSICAL and SHAPE INFO --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
    <legend class="w-50 pl-2"><i class="fas fa-id-card-alt text-info" style="font-size: 25px;"></i>  Physical Information</legend>
    
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Office:</span>
      </div>
      <select class="form-control scoutedBy" name="app_office">
        <option selected disabled>Please select the office creating the application</option>
        <option value="Montreal office">Montreal Office</option>
      </select>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Gender:</span>
      </div>
      <div class="form-control row m-0">
        <label style="cursor: pointer;" for="male" class="col d-inline">
          <input type="radio" class="form-check-input" id="male" name="gender" value="m">
            <span class="font-weight-bold text-secondary">
              Male
            </span>
        </label>
        <label style="cursor: pointer;" for="female" class="col d-inline">
          <input type="radio" class="form-check-input" id="female" name="gender" value="f">
            <span class="font-weight-bold text-secondary">
              Female
            </span>
        </label>
        <label style="cursor: pointer;" for="other" class="col d-inline">
          <input type="radio" class="form-check-input" id="other" name="gender" value="NA">
            <span class="font-weight-bold text-secondary">
              Other
            </span>
        </label>
      </div>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Eye Color:</span>
      </div>
      <input type="text" name="eye_color" class="form-control" list="eye_colors" placeholder="Please select the eye color from the list or add your own...">
      <datalist id="eye_colors">
        <option value="Blue">
        <option value="Brown">
        <option value="Black">
        <option value="Green">
        <option value="Hazel ">
        <option value="Gray ">
        <option value="Amber ">
      </datalist>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Hair Color:</span>
      </div>
      <input type="text" name="hair_color" list="hair_colors" class="form-control" placeholder="Please search the hair color from the list or add your own...">
        <datalist id="hair_colors">
          <option value="Black">
          <option value="Brown">
          <option value="Blond">
          <option value="Red">
          <option value="White ">
          <option value="Gray ">
        </datalist>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend" onclick="convertLength()" style="cursor: pointer;">
        <span class="input-group-text d-block new_talent_subscription_form"><i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> Height:</span>
      </div>
      <select class="form-control" name="height_feet" id="height_feet">
        <option value="" selected disabled>Select Feet</option>
        <option value="3" id='3ft'>3 feet</option>
        <option value="4" id='4ft'>4 feet</option>
        <option value="5" id='5ft'>5 feet</option>
        <option value="6" id='6ft'>6 feet</option>
        <option value="7" id='7ft'>7 feet</option>
      </select>
      <select class="form-control" name="height_inches" id="height_inches">
        <option value="" selected disabled>Select Inches</option>
        <option value="0" id='004in'>0 inch</option>
        <option value="0.25" id='014in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/4 inch</option>
        <option value="0.5" id='024in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/2 inch</option>
        <option value="0.75" id='034in'>&nbsp;&nbsp;&nbsp;&nbsp; 3/4 inch</option>
        <option value="1" id='104in'>1 inch</option>
        <option value="1.25" id='114in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/4 inch</option>
        <option value="1.5" id='124in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/2 inch</option>
        <option value="1.75" id='134in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 3/4 inch</option>
        <option value="2" id='204in'>2 inches</option>
        <option value="2.25" id='214in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/4 inch</option>
        <option value="2.5" id='224in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/2 inch</option>
        <option value="2.75" id='234in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 3/4 inch</option>
        <option value="3" id='304in'>3 inches</option>
        <option value="3.25" id='314in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/4 inch</option>
        <option value="3.5" id='324in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/2 inch</option>
        <option value="3.75" id='334in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 3/4 inch</option>
        <option value="4" id='404in'>4 inches</option>
        <option value="4.25" id='414in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/4 inch</option>
        <option value="4.5" id='424in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/2 inch</option>
        <option value="4.75" id='434in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 3/4 inch</option>
        <option value="5" id='504in'>5 inches</option>
        <option value="5.25" id='514in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/4 inch</option>
        <option value="5.5" id='524in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/2 inch</option>
        <option value="5.75" id='534in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 3/4 inch</option>
        <option value="6" id='604in'>6 inches</option>
        <option value="6.25" id='614in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/4 inch</option>
        <option value="6.5" id='624in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/2 inch</option>
        <option value="6.75" id='634in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 3/4 inch</option>
        <option value="7" id='704in'>7 inches</option>
        <option value="7.25" id='714in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/4 inch</option>
        <option value="7.5" id='724in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/2 inch</option>
        <option value="7.75" id='734in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 3/4 inch</option>
        <option value="8" id='804in'>8 inches</option>
        <option value="8.25" id='814in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/4 inch</option>
        <option value="8.5" id='824in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/2 inch</option>
        <option value="8.75" id='834in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 3/4 inch</option>
        <option value="9" id='904in'>9 inches</option>
        <option value="9.25" id='914in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/4 inch</option>
        <option value="9.5" id='924in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/2 inch</option>
        <option value="9.75" id='934in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 3/4 inch</option>
        <option value="10" id='1004in'>10 inches</option>
        <option value="10.25" id='1014in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/4 inch</option>
        <option value="10.5" id='1024in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/2 inch</option>
        <option value="10.75" id='1034in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 3/4 inch</option>
        <option value="11" id='1104in'>11 inches</option>
        <option value="11.25" id='1114in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/4 inch</option>
        <option value="11.5" id='1124in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/2 inch</option>
        <option value="11.75" id='1134in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 3/4 inch</option>
      </select>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('waist')">
        <span class="input-group-text d-block new_talent_subscription_form"><i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> Waist:</span>
      </div>
      <input type="number" name="waist" class="form-control" placeholder="Please enter the size in inches" value='30'>
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('bust')">
        <span class="input-group-text d-block new_talent_subscription_form">
          <i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> 
          Bust:</span>
      </div>
      <input type="number" name="bust" class="form-control" placeholder="Please enter the size in inches">
    </div> 

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('hips')">
        <span class="input-group-text d-block new_talent_subscription_form">
          <i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> 
          Hips:
        </span>
      </div>
      <input type="number" name="hips" class="form-control" placeholder="Please enter the size in inches">
    </div> 

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('neck')">
        <span class="input-group-text d-block new_talent_subscription_form">
          <i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> 
          Neck:
        </span>
      </div>
      <input type="number" name="neck" class="form-control" placeholder="Please enter the size in inches">
    </div> 

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('sleeve')">
        <span class="input-group-text d-block new_talent_subscription_form">
          <i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> 
          Sleeve:
        </span>
      </div>
      <input type="number" name="sleeve" class="form-control" placeholder="Please enter the size in inches">
    </div> 

    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Dress:</span>
      </div>
      <input type="number" name="dress" class="form-control"placeholder="Please enter the Canadian base sizes...">
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Shoe:</span>
      </div>
      <input type="number" name="shoe" class="form-control" step="0.5" placeholder="Please enter the Canadian sizes...">
    </div>

    <div class="input-group my-1">
      <div class="input-group-prepend" style="cursor: pointer;" onclick="cmToInches('inseam')">
        <span class="input-group-text d-block new_talent_subscription_form">
          <i class="fas fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i> 
          Inseam:
        </span>
      </div>
      <input type="number" name="inseam" class="form-control" placeholder="Please enter the size in inches">
    </div> 

  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE SOCIAL MEDIAS APPLICANT IS ACTIVE ON --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow">
    <legend class="w-50 pl-2"><i class="fas fa-thumbs-up text-success" style="font-size: 25px;"></i>  Social Medias</legend>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Networks:</span>
      </div>
      <span class="form-control btn btn-warning" style="cursor:pointer;" onclick="addNetwork()"><i class="far fa-plus-square text-danger" style="font-size:25px;"></i></span>
    </div>
    <div class="input-group my-1 text-center">
      <table class="table table-striped table-bordered table-hover" id="network">
        <tr class="table-info">
          <th>Name</th>
          <th>username</th>
          <th>Action</th>  
        </tr>
      </table>
    </div>
  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE APPLICANT ANSWERS TO CERTAIN QUESTIONS --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow">
    <legend class="w-50 pl-2"><i class="fas fa-question-circle text-dark" style="font-size: 25px;"></i>  Questions & Answers</legend>
    <div class="d-flex flex-row justify-content-between w-100">
      <div class=" my-auto">
        <span class="bg-warning p-2">
          Question 
          <span class="font-weight-bold text-danger" id="currentCounter">
          </span> 
          of 
          <span class="font-weight-bold text-danger pr-2" id="totalCounter">
          </span>
        </span>
      </div>
      <div class=" my-auto">
        <span class="bg-info p-2">
          Language: 
          <input type="radio" name="language" value="english" onchange="changeLanguage(this)" checked>English
          <input type="radio" name="language" value="french" onchange="changeLanguage(this)">French
        </span>
      </div>
      <div>
        <span class="btn btn-dark" style="cursor:pointer;" onclick="goToEnd()"><i class="fas fa-fast-forward text-light" style="font-size:20px;"></i>&nbsp End</span>
      </div>
    </div>
    <div class="input-group mb-1 mt-2">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Questions:</span>
      </div>
      <span class="form-control btn btn-info" style="cursor:pointer;" onclick="addQuestion()"><i class="fas fa-hand-point-down text-dark" style="font-size:25px;"></i>Show Next Question</span>
    </div>
    <div class="input-group my-1" id="questionsBoard"></div>
  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- FIELD FOR SETTING THE APPLICANT CITIZENSHIPS --}}
  {{-- <fieldset class="border border-dark rounded p-3 my-3 shadow">
    <legend class="w-50 pl-2"><i class="fas fa-globe-americas text-success" style="font-size: 25px;"></i>&nbsp &nbsp  Citizenships</legend>
    <label> Please select max. 3 countries you have citizenship or work permit</label>
    <div class="input-group my-1">
      <div class="input-group-prepend">
        <span class="input-group-text d-block new_talent_subscription_form">Citizenships:</span>
      </div>
      <select name="country1" class="form-control countries">
        <option disabled selected>Country 1</option>
      </select>
      <select name="country2" class="form-control countries">
        <option disabled selected>Country 2</option>
      </select>
      <select name="country3" class="form-control countries">
        <option disabled selected>Country 3</option>
      </select>
    </div>
  </fieldset> --}}

  {{-- ============================================================================ --}}
  {{-- SECTION FOR PUTTING ANY COMMENT --}}
  {{-- <div class="input-group my-1">
      <div class="input-group-prepend align-middle">
        <span class="input-group-text d-block new_talent_subscription_form">Remarks:</span>
      </div>
      <textarea type="text" name="notes"class="form-control"></textarea>
  </div> --}}

  {{-- <div class="input-group my-1">
    <input type="submit" value="APPLICATION SUBMIT" class="btn btn-success w-100">
  </div>
</form>

{{-- PART for setting the Scout Information --}}
<script src="js/app.js"></script>
<script>
var countries;
var sources;
var networkCounter = 0;
var role;
var questions;
var questionCounter = 0;
var language = 'english';


$('document').ready(function(){
  {{-- getCountries();
  getSources();
  closeModal();
  getQuestions();
  $('#chkbox').on('change', activate());
  $('.eventClicked').on('click', addEvent(this)); --}}
});

function showresult(){
  var test = $("input[name='waist']").val();
  console.log("value: "+ test);
}
//This function will populate all the countries in select 
function populateCountries(countries){
  $.each(countries, function(index, value){
     $('.countries').append('<option value="'+value._id+'">'+value.en+'</option>');
  });
}

//This function will just the page to the selected fieldset
function goToEnd(){
  $('select[name="country1"]').focus();
}

//This function will set the language of questions
function changeLanguage(e){
  language = $(e).val();
}

// This function will add another question in the question div until reaches end
function addQuestion(){
  var index = questionCounter;
  ++questionCounter;
  if(index < questions.length){
    $('#currentCounter').text(questionCounter);
    if(language == "english"){
      var question = questions[index].en;
      var message = "Please enter your repsonse here...";
    }else{
      var question = questions[index].fr;
      var message = "Veuillez entrer votre réponse ici ...";
    }
    $('#questionsBoard').prepend('<div class="py-2 w-100">'+
                                  '<span class="font-weight-bold font-italic badge badge-dark">Question:</span>'+
                                  '<label>&nbsp &nbsp &nbsp'+question+'</label>'+
                                  '<textarea name="'+questions[index]._id+'" class="w-100 px-2" rows="5" placeholder="'+message+'"></textarea>'+
                                '</div>');
  }
}

//This function will get the list of the countries through AJAX
function getCountries(){
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/getCountries",
      method: 'POST',
      success: function(result){
        var test = JSON.parse(result);
        countries = test;
        populateCountries(countries);
      }        
  });
}

//This function will get all questions from the DAtabase Through the AJAX and save it in ann array
function getQuestions(){
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/getQuestions",
    method: 'POST',
    success: function(result){
      var test = JSON.parse(result);
      questions = test;
      $('#totalCounter').text(questions.length);
      $('#currentCounter').text(questionCounter);
    }        
  });
}

//This function is for closing the modals
function closeModal(){
  $('.crossbtn').click(function(){
    $('.modal').fadeOut(1000);
  });
}

//This function will load the resources through AJAX
function getSources(){
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/getSources",
    method: 'POST',
    success: function(result){
      var test = JSON.parse(result);
      $.each(test, function(index, value){
        $('#source').append('<option value="'+value._id+'">'+value.en+'</option>');
      }); 
    }        
  });
}

//This function will return the contacts matches the given criteria through AJAX
function showContacts(){
  //e.preventDefault();
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
}

//This function will set contact search for populating the guardian
function loadGuardianSearch(){
  if ($('#loadGuardian').prop("checked") == true) {
    $('#loadContact').attr("disabled", true);
    $("#searchContact").attr("hidden",false);
    role = 'guardian';
  }else{
    $('#loadContact').attr("disabled", false);
    $("#searchContact").attr("hidden",true);
    role = 'nothing';
  }
}

//This function will show / hide the contact search
function loadContactSearch(){
  if ($('#loadContact').prop("checked") == true) {
      $('#loadGuardian').attr("disabled", true);
      $("#searchContact").attr("hidden",false);
      role = 'applicant';
    }else{
      $('#loadGuardian').attr("disabled", false);
      $("#searchContact").attr("hidden",true);
      role = 'nothing';
    }
}

//This function will populate the contact/guardian form based on the selected contact in modal and through the AJAX
function test(e){
  var id = e.id;
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
        $("#searchContact").attr("hidden",true);
        $('#loadContact'). prop("checked", false);
        $('#loadGuardian').prop("checked", false);
        $('#loadGuardian').attr("disabled", false);
        $('#loadContact').attr("disabled", false);

        var test = JSON.parse(result);
        // for populating the applicant form
        if(role == 'applicant'){
          $("#id").val(test._id);
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
          //for populating the Gurdian form
        }else{
          $("#gid").val(test._id);
          $("#gfName").val(test.firstname);
          $("#glName").val(test.lastname);
          $("#gemail").val(test.email);
          $.each(test.phone, function(index, value){
            $('#gphoneList').append("<option value='"+value+"' selected>"+value+"</option>");
          });
          $("#gaddress").val(test.address);
          $("#gcity").val(test.city);
          $("#gpostal").val(test.postal);
          $.each(countries, function(index, value){
            if (value._id == test.country_id) {
              $('#gcountry').append('<option value="'+value._id+'" selected>'+value.en+'</option>');
            }else{
              $('#gcountry').append('<option value="'+value._id+'">'+value.en+'</option>');
            }
          });
          $("#gdob").val(test.birthdate);
          $("#gsin").val(test.sin);
        }
        console.log(test._id);
      }        
    });
}

//This function will populate the list of the Scouters based on the selected office. We have only montreal office in the list now.
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

//This event will search the events based on the given criteria and show the search results in the Modal through AJAX
function eventSearchs(){
    $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/getEvents",
    method: 'POST',
    data:{
      event: $('#event').val()
    },
    success: function(result){
      var test = JSON.parse(result);
        $('#events').children().remove();
        if (test.length == 0) {
          $('#events').append("<span class='text-danger font-weight-bold'>No event matches with Given Criteria...</span>");
        }else{
          $.each(test, function (index, value) {
            $('#events').append("<button onClick='addEvent(this)' class='border rounded bg-info my-2 p-2 results w-100' style='cursor:pointer;' "+
                                "id='"+value._id+"'>Event Name: "+
                                "<span class='font-weight-bold text-warning'>"+value.name+"</span>"+
                                "<br/>Description: <span class='font-weight-bold text-warning'>"+value.description+
                                "</span></button>");
          });            
        }
        $('#eventSearch').show();
    }        
  });
}

//This function will add the eventId to the form through the selected event in the modal and by AJAX
function addEvent(e){
  {{-- console.log(e.target); --}}
  $('#event').val(e.id);
  $('#event').prop("disabled", false);
  $('#eventSearch').hide();
}

//This function is for searching again the event. It will remove the previous event and activate the event search 
function activate(){
  $('#event').prop("disabled", true);
  $('#event').val("");
  $('#chkbox').prop("checked", false);
}

//This funciton will show the height convert Modal
function convertLength(){
  $('#heightConverter').show();
}

//This function will convert the cm to ft and in and return the values in relevant height section in form (selecting the correct option)
function calculateFT(){
  var cm = $("input[name='number']").val();
  //30.48 is the cm to in convesion factor
  // 2.54 is cm to in conversion factor
  var ft = Math.floor(cm/30.48);
  var inch = Math.floor((cm - (ft * 30.48))/2.54);
  var remainder = Math.floor(((cm - ((ft * 30.48) + (inch * 2.54)))/2.54)*4);
  // console.log("feet: "+ft);
  // console.log("Inches: "+inch);
  // console.log("Remainder: "+remainder);
  $("#"+ft+"ft").prop("selected", true);
  $("#"+inch+""+remainder+"4in").prop("selected", true);
  $('#heightConverter').hide();
}

//This function will show the cm to in converter 
function cmToInches(test){
  $("input[name='cmNumber']").val(0);
  $('#cmToInches').show();
  $("input[name='cmNumber']").attr('id', test);
}

//This function will convert the cm to in and put the result in relevant part of the form called it. 
function convertcmToInches(){
  var cm = $("input[name='cmNumber']").val();
  // 2.54 is cm to in conversion factor
  var inch = (cm/2.54).toFixed(2);
  var name = $("input[name='cmNumber']").attr('id');
  $("input[name='"+name+"']").val(inch);
  $('#cmToInches').hide();
}

//This function will add a section for adding the network and username. It also allows user to remove the nwanted networks
function addNetwork(){
  $('#network').append('<tr>'+
                  '<td class="p-0"><input type="text" class="w-100 pt-2" name="network'+networkCounter+'"></td>'+
                  '<td class="p-0"><input type="text" class="w-100 pt-2" name="username'+networkCounter+'"></td>'+
                  '<td class="p-0"><span class="btn btn-danger w-100" onclick="removeMe(this)">Remove</span></td>'+
                '</tr>');
  networkCounter++;
}

//Thus function will remove the row that users wants to remove from networks section
function removeMe(e){
  $(e).parent().parent().remove();
}

//This function will hide/ show the scout office and scout name section in the form
function isScouted(){
    if($('#ifScouted').prop("checked") == true){
      $(".scoutedBy").attr("hidden", true);
    }else{
      $(".scoutedBy").attr("hidden", false);
    }  
}
</script>

{{--  The Modal for showing the cm to inches converter --}}
<div class="modal" id="cmToInches">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Cm To Inches converter</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="input-group my-1">
          <div class="input-group-prepend">
            <span class="input-group-text d-block new_talent_subscription_form">Length in Cm:</span>
          </div>
          <input type="number" name="cmNumber" class="form-control" placeholder="Please enter the length in centi meters..." onchange="convertcmToInches()">
        </div>
        <span class="btn btn-info w-100 my-2">Convert</span>
      </div>
    </div>
  </div>
</div>

{{--  The Modal for showing the height converter --}}
<div class="modal" id="heightConverter">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Height converter</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="input-group my-1">
          <div class="input-group-prepend">
            <span class="input-group-text d-block new_talent_subscription_form">Height in Cm:</span>
          </div>
          <input type="number" name="number" class="form-control" placeholder="Please enter the height in centi meters..." onchange="calculateFT()">
        </div>
        <span class="btn btn-info w-100 my-2">Convert</span>
      </div>
    </div>
  </div>
</div>

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

{{--  The Modal for showing the Event Search results --}}
<div class="modal" id="eventSearch">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">List of events match your search criteria</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;" id="events">
      </div>
    </div>
  </div>
</div>
@endsection