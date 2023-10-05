@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Curriculam Vitae
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet"/>
    <style>
        input{
            margin: 0;
        }
        .cv-img{
            height: 100px;
            width: 90px !important;
            border: 2px solid #fff;
            border-radius: 10px;
        }
    </style>
    <!-- end of page level css-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Curriculam Vitae</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('admin') }}">
                <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Curriculam Vitae</a>
        </li>
        <li class="active">All Curriculams</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Curriculam Vitae
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content" >
                        <thead class="flip-content">
                            <tr>
                                <th>Id</th>
                                <th>Worker Image</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 1;
                            @endphp
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>
                                        @if($result->pic != null)
                                            <img src="{{ url('uploads/profile/'.$result->pic) }}" alt="100x100" class="cv-img img-responsive rounded-circle">
                                        @else
                                            <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive cv-img"> 
                                        @endif
                                    </td>
                                    <td>
                                        <b>Name:</b> {{ $result->name }}<br>
                                        <b>Phone:</b> {{ $result->phone }}<br>
                                        <b>Address:</b> {{ $result->home_address }}<br>
                                        <b>PAssport:</b> {{ $result->passport_number }}<br>
                                    </td>
                                    <td>{{ $result->nationalty }}</td>
                                    <td>
                                        @if($result->connect)
                                            @if($result->connect->status ==0)
                                                <span class="text-danger">Processing</span>
                                            @else
                                                <span class="text-success">Accepted</span>
                                            @endif
                                        @endif
                                        <br>
                                        <a href="{{ url('detail/'.base64_encode($result->id)) }}" target="_blank" class="btn btn-info" >View</a>
                                        @if($result->cv_lock == 0)
                                            <a href="{{ url('cvconnect/'.$result->id) }}" onclick = "return confirm('Are you sure you want to connect with this person')">
                                                <button class="btn  btn-primary">Connect</button>
                                            </a>
                                        @endif
                                        <a href="{{ url('admin/curriculamvitae/print/'.base64_encode($result->id)) }}" class="btn btn-info" target="_blank">
                                            Print
                                        </a>
                                        <a href="{{ url('admin/curriculamvitae/edit/'.base64_encode($result->id)) }}" target="_blank" class="btn btn-default">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/table-responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js')}}"></script>
    <script>
        function load_states() {
            $( "#load-cities" ).submit();
            return true;
        }
    </script>
@stop
