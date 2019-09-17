@extends('layouts.main')

@section('title')
	New Talent
@endsection

@section('content')
    {{-- <span>	{{  Auth()->user()->id }}</span> --}}

        <script>
        //remember extra photos
        var extras = 0;

        //add an input for an extra photo
        function addExtraPhoto(caller) {
            //show an extra input and increment extras
            if (extras < 4) {
                ++extras;
                $('#wrapperExtra'+extras).show();
            }
            //hide button when all extras are shown
            if (extras === 4) $(caller).hide();
        }

        //preview the uploaded photo
        function previewPhoto(caller, event) {
            var img = document.getElementById('img-'+caller.id);
            img.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
	<div class="container">
			<form action="/form_submit" enctype="multipart/form-data" method="POST">
				@csrf
                <div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
					</div>
					<input type="text" class="form-control" name="firstName" value=" {{ old('firstName') }}">
                </div>
                <div  class="mb-3 pl-3"><span class='text-danger'>{{ $errors->first('firstName') }}</span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
					</div>
					<input type="text" class="form-control" name="lastName" value=" {{ old('lastName') }}">
                </div>
                <div  class="mb-3 pl-3"><span class='text-danger'>{{ $errors->first('lastName') }}</span></div>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Height:</span>
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
                        <option value="0" id='0in'>0 inch</option>
                        <option value="1" id='1in'>1 inch</option>
                        <option value="2" id='2in'>2 inches</option>
                        <option value="3" id='3in'>3 inches</option>
                        <option value="4" id='4in'>4 inches</option>
                        <option value="5" id='5in'>5 inches</option>
                        <option value="6" id='6in'>6 inches</option>
                        <option value="7" id='7in'>7 inches</option>
                        <option value="8" id='8in'>8 inches</option>
                        <option value="9" id='9in'>9 inches</option>
                        <option value="10" id='10in'>10 inches</option>
                        <option value="11" id='11in'>11 inches</option>
                    </select>
                    <script>
                        document.getElementById('{{ old('height_feet') }}ft').selected = true;
                        document.getElementById('{{ old('height_inches') }}in').selected = true;
                    </script>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('height_feet') }} {{ $errors->first('height_inches') }} </span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Phone:</span>
					</div>
					<input type="text" class="form-control" name='phone' value=" {{ old('phone') }}">
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('phone') }}</span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Email:</span>
					</div>
					<input type="text" class="form-control" name='email' value=" {{ old('email') }}">
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('email') }}</span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text new_talent_subscription_form"><span class="w-100 text-center">Remark:</span></div>
					</div>
					<textarea class="form-control" rows="5" name='remark'>{{ old('remark') }}</textarea>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('remark') }}</span></div>

                <!-- Photos -->
                <div class="my-2">
                    <img id='img-faceshot' class="img-fluid" src="/photo/default/faceshot.jpg" alt="faceshot">
                    <input id="faceshot" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='faceshot'>
                    <label for="faceshot" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Face Shot</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('faceshot') }}</span></div>

                <div class="my-2 ">
                    <img id='img-profile' class="img-fluid" src="/photo/default/profile.jpg" alt="profile">
                    <input id="profile" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='profile'>
                    <label for="profile" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Profile</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('profile') }}</span></div>

                <div class="my-2">
                    <img id='img-waistup' class="img-fluid" src="/photo/default/waistup.jpg" alt="waistup">
                    <input id="waistup" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='waistup'>
                    <label for="waistup" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Waist Up</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('waistup') }}</span></div>

                <div class="my-2">
                    <img id='img-headtotoes' class="img-fluid" src="/photo/default/headtotoes.jpg" alt="headtotoes">
                    <input id="headtotoes" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='headtotoes'>
                    <label for="headtotoes" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Head To Toes</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('headtotoes') }}</span></div>

                <!-- EXTRA PHOTOS -->
                <div id="wrapperExtra1" class="my-2 collapse">
                    <img id='img-extra1' class="img-fluid" src="/photo/default/extra.jpg">
                    <input id="extra1" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra1'>
                    <label for="extra1" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra2" class="my-2 collapse">
                    <img id='img-extra2' class="img-fluid" src="/photo/default/extra.jpg">
                    <input id="extra2" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra2'>
                    <label for="extra2" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra3" class="my-2 collapse">
                    <img id='img-extra3' class="img-fluid" src="/photo/default/extra.jpg">
                    <input id="extra3" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra3'>
                    <label for="extra3" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra4" class="my-2 collapse">
                    <img id='img-extra4' class="img-fluid" src="/photo/default/extra.jpg">
                    <input id="extra4" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra4'>
                    <label for="extra4" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <!-- END EXTRA PHOTOS -->
                <div onclick="addExtraPhoto(this)" class='btn btn-block btn-secondary my-2'><i class='fa fa-plus mx-2'></i>Add Extra Photo<i class='fa fa-plus mx-2'></i></div>
				<div class="input-group">
					<input type="submit" class="btn btn-success col-sm-4 mr-auto my-1" value="submit">
					<input type="reset" class="btn btn-danger col-sm-4 ml-auto my-1" value="cancel">
				</div>
			</form>
	</div>
@endsection
