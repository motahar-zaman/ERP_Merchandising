@extends('layouts.fixed')

@section('title','Edit Role')

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
                <li class="active">Edit Role</li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes-->
        <div class="row">
            <div class="col-lg-5">
                <h3 class="card-title"> Edit Role</h3>
                <hr>
                <div class=" bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Personal Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            {{ Form::model($role,['action'=>['RoleController@update',$role->id],'method'=>'patch']) }}
                                @include('role.form')
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop



@section('script')
    <!-- jvectormap  -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>


    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="http://localhost/adminlte/public/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- date-range-picker -->
    <script src="http://localhost/adminlte/public/bower_components/moment/min/moment.min.js"></script>
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('.select2').select2();
    </script>

@stop