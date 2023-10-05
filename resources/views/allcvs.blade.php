@extends('layouts/default')

{{-- Page title --}}
@section('title')
All Cv's
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/price.css') }}">
    <style>
        body{
            /*background:url('../assets/images/logo-gray1.png') no-repeat center fixed;*/
            background-size: 100%;
        }
        .pd-10{
            padding: 20px;
        }
        .border{
            border: 2px solid gray;
            border-radius: 5px;
        }
        .border-bottom{
            border-bottom: 2px solid gray;
        }
        .border-left{
            border-left: 2px solid gray;
        }
        .border-right{
            border-right: 2px solid gray;
        }
        .border-top{
            border-top: 2px solid gray;
        }
        .cv-img{
            margin-left: auto;
            margin-right: auto;
            height: 100px;
            width: 90px;
            border: 2px solid #fff;
            border-radius: 10px;
        }
        .panel-header{
            padding: 0 15px;
            background: #1685C7;
            color: #fff;
        }
        .panel-body{
            background: #1685C7;
            color: #fff;
        }
        .pl-0{
            padding-left: 0;
        }
        .text-black{
            color: #000;
        }
        .section-top-space{
            margin-top: 100px;
        }
        .tab{
            padding: 2px 15px 2px;
            background: #1685C7;
            color: white;
            border-radius: 5px;
        }
        .w-100{
            width: 100%;
        }
        .panel{
            box-shadow: 2px 2px 4px 3px #b1acac;
        }
        .custom-width{
            width: 210px;
            margin: 10px;
            float: left;
        }
        .panel-footer{
            background: #fff;
        }
        .bg-white{
            background: #fff;
        }
        .modal-content{
            color: #333;
            text-align: left;
        }
        .ml{
            margin-left: 2px;
        }
        .tab-content label{
            padding: 0;
        }
        .tab-content select{
            margin: 0;
        }
        .tick{
            width: 20px;
        }
        select{
            background-color: #1685C7 !important;
            color: #fff !important;
            border-radius: 15px !important;
        }
        .round{
            border-radius: 15px !important;
        }
        .p-0{
            padding: 0 !important;
        }
        .pl-10{
            padding-left: 10px;
        }
        .purchae-hed{
            font-size: 18px;
        }
        .mt-0{
            margin-top: 0 !important;
        }
        .mb-0{
            margin-bottom: 0 !important;
        }
        .purchas-main{
            padding: 0!important;
        }
        .bg-red{
            background: #ed4c49;
        }
        .bg-green{
            background: #1ec81e;
        }
        @media (max-width: 576px) {
            .custom-width{
                /*width: auto;*/
                width: 160px;
                height: 315px;
            }
            .margin-remove{
                margin: unset !important;
            }
            a{
                display:inline-block;
                padding-top: 3.6% !important;
            }
        }

        @media (max-width: 768px) {
            .custom-width{
                /*width: auto;*/
                width: 160px;
                height: 315px;
            }
            .margin-remove{
                margin: unset !important;
            }
            a{
                display:inline-block;
                padding-top: 3.6% !important;
            }
        }
    </style>
    <!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
    @include('notifications')

@stop

