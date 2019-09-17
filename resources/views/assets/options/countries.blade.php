@php
    $countries = App\Models\Country::all();
@endphp

@foreach($countries as $country)
    <option value="{{ $country->id }}"
    <?php if($country->id == "CAN") echo "selected"; ?>
    >{{ $country->$lang }}</option>
@endforeach