@extends('admin/layouts/default')



{{-- Page title --}}

@section('title')

Company List

@parent

@stop



{{-- page level styles --}}

@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />

<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

@stop





{{-- Page content --}}

@section('content')

<section class="content-header">

    <h1>Companys</h1>

    <ol class="breadcrumb">

        <li>

            <a href="{{ url('admin') }}">

                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>

                Dashboard

            </a>

        </li>

        <li><a href="#"> Company</a></li>

        <li class="active">Company List</li>

    </ol>

</section>



<!-- Main content -->

<section class="content paddingleft_right15">

    <div class="row">

        <div class="panel panel-primary ">

            <div class="panel-heading">

                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>

                    Company List

                </h4>

            </div>

            <br />

            <div class="panel-body">

                <table class="table table-bordered " id="table">

                    <thead>

                        <tr class="filters">

                            <th>ID</th>

                            <th>First Name</th>

                            <th>Last Name</th>

                            <th>User E-mail</th>

                            <th>Groups</th>

                            <th>Status</th>

                            <th>Created At</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>





                    </tbody>

                </table>

            </div>

        </div>

    </div>    <!-- row-->

</section>

@stop



{{-- page level scripts --}}

@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>



<script>

    $(function() {

        var table = $('#table').DataTable({

            processing: true,

            serverSide: true,

            ajax: "{!! url('admin/company/data') !!}",

            columns: [

                { data: 'id', name: 'id' },

                { data: 'first_name', name: 'first_name' },

                { data: 'last_name', name: 'last_name' },

                { data: 'email', name: 'email' },

                { data: 'groups', name: 'groups' },

                { data: 'status', name: 'status'},

                { data: 'created_at', name:'created_at'},

                { data: 'actions', name: 'actions', orderable: false, searchable: false }

            ]

        });

        table.on( 'draw', function () {

            $('.livicon').each(function(){

                $(this).updateLivicon();

            });

        } );

    });



</script>



<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">

	<div class="modal-dialog">

    	<div class="modal-content"></div>

  </div>

</div>

<script>

$(function () {

	$('body').on('hidden.bs.modal', '.modal', function () {

		$(this).removeData('bs.modal');

	});

});

</script>

@stop
