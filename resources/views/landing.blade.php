<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Home | JobJed
        </title>
        <!--global css starts-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
        <style>
            body {
             /*background-image: url("{{ asset('assets/images/k2.png') }}");*/
             background: lightblue;
             padding-top: 60px;
            }
            .box1{
                background: #128bc652;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo_position">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-white text-center">Domestic Labour Recuirtment Services</h1>
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-4 col-sm-12 col-md-offset-4 box1">
                    @include('notifications')
                    <!-- Tabbable-Panel Start -->
                    <div class="tabbable-panel">
                        <!-- Tabbablw-line Start -->
                        <div class="tabbable-line">
                            <!-- Nav Nav-tabs Start -->
                            <ul class="nav nav-tabs ">
                                <li class="active" style="width: 50%;text-align: center;">
                                    <a href="#login" data-toggle="tab">Login</a>
                                </li>
                                <li style="width: 50%;text-align: center;">
                                    <a href="#register" data-toggle="tab">Register</a>
                                </li>
                            </ul>
                            <!-- //Nav Nav-tabs End -->
                            <!-- Tab-content Start -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="login">
                                    <h3 class="text-primary">Log In</h3>

                                    <form action="{{ route('login.custom') }}" method="POST">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group {{ $errors->first('email', 'has-error') }}">

                                            <label class="sr-only">Email</label>

                                            <input type="email" class="form-control" name="email" placeholder="Email"

                                                   value="{!! old('email') !!}">

                                        </div>

                                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                                        <div class="form-group {{ $errors->first('password', 'has-error') }}">

                                            <label class="sr-only">Password</label>

                                            <input type="password" class="form-control" name="password" placeholder="Password">

                                        </div>

                                        <span class="help-block">{{ $errors->first('password', ':message') }}</span>

                                        <!-- <div class="checkbox">

                                            <label>

                                                <input type="checkbox"> Remember Password

                                            </label>



                                        </div> -->

                                        <input type="submit" class="btn btn-block btn-primary" value="Log In">

                                    </form>

                                    <a href="{{ url('forgot-password') }}" class="text-center">Forgot Password?</a>
                                </div>
                                <div class="tab-pane" id="register">
                                    <h3 class="text-primary">Register</h3>
                                    <form action="{{ url('custom-registration/employer') }}" method="POST" id="reg_form">

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

                                        <div class="checkbox" style="margin-left:20px">

                                            <label>

                                                <input type="checkbox" name="subscribed" >  I accept <a href="#"> Terms and Conditions</a>

                                            </label>

                                        </div>

                                        <button type="submit" id="my-btn" class="btn btn-block btn-primary">Sign Up</button>

                                    </form>
                                </div>
                            </div>
                            <!-- Tab-content End -->
                        </div>
                        <!-- //Tabbablw-line End -->
                    </div>
                    <!-- Tabbable_panel End -->
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div> -->
            <div class="row">
                <div class="col-md-12 text-center" style="margin-top: 5px;">
                    <a href="{{ url('guest') }}">Visit as Guest</a>
                </div>
            </div>
        </div>
    </body>
    
    <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
</html>
