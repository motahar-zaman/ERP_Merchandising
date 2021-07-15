@extends('layouts.fixed')

@section('title','edit Address')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company Address</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">

            <div class="card"><br>
                <div class="card-body">

                    {{-- start showin gsuccess message --}}
                    <div class="col-md-4">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    {{-- end showin gsuccess message --}}

                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Edit Address</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    {{--{{Form::model($var,['action'=>[],'method'=>'post','class'=>'']) }}    --}}
                                    {{ Form::model($companyAddress, ['route'=>['update.companyCategory',$companyAddress->id],'method'=>'patch', 'class'=>'form-horizontal']) }}
                                    @include('merchandising.settings.company_address.form',['submitButtonText'=>'Update'])
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 offset-lg-1">
                            @include('merchandising.settings.company_address.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeOut(500, function(){
                    $(this).remove();
                });
            }, 1200);

        });

        //delete confirmation  message
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this ?');
            return !!x;
        }

    </script>
@stop