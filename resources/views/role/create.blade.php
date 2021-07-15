@extends('layouts.fixed')
@section('title','Create New Role')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Home
                    </a>
                </li>
                <li class="active">Add Role</li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes-->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Add Role</h3>
                        </div>
                    </div> <hr>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <h3>Personal Information</h3><br>
                        {{ Form::open(['action'=>'RoleController@store','method'=>'post']) }}
                            @include('role.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.content-->
@stop

@section('script')

    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $('.select2').select2();
    </script>

@stop