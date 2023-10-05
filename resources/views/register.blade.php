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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css"/>

    <style>
        .intl-tel-input ,.allow-dropdown{
            width: 100%;
        }
        .w-100{
            width: 100%;
        }
    </style>

    <!--end of page level css-->

</head>

<body>

<div class="container">

    <!--Content Section Start -->

    <div class="row">

        <div class="box animation flipInX">

            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-responsive mar">

            <h3 class="text-primary">Register as {{ $role }}</h3>

            <a href="{{ url('/') }}">

                <h5 class="text-primary">Go Home</h5>

            </a>
            <!-- Notifications -->

            @include('notifications')

            <form action="{{ url('custom-registration/'.$role) }}" method="POST" id="reg_form">

                <!-- CSRF Token -->

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />



                <div class="form-group {{ $errors->first('first_name', 'has-error') }}">

                    <label class="sr-only"> First Name</label>

                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"

                           value="{!! old('first_name') !!}" >

                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('last_name', 'has-error') }}">

                    <label class="sr-only"> Last Name</label>

                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"

                           value="{!! old('last_name') !!}" >

                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('email', 'has-error') }}">

                    <label class="sr-only"> Email</label>

                    <input type="email" class="form-control" id="Email" required name="email" placeholder="Email"

                           value="{!! old('Email') !!}" >

                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('city', 'has-error') }}">

                    <label class="sr-only"> City</label>

                    <input type="text" class="form-control" id="city" name="city" required placeholder="City"

                           value="{!! old('city') !!}" >

                    {!! $errors->first('city', '<span class="help-block">:message</span>') !!}

                </div>

                @if($role == 'employer')

                    <!-- <div class="form-group {{ $errors->first('nid', 'has-error') }}">

                        <label class="sr-only"> NID</label>

                        <input type="number" class="form-control" required id="nid" name="nid" placeholder="National ID Number"

                               value="{!! old('nid') !!}" >

                        {!! $errors->first('nid', '<span class="help-block">:message</span>') !!}

                    </div>

                    <div class="form-group {{ $errors->first('passport', 'has-error') }}">

                        <label class="sr-only"> Passport Number</label>

                        <input type="number" class="form-control" required id="passport" name="passport" placeholder="Passport ID Number" value="{!! old('passport') !!}" >

                        {!! $errors->first('passport', '<span class="help-block">:message</span>') !!}

                    </div>-->
                @endif

                <div class="form-group {{ $errors->first('phone', 'has-error') }}">

                    <label class="sr-only"> Phone</label>

                    <input type="hidden" id = "countryCode" name="countryCode" value="">
                    <input id="phone" type="tel" class="form-control" required id="phone" name="phone" placeholder="Mobile Number"

                           value="{!! old('phone') !!}" >

                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('password', 'has-error') }}">

                    <label class="sr-only"> Password</label>

                    <input type="password" class="form-control" id="Password1" name="password" placeholder="Password">

                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">

                    <label class="sr-only"> Confirm Password</label>

                    <input type="password" class="form-control" id="Password2" name="password_confirm"

                           placeholder="Confirm Password">

                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->first('gender', 'has-error') }}">

                    <label class="sr-only">Gender</label>

                    <label class="radio-inline">

                        <input type="radio" name="gender" id="inlineRadio1" value="male"> Male

                    </label>

                    <label class="radio-inline">

                        <input type="radio" name="gender" id="inlineRadio2" value="female"> Female

                    </label>

                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="checkbox">

                    <label>

                        <input type="checkbox" name="subscribed" >  I accept <a href="#"> Terms and Conditions</a>

                    </label>

                </div>

                <button type="submit" id="my-btn" class="btn btn-block btn-primary">Sign Up</button>

                Already have an account? Please <a href="{{ route('login') }}"> Log In</a>

            </form>

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

<script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>

<script>
    $("#phone").intlTelInput({
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
          });
        },
        /*preferredCountries: ['PK', 'AU'],*/
        // onlyCountries: ["pk", "au", "us"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
    });
    var form = document.getElementById("my_form");

    document.getElementById("my-btn").addEventListener("click", function () {
        jQuery('#countryCode').val(jQuery('.country-list .active').attr('data-dial-code'));
        form.submit();
    });
    $('.intl-tel-input').addClass('w-100');


</script>

<!--global js end-->

</body>

</html>

