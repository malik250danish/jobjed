@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Occupations
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
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
    <h1>Occupations</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('admin') }}">
                <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Occupations</a>
        </li>
        <li class="active">All Occupations</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <form method="POST" action="{{ url('admin/settings/occupations/add') }}">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <label>Occupation Name</label>
                        @csrf
                        <input type="text" name="name" value="" placeholder="occuption Name Here" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Work Hold<br><span>Type then key press "Enter" and next tab type</span></label>
                        <textarea name="workhold" value="" placeholder="Work Hold" class="form-control workhold" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="Save"> 
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Channel
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content" >
                        <thead class="flip-content">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Work Hold</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>
                                        @if(!is_null($result->workhold)) 
                                            {{ implode(',',$result->workhold) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($result->enable == 0)
                                            <a href="{{ url('admin/settings/occupations/changestatus/1/'.$result->id) }}" onClick="javascript: return confirm('Are you sure want to activate this record?');" class="btn btn-warning">Do Activate</a>
                                        @else
                                            <a href="{{ url('admin/settings/occupations/changestatus/0/'.$result->id) }}" onClick="javascript: return confirm('Are you sure want to inactivate this record?');" class="btn btn-success">Do Inactivate</a>
                                        @endif
                                    </td>
                                    <td>
                                        @include('admin.settings.occuptions.edit')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    <script>
        function load_states() {
            $( "#load-cities" ).submit();
            return true;
        }
        $(document).ready(function(){        
          var tagInputEle = $('.workhold');
          tagInputEle.tagsinput();
          // tagInputEle.tagsinput('add', 'Jakarta');
          // tagInputEle.tagsinput('add', 'Bogor');
          // tagInputEle.tagsinput('add', 'Bandung');
        });
    </script>
@stop
