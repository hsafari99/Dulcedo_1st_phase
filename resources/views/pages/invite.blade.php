<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Dulcedo Management</title>

    <!-- Favicon -->
    <link href="/favicon.png" rel="icon" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
body {
    background-image: url('/img/dulcedo-invite-background.gif');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
</style>
<script>
    //declare slide names array
    var slides = [
        "welcome",
        "info",
        "social",
        "about",
        "submit",
    ]
    //get slide length
    var len = slides.length;
    //remember the current slide
    var s = 0;
    //remember underage
    var underage = false;
    //

    //change pill color
    function changePillColor(pill, color) {
        _color = "badge-"+color+" badge-pill m-1";
        _pill = "#pill-"+pill;
        $(_pill).attr('class', _color);
    }

    //move to the previous slide
    function previous() {
        //prevent double clicks
        $('#next').hide();
        $('#previous').hide();
        //move slide
        changePillColor(slides[s], "secondary");
        changePillColor(slides[--s], "primary");
        $('#invite').carousel('prev');
        $('#invite').on('slid.bs.carousel', function() {
            $('#previous').show();
            if (s === 0) $("#previous").hide();
            $('#next').show();
        });
    }

    //move to the next slide
    function next() {
        //validation
        if(true) {
            //prevent double clicks
            $('#next').hide();
            $('#previous').hide();
            //move slide
            changePillColor(slides[s], "secondary");
            changePillColor(slides[++s], "primary");
            $('#invite').carousel('next');
            $('#invite').on('slid.bs.carousel', function() {
                $('#next').show();
                if (s === len-1) $('#next').hide();
                $('#previous').show();
            });
        }
    }

    //change YES to NO and vice versa
    function toggleLegalCanada() {
        if($('#legalcanada').is(":checked")) {
            $('#legal-yes-no').text('@lang('invite.form.yes')');
            $('#legal-yes-no').attr('class', 'text-success');
        } else {
            $('#legal-yes-no').text('@lang('invite.form.no')');
            $('#legal-yes-no').attr('class', 'text-danger');
        }
    }

    //calculate age of a person from birthdate
    function getAge(birthdate) {
        var date = birthdate;
        var day = new Date(date);
        age = ~~ ((Date.now() - day) / (31557600000));
        return age;
    }

    //verify the age
    function verifyAge() {
        var date = new Date($('#birthdate').val());
        var age = getAge(date);

        if(age < 18) {
            $('#g-card').attr('class', 'expand card m-2');
            underage = true;
        } else {
            $('#g-card').attr('class', 'collapse card m-2');
            underage = false;
        }
    }

    //reveal the discovery details section
    function revealDiscoveryMore() {
        $('#discovery-more').attr('class', 'expand form-control m-2');
    }

</script>
<body>
    <div style="max-width:600px" class="container">
        <!-- MENU -->
        <div class="d-flex flex-wrap justify-content-center my-2">
            <div id="pill-@lang('invite.welcome.id')" class="badge-primary badge-pill m-1">@lang('invite.welcome.pill')</div>
            <div id="pill-@lang('invite.info.id')" class="badge-secondary badge-pill m-1">@lang('invite.info.pill')</div>
            <div id="pill-@lang('invite.social.id')" class="badge-secondary badge-pill m-1">@lang('invite.social.pill')</div>
            <div id="pill-@lang('invite.about.id')" class="badge-secondary badge-pill m-1">@lang('invite.about.pill')</div>
            <div id="pill-@lang('invite.submit.id')" class="badge-secondary badge-pill m-1">@lang('invite.submit.pill')</div>
        </div>
        <!-- END MENU -->

        <!-- FORM AND BUTTONS WRAPPER -->
        <div class="justify-content-center">

        <!-- ERROR AND VALIDATION MESSAGES -->
        <div id="error" class="d-none alert alert-danger text-center font-weight-bold"></div>
        <div id="success" class="d-none alert alert-succes text-center font-weight-bold"></div>

            <!-- APPLICATION FORM CAROUSEL -->
            <div id="invite" class="carousel slide" data-interval="false" data-keyboard="false">
                <div class="carousel-inner">

                    <!-- WELCOME CARD -->
                    <div id="welcome" class="carousel-item active">
                        <div class="card my-2">
                            <img class="card-img-top" src="/img/dulcedo-black-logo.jpg" alt="dulcedo">
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">@lang('invite.welcome.title')</h5>
                                <p class="card-text font-weight-bold">@lang('invite.welcome.text')</p>
                            </div>
                        </div>
                    </div>
                    <!-- END WELCOME CARD -->

                    <!-- INFO CARD -->
                    <div id="info" class="carousel-item">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">@lang('invite.info.title')</h5>
                                <p class="card-text">
                                    <input name="firstname" type="text" class="form-control m-2" placeholder="@lang('invite.form.firstname')" required>
                                    <input name="lastname" type="text" class="form-control m-2" placeholder="@lang('invite.form.lastname')" required>
                                    <input name="phone1" type="text" class="form-control m-2" placeholder="@lang('invite.form.phone1')" required>
                                    <input name="phone2" type="text" class="form-control m-2" placeholder="@lang('invite.form.phone2')">
                                    <input name="email" type="email" class="form-control m-2" placeholder="@lang('invite.form.email')" required>
                                    <input name="address" type="text" class="form-control m-2" placeholder="@lang('invite.form.address')" required>
                                    <input name="city" type="text" class="form-control m-2" placeholder="@lang('invite.form.city')" required>
                                    <input name="postal" type="text" class="form-control m-2" placeholder="@lang('invite.form.postal')" required>
                                    <select id="countries" name="country" class="form-control m-2">
                                        @include('assets.options.countries')
                                    </select>
                                    <hr>
                                    <div onclick="toggleLegalCanada()" class="form-check m-4 text-center">
                                        <input class="form-check-input" type="checkbox" id="legalcanada">
                                        <label class="form-check-label" for="legalcanada">@lang('invite.form.legalcanada') : <span id="legal-yes-no" class="text-danger">@lang('invite.form.no')</span></label>
                                    </div>
                                    <hr>
                                    <div class="input-group m-2">
                                        <span class="input-group-prepend"><span class="input-group-text">@lang('invite.form.birthdate')</span></span>
                                        <input onchange="verifyAge()" id='birthdate' name="birthdate" type="date" class="form-control">
                                    </div>
                                    <div id='g-card' class="collapse card m-2">
                                        <div class="card-header text-danger">@lang('invite.under18')</div>
                                        <div class="card-body">
                                            <input name="g-firstname" type="text" class="form-control m-2" placeholder="@lang('invite.form.firstname')">
                                            <input name="g-lastname" type="text" class="form-control m-2" placeholder="@lang('invite.form.lastname')">
                                            <input name="g-relation" type="text" class="form-control m-2" placeholder="@lang('invite.form.guardian-relation')">
                                            <input name="g-phone1" type="text" class="form-control m-2" placeholder="@lang('invite.form.phone1')">
                                            <input name="g-phone2" type="text" class="form-control m-2" placeholder="@lang('invite.form.phone2')">
                                            <input name="g-email" type="email" class="form-control m-2" placeholder="@lang('invite.form.email')">
                                            <input name="g-address" type="text" class="form-control m-2" placeholder="@lang('invite.form.address')">
                                            <input name="g-city" type="text" class="form-control m-2" placeholder="@lang('invite.form.city')">
                                            <input name="g-postal" type="text" class="form-control m-2" placeholder="@lang('invite.form.postal')">
                                            <select id="countries" name="g-country" class="form-control m-2">
                                               @include('assets.options.countries')
                                            </select>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END INFO CARD -->

                    <!-- SOCIAL CARD -->
                    <div id="social" class="carousel-item">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">@lang('invite.social.title')</h5>
                                <p class="card-text">
                                    <input class="form-control m-2" type="text" id="facebook" name="facebook" placeholder="Facebook">
                                    <input class="form-control m-2" type="text" id="instagram" name="instagram" placeholder="Instagram">
                                    <input class="form-control m-2" type="text" id="twitter" name="twitter" placeholder="Twitter">
                                    <hr>
                                    <select onchange="revealDiscoveryMore()" id="discovery" name="discovery" class="form-control m-2">
                                        <option value="" selected disabled>@lang('invite.form.discovery')</option>
                                        @foreach($discoveries as $discovery)
                                            <option value="{{ $discovery->id }}">{{ $discovery->$lang }}</option>
                                        @endforeach
                                    </select>
                                    <input id="discovery-more" name="discovery-details" class='collapse form-control m-2' placeholder="@lang('invite.form.discovery-more')">
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END SOCIAL CARD -->

                    <!-- ABOUT YOU CARD -->
                    <div id="about" class="carousel-item">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">@lang('invite.about.title')</h5>
                                <p class="card-text">
                                 <span class="font-weight-bold">@lang('invite.about.leaveblank')</span>
                                 <hr>
                                @foreach($questions as $question)
                                    <textarea name="q-{{ $question->id }}" type="text" class="form-control m-2" placeholder="{{ $question->$lang }}"></textarea>
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END ABOUT YOU CARD -->

                    <!-- SUBMIT CARD -->
                    <div id="submit" class="carousel-item">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">@lang('invite.submit.title')</h5>
                                <p class="card-text">
                                    Lorem ipsum sin amet.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END SUBMIT CARD -->

                </div>
            </div>
            <!-- FORM END -->

            <!-- PREVIOUS / NEXT BUTTONS -->
            <div class="row">
                <div class="col text-center">
                    <div id="previous" style="width:100px ; display:none" onclick="previous()" class="btn btn-primary my-4">@lang('invite.buttons.previous')</div>
                </div>
                <div class="col text-center">
                    <div id="next" style="width:100px" onclick="next()" class="btn btn-primary my-4">@lang('invite.buttons.next')</div>
                </div>
            </div>

            </div>
            <!-- END PREVIOUS / NEXT BUTTONS -->

        </div>
        <!-- END FORM AND BUTTON WRAPPER -->
    </div>
</body>
</html>