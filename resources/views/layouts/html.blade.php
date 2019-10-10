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

    {{--  Added CDN for Jquery  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    {{--  Added by Hossein for font Awsome  --}}
    {{--  script src="https://kit.fontawesome.com/875f58e45b.js"></script>  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">


    {{--  <!-- Added linkes by Hossein for implementing the REACT components in the applicaiton-->  --}}
    {{-- Need to be changed to production during the deployment process --}}
    <script src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

    {{--  <!-- Added linkes by Hossein for implementing the REACT components in the applicaiton (BABEL references)-->  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.js"></script>


</head>
<style>
body {
    background-image: url('/img/dulcedo-background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
hr {
    height: 2px;
	background-color: white;
}
h1, h2, h3, h4, h5 {
    color: white;
    font-weight: bolder;
    text-shadow: 1px 1px gray;
}
.btn-primary, .input-group-text, .card, .card-header, .card-body {
    background-color: white;
    border-color: #AB8D3F;
    color: #AB8D3F;
}
.btn-primary:hover, .btn-primary:active {
    background-color: #AB8D3F;
    border-color: white;
    color: white;
}
.text-primary, .btn-link {
    color: #AB8D3F;
}
.btn-secondary, .card-secondary {
    color: darkgrey;
    border-color: darkgrey;
    background-color: white;
}
.new_talent_subscription_form{
    width: 114px;
}
.showPointer{
    cursor: pointer;
}
.modal-dialog{
    overflow-y: initial !important;
}
.modal-body{
    max-height: 600px; 
    overflow-y: auto;
}
.awsomeFonts{
    font-size: 25px;
}
.awsomeButton{
    font-size: 20px;
}
.awsomeButton:hover{
    background-color: #CCC;
}

</style>
<body>
    <div id="app">
        @include('layouts.nav')
        @yield('layout')
    </div>

    <script>
        $(document).ready(function(){
            $('nav').next('div').fadeOut(5000);
        });
    </script>
</body>
</html>