{{-- content --}}
@section('content')
    <div class="container">
        <div class="row section-top-space">
            <div class="wow flash" data-wow-duration="3s">
                <h3 class="border-primary text-center "><span class="heading_border bg-primary">Latest CV's</span></h3>
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row margin-remove">
                    <div class="col-md-2">
                        <strong class="pl-10">Country</strong>
                        <select class="form-control" id="country">
                            <option value="0">All</option>
                            @foreach($activeCountries as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <strong class="pl-10">Occupation</strong>
                        <select class="form-control" id="occupation">
                            <option value="0">All</option>
                            @foreach($activeOcuupations as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <strong class="pl-10">Age</strong>
                        <select class="form-control" id="age">
                            @foreach(\App\Models\User::$agelimit as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <strong class="pl-10">Religion</strong>
                        <select class="form-control" id="religion">
                            <option value="0">All</option>
                            <option value="1">Muslim</option>
                            <option value="2">Non Muslim</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <strong class="pl-10">&nbsp;</strong>
                        <button class="btn btn-default round form-control" onClick = "return get_cvs()">Search</button>
                    </div>
                </div>
            </div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            @if(count($results))
            <div class="row margin-remove">
                <div class="col-md-12">
                    <h5>Please select your required CV</h5>
                </div>
            </div>
            @endif
            <!-- Vestibulizzle Section Start -->
            <div id="cvs">
                @php
                    $number = 1;
                @endphp
                @if(count($results))
                @foreach($results as $result)
                    @php
                        $number++;
                    @endphp

                    <div class="custom-width">

                        <div class="panel panel-default text-center">

                            <div class="panel-header">

                                <span style="font-size: 24px;">SA {{ sprintf('%04d',$result->id) }}</span>
                                <!-- <span class="text-white" style="font-size: 24px;">{{ ucfirst($result->occupation->name) }}</span> -->

                            </div>
                            <div class="panel-header">
                                           @php
                                               $user=App\Models\User::where('id',$result->user_id)->first();
                                           @endphp

                                           @if(!empty($user))
                                <span style="font-size: 24px;">{{ $user->first_name }}.{{ $user->last_name }}</span>
                                    @endif

                            </div>

                            <div class="panel-body text-center">

                                <div>

                                    @if($result->pic != null)
                                        <img src="{{ url('uploads/profile/'.$result->pic) }}" alt="100x100" class="cv-img img-responsive rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive cv-img">
                                    @endif

                                </div>

                                <h5 class="success text-white">{{ substr_replace($result->name, "...", 15) }}</h5>

                                <div style="display: flex;justify-content: center;">

                                    <ul class="text-left pl-0 text-white">

                                        <li>Age: {{ $result->age }}</li>

                                        <li>
                                            Country:
                                            @if(!is_null($result->national_country_id))
                                                {{ \App\Models\Country::find($result->national_country_id)->name }}
                                            @else
                                                &nbsp;
                                            @endif
                                        </li>

                                        <li>Religion:
                                            {{ \App\Models\User::$religion[$result->religion] }}
                                        </li>

                                        <!-- <li>{{ $result->previouswork }}</li> -->

                                    </ul>

                                </div>
                                @if($result->connect && $result->connect->status == 0)
                                    <span class="tab bg-red">Processing</span>
                                @elseif($result->connect && $result->connect->status == 1)
                                    <span class="tab bg-green">Accepted</span>
                                @else
                                    <a href="{{ url('detail/'.base64_encode($result->id)) }}" target="_blank" class="tab bg-white" >View</a>
                                    <!-- <a href="#" data-toggle="modal" class="tab bg-white" data-target="#cv_{{ $result->id }}">Detail</a> -->
                                    @include('cv.detail')
                                @endif
                            </div>

                        </div>

                    </div>

                @endforeach
                @else
                    <h5 class="text-danger">Record Not Found</h5>
                @endif
            </div>
        </div>
    </div>
    <!-- //Container End -->
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
@stop

{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js')}}"></script>
    <script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>

    <script>

        jQuery(document).ready(function() {

            new WOW().init();

        });

        function get_all_cvs(){
            var age = 0;
            var country = 0;
            var occupation = 0;
            var religion = 0;

            jQuery('#cvs').css('opacity','.2');

            var route = "{{ url('getcvs') }}";

            var token = $('#token').val();

            $.ajax({

                url: route,

                headers: {'X-CSRF-TOKEN': token},

                type: 'POST',

                 //dataType: 'json',

                data: {
                    'occupation': occupation,
                    'country': country,
                    'religion': religion,
                    'age': age
                },

                success: function(obj, status) {

                    if(obj.st == 'ok'){
                        $("#country").val(0).change();
                        $("#occupation").val(0).change();
                        $("#age").val(0).change();
                        jQuery('#cvs').css('opacity','1');
                        jQuery('#cvs').html(obj.html);
                        //jQuery('#'+filter+'_'+id).addClass('active');

                    } else if(obj.st == 'err') {
                        window.location = "{{ url('login') }}";
                    }

                }

            });

            return false;
        }

        function get_cvs(){

            var age = jQuery('#age').val();
            var country = jQuery('#country').val();
            var occupation = jQuery('#occupation').val();
            var religion = jQuery('#religion').val();

            jQuery('#cvs').css('opacity','.2');

            var route = "{{ url('getcvs') }}";

            var token = $('#token').val();

            $.ajax({

                url: route,

                headers: {'X-CSRF-TOKEN': token},

                type: 'POST',

                 //dataType: 'json',

                data: {
                    'occupation': occupation,
                    'religion': religion,
                    'country': country,
                    'age': age
                },

                success: function(obj, status) {

                    if(obj.st == 'ok'){
                        jQuery('#cvs').css('opacity','1');
                        jQuery('#cvs').html(obj.html);
                        //jQuery('#'+filter+'_'+id).addClass('active');

                    } else if(obj.st == 'err') {
                        window.location = "{{ url('login') }}";
                    }

                }

            });

            return false;
        }

    </script>
    <!--page level js ends-->
@stop
