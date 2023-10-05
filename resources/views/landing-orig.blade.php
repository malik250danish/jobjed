<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Home | {{ env('APP_NAME') }}
        </title>
        <!--global css starts-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
        <style>
            body {
             background-image: url("{{ asset('assets/images/k2.png') }}");
             background-color: #cccccc;
             background-size: cover;
             padding-top: 60px;
            }
            h1{
                font-size: 50px;
                font-weight: 600;
            }
            .box{
                text-align: left;
                width: 300px;
                float: right;
                /*border-top: 5px solid #fff;*/
            }
            .box-left{
                float: left;
            }
            .mt{
                margin-top: 50px;
            }
            .text-black{
                color: #000;
            }
            /*.btn-primary {
                background-color: #0b4455 !important;
            }
            .text-primary {
                color: #0b4455 !important;
            }*/
            a:link, a:link, a:visited, a:hover, a:active {
                color: #0b4455;
                text-decoration: none;
            }
            @media (max-width: 576px) {
                .box-left{
                    float: right;
                }
            }

            @media (max-width: 768px) { 
                .box-left{
                    float: right;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">

            @include('notifications')
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo_position">
                </div>
                <div class="col-md-9">
                    <h1 class="text-white text-center">Domestic Labour Recuirtment Services</h1>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-white text-center">Domestic Labour Recuirtment Services</h1>
                </div>
            </div> -->

            <div class="row mt">

                <div class="col-md-6">
                    
                    <div class="box animation flipInX box-left">

                        <div class="box1">

                            <h3 class="text-primary">Register</h3>

                            <div class="form-group">

                                <label class="text-center text-black">You can register as</label>

                            </div>

                            <div class="form-group">

                                <a href="{{ url('register/employer') }}">

                                    <button class="btn btn-block btn-primary">Employer</button>

                                </a>

                            </div>

                            <div class="form-group">

                                <a href="{{ url('upload/cv') }}">

                                    <button class="btn btn-block btn-primary">Worker Upload CV</button>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="box animation flipInX">

                        <div class="box1">

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

                        

                    </div>

                </div>

            </div>
        </div>
    </body>
    
    <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
</html>
