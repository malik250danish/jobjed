<style>
    .radioDiv{
        display: flex;

    }
    .saveBtn{
        width: 100% !important;
        outline: none !important;
        border: none !important;
    }
    .warningTxt{
        /* text-align: start !important;  */
        padding-left: 20px !important;
    }
    .selectimgBtn{
             background-color: #01BC8C;
             color: #fff;
    }
    .selectimgBtn:hover {
             background-color: #01BC8C;
             /* color: #fff !important; */
    }
</style>
@extends('layouts.default')



{{-- Page title --}}

@section('title')

    User Account

    @parent

@stop



{{-- page level styles --}}

@section('header_styles')



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/css/minimal/blue.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/user_account.css') }}">



@stop



{{-- Page content --}}

@section('content')

    <hr class="content-header-sep">

    <div class="container">

        <div class="welcome">

            <h3>My Account</h3>

        </div>

        <hr>

        {{-- <div class="row"> --}}

            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">

                    <!--main content-->

                    <div class="position-center">

                        <!-- Notifications -->

                        @include('notifications')



                        <div>

                            <h3 class="text-primary" id="title">Personal Information</h3>

                        </div>

                        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"

                              action="{{ url('my-account') }}" method="POST">

                            <input type="hidden" name="_method" value="PUT">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group {{ $errors->first('pic', 'has-error') }}">

                                <label class="col-md-2 control-label">Avatar:</label>

                                <div class="col-md-10">

                                    <div class="fileinput fileinput-new" data-provides="fileinput">

                                        <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">

                                            @if($user->pic)

                                                <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="img"

                                                     class="img-responsive"/>

                                            @else

                                                <img src="{!! url('images/ph.jpg') !!}" alt="..."

                                                     class="img-responsive"/>

                                            @endif

                                        </div>

                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>

                                        <div>

                                            <span class="btn selectimgBtn btn-file ">

                                                <span class="fileinput-new ">Select image</span>

                                                <span class="fileinput-exists">Change</span>

                                                <input type="file" name="pic" id="pic" />

                                            </span>

                                            <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</span>

                                        </div>

                                    </div>

                                    <span class="help-block">{{ $errors->first('pic', ':message') }}</span>

                                </div>

                            </div>

                              
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }}">

                                

                                        <div class="col-md-12">
                                            <label class=" control-label">
        
                                                First Name:
            
                                                <span class='require'>*</span>
            
                                            </label>
        
                                            <div class="input-group">
                                                
        
                                            <span class="input-group-addon">
        
                                      <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>
        
                                            </span>
        
                                                <input type="text" placeholder=" " name="first_name" id="u-name"
        
                                                       class="form-control" value="{!! old('first_name',$user->first_name) !!}">
        
                                            </div>
        
                                            <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
        
                                        </div>
        
        
        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">

                               

                                        <div class="col-md-12">
                                            <label class=" control-label">
        
                                                Last Name:
            
                                                <span class='require'>*</span>
            
                                            </label>
        
                                            <div class="input-group">
        
                                                    <span class="input-group-addon">
        
                                             <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>
        
                                                    </span>
        
                                                <input type="text" placeholder=" " name="last_name" id="u-name"
        
                                                       class="form-control"
        
                                                       value="{!! old('last_name',$user->last_name) !!}"></div>
        
                                            <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group {{ $errors->first('first_name', 'has-error') }}">

                                

                                <div class="col-lg-6">
                                    <label class=" control-label">

                                        First Name:
    
                                        <span class='require'>*</span>
    
                                    </label>

                                    <div class="input-group">
                                        

                                    <span class="input-group-addon">

                              <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>

                                    </span>

                                        <input type="text" placeholder=" " name="first_name" id="u-name"

                                               class="form-control" value="{!! old('first_name',$user->first_name) !!}">

                                    </div>

                                    <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>

                                </div>



                            </div> --}}



                            {{-- <div class="form-group {{ $errors->first('last_name', 'has-error') }}">

                               

                                <div class="col-lg-6">
                                    <label class=" control-label">

                                        Last Name:
    
                                        <span class='require'>*</span>
    
                                    </label>

                                    <div class="input-group">

                                            <span class="input-group-addon">

                                     <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>

                                            </span>

                                        <input type="text" placeholder=" " name="last_name" id="u-name"

                                               class="form-control"

                                               value="{!! old('last_name',$user->last_name) !!}"></div>

                                    <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>

                                </div>

                            </div> --}}



                            <div class="form-group {{ $errors->first('email', 'has-error') }}">

                             

                                <div class="col-md-12">
                                    <label class=" control-label">

                                        Email:
    
                                        <span class='require'>*</span>
    
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-addon">

                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>

                                        </span>

                                        <input type="text" placeholder=" " id="email" name="email" class="form-control"

                                               value="{!! old('email',$user->email) !!}"></div>

                                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                                </div>



                            </div>



                            <div class="form-group {{ $errors->first('password', 'has-error') }}">

                                <p class="text-warning warningTxt"><strong>If you don't want to change password... please leave them empty</strong></p>

                                

                                <div class="col-md-12">
                                    <label class=" control-label">

                                        Password:
    
                                        <span class='require'>*</span>
    
                                    </label>

                                    <div class="input-group">

                                            <span class="input-group-addon">

                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>

                                            </span>

                                        <input type="password" name="password" placeholder=" " id="pwd" class="form-control"></div>

                                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>

                                </div>

                            </div>



                            <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">


                                <div class="col-md-12">
                                    
                                <label class=" control-label">

                                    Confirm Password:

                                    <span class='require'>*</span>

                                </label>

                                    <div class="input-group">

                                            <span class="input-group-addon">

                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>

                                            </span>

                                        <input type="password" name="password_confirm" placeholder=" " id="cpwd" class="form-control"></div>

                                    <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>

                                </div>

                            </div>



                            <div class="form-group">

                                

                                <div class="col-lg-6">

                                    <label class="control-label">Gender: </label>
                                    <div class="radioDiv">
                                        <div class="radio">

                                            <label>
    
                                                <input type="radio" name="gender" value="male" @if($user->gender === "male") checked="checked" @endif />
    
                                                Male
    
                                            </label>
    
                                        </div>
    
                                        <div class="radio">
    
                                            <label>
    
                                                <input type="radio" name="gender" value="female" @if($user->gender === "female") checked="checked" @endif />
    
                                                Female
    
                                            </label>
    
                                        </div>

                                    </div>

                                   

                                    <!-- <div class="radio">

                                        <label>

                                            <input type="radio" name="gender" value="other" @if($user->gender === "other") checked="checked" @endif />

                                            Other

                                        </label>

                                    </div> -->

                                </div>

                            </div>


                            <div class="form-group">

                                <div class="col-lg-12 ">

                                    <button class="btn btn-primary saveBtn" type="submit">Save</button>

                                </div>

                            </div>



                        </form>{{--{!!  Form::close()  !!}--}}

                    </div>

                </div>
                <div class="col-md-3"></div>

            </div>

        {{-- </div> --}}

    </div>

@stop



{{-- page level scripts --}}

@section('footer_scripts')



    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/frontend/user_account.js') }}"></script>



@stop

