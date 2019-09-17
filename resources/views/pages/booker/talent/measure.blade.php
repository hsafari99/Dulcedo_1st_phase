@extends('layouts.main')

@section('title')
    Photos and Measurements
@endsection

@section('content')
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

        //show the last part of the measurements appropriate to gender
        function changeGender() {
            var gender = $('#gender').val();
            if (gender === "m") {
                $('#male-m').show();
                $('#female-m').hide();
            } else {
                $('#male-m').hide();
                $('#female-m').show();
            }
        }

        //preview the uploaded photo
        function previewPhoto(caller, event) {
            var img = document.getElementById('img-'+caller.id);
            img.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <div class="card my-5 card-primary">
        <div class="my-1 mx-auto text-center h3">%applicant name%</div>
        <div class="my-1 mx-auto text-center h3">%date%</div>
    </div>

    <form class="text-center weight-font-bold">

        <!-- GENDER -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Gender</span></span>
            <select class="form-control" onchange="changeGender()" name="gender" id="gender">
                <option value="" selected disabled>Select</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
        </div>

        <!-- EYES -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Eyes</span></span>
            <select class="form-control" name="eye-shade" id="eye-shade">
                <option value="" selected disabled>Select Shade</option>
                <option value="">--</option>
                <option value="Dark">Dark</option>
                <option value="Clear">Clear</option>
                <option value="Greenish">Greenish</option>
                <option value="Grayish">Grayish</option>
                <option value="Yellowish">Yellowish</option>
            </select>
            <select class="form-control" name="eye-color" id="eye-color">
                <option value="" selected disabled>Select Color</option>
                <option value="Brown">Brown</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Gray">Gray</option>
            </select>
        </div>

        <!-- HAIR -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Hair</span></span>
            <select class="form-control" name="hair-shade" id="hair-shade">
                <option value="" selected disabled>Select Shade</option>
                <option value="">--</option>
                <option value="Dark">Dark</option>
                <option value="Pale">Pale</option>
                <option value="Sandy">Sandy</option>
                <option value="Brownish">Brownish</option>
                <option value="Gold">Gold</option>
                <option value="Grayish">Grayish</option>
            </select>
            <select class="form-control" name="eye-color" id="eye-color">
                <option value="" selected disabled>Select Color</option>
                <option value="Brown">Brown</option>
                <option value="Blonde">Blonde</option>
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="Gray">Gray</option>
                <option value="White">White</option>
            </select>
        </div>

        <div class="my-5"><hr></div>

        <!-- Height -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Height</span></span>
            <select class="form-control" name="height-feet" id="height-feet">
                <option value="" selected disabled>Select Feet</option>
                <option value="3">3 feet</option>
                <option value="4">4 feet</option>
                <option value="5">5 feet</option>
                <option value="6">6 feet</option>
                <option value="7">7 feet</option>
            </select>
            <select class="form-control" name="height-inches" id="height-inches">
                <option value="" selected disabled>Select Inches</option>
                <option value="0">0 inch</option>
                <option value="1">1 inch</option>
                <option value="2">2 inches</option>
                <option value="3">3 inches</option>
                <option value="4">4 inches</option>
                <option value="5">5 inches</option>
                <option value="6">6 inches</option>
                <option value="7">7 inches</option>
                <option value="8">8 inches</option>
                <option value="9">9 inches</option>
                <option value="10">10 inches</option>
                <option value="11">11 inches</option>
            </select>
        </div>

        <!-- Shoe -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Shoe</span></span>
            <input type="text" class="form-control" placeholder="Write Size" name="shoe" id="shoe">
        </div>

        <!-- Waist -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Waist</span></span>
            <input type="number" class="form-control" step="0.5" name="waist" id="waist" placeholder="In Inches">
        </div>

        <!-- Inseam -->
        <div class="input-group m-2">
            <span class='input-group-prepend'><span class='input-group-text'>Inseam</span></span>
            <input type="number" class="form-control" step="0.5" name="inseam" id="inseam" placeholder="In Inches">
        </div>

        <div class="my-5"><hr></div>

        <!-- MALE PART -->
        <div id="male-m" class='collapse'>

            <!-- Neck -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Neck</span></span>
                <input type="number" class="form-control" step="0.5" name="neck" id="neck" placeholder="In Inches">
            </div>

            <!-- Jacket -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Jacket</span></span>
                <input type="number" class="form-control" step="0.5" name="jacket" id="jacket" placeholder="In Inches">
            </div>

            <!-- Sleeve -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Sleeve</span></span>
                <input type="number" class="form-control" step="0.5" name="sleeve" id="sleeve" placeholder="In Inches">
            </div>

            <div class="my-5"><hr></div>

        </div>

        <!-- FEMALE PART -->
        <div id="female-m" class="collapse">

            <!-- Bust -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Bust</span></span>
                <input type="number" step='1' class="bust-cm" id='bust-cm' placeholder="   In Centimeters">
                <select class="form-control" name="bust-cup" id="bust-cup">
                    <option value="" selected disabled>Select Cup Size</option>
                    <option value="AA">AA</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="DD">DD</option>
                    <option value="DDD">DDD</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                </select>
            </div>

            <!-- Dress -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Dress</span></span>
                <select class="form-control" name="dress" id="dress">
                    <option value="" selected disabled>Select Size</option>
                    @for($i = 0; $i <= 18; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Hips -->
            <div class="input-group m-2">
                <span class='input-group-prepend'><span class='input-group-text'>Hips</span></span>
                <input type="number" class="form-control" step="0.5" name="hips" id="hips" placeholder="In Inches">
            </div>

            <div class="my-5"><hr></div>

        </div>

        <!-- Photos -->
        <div class="my-2">
            <img id='img-faceshot' class="img-fluid" src="/photo/default/faceshot.jpg" alt="faceshot">
            <input id="faceshot" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="faceshot" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Face Shot</label>
        </div>

        <div class="my-2">
            <img id='img-profile' class="img-fluid" src="/photo/default/profile.jpg" alt="profile">
            <input id="profile" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="profile" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Profile</label>
        </div>

        <div class="my-2">
            <img id='img-waistup' class="img-fluid" src="/photo/default/waistup.jpg" alt="waistup">
            <input id="waistup" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="waistup" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Waist Up</label>
        </div>

        <div class="my-2">
            <img id='img-headtotoes' class="img-fluid" src="/photo/default/headtotoes.jpg" alt="headtotoes">
            <input id="headtotoes" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="headtotoes" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Head To Toes</label>
        </div>

        <!-- EXTRA PHOTOS -->
        <div id="wrapperExtra1" class="my-2 collapse">
            <img id='img-extra1' class="img-fluid" src="/photo/default/extra.jpg">
            <input id="extra1" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="extra1" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
        </div>

        <div id="wrapperExtra2" class="my-2 collapse">
            <img id='img-extra2' class="img-fluid" src="/photo/default/extra.jpg">
            <input id="extra2" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="extra2" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
        </div>

        <div id="wrapperExtra3" class="my-2 collapse">
            <img id='img-extra3' class="img-fluid" src="/photo/default/extra.jpg">
            <input id="extra3" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="extra3" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
        </div>

        <div id="wrapperExtra4" class="my-2 collapse">
            <img id='img-extra4' class="img-fluid" src="/photo/default/extra.jpg">
            <input id="extra4" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none">
            <label for="extra4" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
        </div>
        <!-- END EXTRA PHOTOS -->

        <div onclick="addExtraPhoto(this)" class='btn btn-block btn-secondary my-2'><i class='fa fa-plus mx-2'></i>Add Extra Photo<i class='fa fa-plus mx-2'></i></div>

        <input type="submit" class="btn btn-block btn-dark my-5" value="Submit">

    </form>
@endsection