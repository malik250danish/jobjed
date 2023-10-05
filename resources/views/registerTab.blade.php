<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!--global css starts-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!--end of global css-->

    <!--page level css starts-->

    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />

    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">

    <style>
        .box{
            border-radius: 5px;
            border-top: none;
            padding: 50px 50px
        }
    </style>

    <!--end of page level css-->

</head>

<body>

<div class="container">

    <!--Content Section Start -->

    <div class="row">

        @include('notifications')

        <div class="coll-md-4">
            <a href="{{ url('register/worker') }}">
                <div class="box">

                    <h3 class="text-primary">Register as worker</h3>

                </div>
            </a>
        </div>
        <div class="coll-md-4">&nbsp;</div>
        <div class="coll-md-4">
            <a href="{{ url('register/employer') }}">
                <div class="box">

                    <h3 class="text-primary">Register as employer</h3>

                </div>
            </a>
        </div>

    </div>

    <!-- //Content Section End -->

</div>

<!--global js starts-->

<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/frontend/register_custom.js') }}"></script>

<!--global js end-->

</body>

</html>

