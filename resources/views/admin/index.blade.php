@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Welcome to Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <a href="{{ url('/admin/cv/today') }}" target="_blank">
                    <!-- Trans label pie charts strats here-->
                    <div class="lightbluebg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 text-right">
                                        <span>Today CV's</span>

                                        <div class="number" id="todaycv"></div>
                                    </div>
                                    <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement1.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement1.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/connect/today') }}" target="_blank">
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Today's Connect</span>

                                        <div class="number" id="todayconnect"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement2.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement2.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/processing/today') }}" target="_blank">
                    <div class="goldbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Today Processing</span>

                                        <div class="number" id="todayprocessing"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement3.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement3.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/users/view/today') }}" target="_blank">
                    <div class="palebluecolorbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Today Users</span>

                                        <div class="number" id="todayusers"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement4.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement4.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/month') }}" target="_blank">
                    <div class="lightbluebg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 text-right">
                                        <span>This Month CV's</span>

                                        <div class="number" id="thismonthcv"></div>
                                    </div>
                                    <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement1.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement1.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/connect/month') }}" target="_blank">
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>This Month Connect</span>

                                        <div class="number" id="thismonthconnect"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement2.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement2.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/connect/month') }}" target="_blank">
                    <div class="goldbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>This Month Processing</span>

                                        <div class="number" id="thismonthprocessing"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement3.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement3.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/users/view/month') }}" target="_blank">
                    <div class="palebluecolorbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>This Month Users</span>

                                        <div class="number" id="thismonthusers"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement4.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement4.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/all') }}" target="_blank">
                    <div class="lightbluebg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 text-right">
                                        <span>Total CV's</span>

                                        <div class="number" id="totalcv"></div>
                                    </div>
                                    <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement1.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement1.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/connect/all') }}" target="_blank">
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Total CV's Connect</span>

                                        <div class="number" id="totalconnect"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement2.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement2.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/cv/processing/all') }}" target="_blank">
                    <div class="goldbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Total Processing</span>

                                        <div class="number" id="totalprocessing"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement3.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement3.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <a href="{{ url('/admin/users') }}" target="_blank">
                    <div class="palebluecolorbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Total Users</span>

                                        <div class="number" id="totalusers"></div>
                                    </div>
                                    <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stat-label">Last Week</small>
                                        <h4 id="myTargetElement4.1"></h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <small class="stat-label">Last Month</small>
                                        <h4 id="myTargetElement4.2"></h4>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('assets/vendors/bower-jquery-easyPieChart/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bower-jquery-easyPieChart/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bower-jquery-easyPieChart/js/jquery.easingpie.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('assets/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('assets/vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('assets/vendors/countUp_js/js/countUp.js') }}"></script>
    <!--   maps -->
    <script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!--  todolist-->
    <!-- <script src="{{ asset('assets/js/pages/todolist.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script> -->



    <script>
        var useOnComplete = false,

        useEasing = false,

        useGrouping = false,

        options = {

            useEasing : useEasing, // toggle easing

            useGrouping : useGrouping, // 1,000,000 vs 1000000

            separator : ',', // character to use as a separator

            decimal : '.' // character to use as a decimal

        };
        @php
    $CurriculumVitae = new App\Models\CurriculumVitae();
    $newCV = $CurriculumVitae->newCV(date('Y-m-d'),date('Y-m-d'));
@endphp

        var demo = new CountUp("todaycv", 12.52,{{$newCV}}, 0, 6, options);

        demo.start();

        @php
    $CVConnect = new App\Models\CurriculumVitaeConnect();
    $todayRequests = $CVConnect->requests(date('Y-m-d'),date('Y-m-d'),0);
@endphp



        var demo = new CountUp("todayconnect", 1, {{$todayRequests }}, 0, 6, options);

        demo.start();
@php
    $CVConnect = new App\Models\CurriculumVitaeConnect();
    $todayProcessing = $CVConnect->requests(date('Y-m-d'), date('Y-m-d'), 1);
@endphp

        var demo = new CountUp("todayprocessing", 24.02,{{$todayProcessing }}, 0, 6, options);

        demo.start();


        @php
    $CVConnect = new \App\Models\User();
    $todayProcessing = $CVConnect->totalusers(date('Y-m-d'),date('Y-m-d'));
@endphp


        var demo = new CountUp("todayusers", 1254,{{  $todayProcessing}}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\CurriculumVitae();
    $todayProcessing = $CVConnect->newCV(date('Y-m-01'),date('Y-m-d'));
@endphp
        // This month results
        var demo = new CountUp("thismonthcv", 12.52,{{  $todayProcessing }}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\CurriculumVitaeConnect();
    $todayProcessing = $CVConnect->requests(date('Y-m-01'),date('Y-m-d'),1);
@endphp
        var demo = new CountUp("thismonthconnect", 1,{{$todayProcessing}}, 0, 6, options);

        demo.start();

  @php
    $CVConnect = new \App\Models\CurriculumVitaeConnect();
    $todayProcessing = $CVConnect->requests(date('Y-01-01'),date('Y-m-d'),1);
@endphp
        var demo = new CountUp("thismonthprocessing", 24.02, {{ $todayProcessing}}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\User();
    $todayProcessing = $CVConnect->totalusers(date('Y-m-01'),date('Y-m-d'));
@endphp

        var demo = new CountUp("thismonthusers", 1254, {{ $todayProcessing }}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\CurriculumVitae();
    $todayProcessing = $CVConnect->count();
@endphp
        // Total results
        var demo = new CountUp("totalcv", 12.52, {{ $todayProcessing }}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\CurriculumVitaeConnect();
    $todayProcessing = $CVConnect->where('status',0)->count();
@endphp

        var demo = new CountUp("totalconnect", 1,{{$todayProcessing }}, 0, 6, options);

        demo.start();
  @php
    $CVConnect = new \App\Models\CurriculumVitaeConnect();
    $todayProcessing = $CVConnect->where('status',1)->count();
@endphp

        var demo = new CountUp("totalprocessing", 24.02,{{$todayProcessing }}, 0, 6, options);

        demo.start();

  @php
    $CVConnect = new \App\Models\User();
    $todayProcessing = $CVConnect->totalusers(date('2020-01-01'),date('Y-m-d'));
@endphp
        var demo = new CountUp("totalusers", 1254, {{$todayProcessing }}, 0, 6, options);

        demo.start();
    </script>

@stop
