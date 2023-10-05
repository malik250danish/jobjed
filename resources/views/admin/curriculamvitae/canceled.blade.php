@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Canceled
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
        <li class="active">Connect CV</li>
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
                        Canceled Curriculam Vitae Requests
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content" >
                        <thead class="flip-content">
                            <tr>
                                <th>Id</th>
                                <th>Worker Info</th>
                                <th>Employer Info</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>
                                        @if($result->pic != null)
                                            <img src="{{ url('uploads/profile/'.$result->pic) }}" style="width:50px;" alt="team-image" class="img-responsive">
                                        @else
                                            <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive"> 
                                        @endif
                                        {{ $result->name }}<br>
                                        @if(Auth::getUser()->role_id == 1)
                                            {{ $result->email }}<br>
                                            {{ $result->phone }}<br>
                                            {{ $result->home_address }}<br>
                                            @if($result->cv)
                                                <a target="_blank" href="{{ url('uploads/cv/'.$result->cv) }}">
                                                    <span class="fa fa-eye"></span> View or Downlaod CV
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $employeer = \App\Models\User::find($result->employer_id);
                                        @endphp
                                        @if($employeer)
                                            {{ $employeer->first_name.' '.$employeer->last_name }}<br>
                                            {{ $employeer->email }}<br>
                                            <strong>Phone: </strong>{{ $employeer->phone }}<br>
                                            <strong>City: </strong>{{ $employeer->city }}
                                        @endif
                                    </td>
                                    <td>
                                        <b>Reason: </b>
                                        <p>{{ $result->reason }}</p>
                                        <span class="text-danger">Canceled</span>
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
