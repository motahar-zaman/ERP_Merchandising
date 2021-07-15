@extends('layouts.fixed')
@section('title','Roles')
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          <span class="text text-primary">
                                 <h3 class="box-title">Manage Roles</h3>
                          </span>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ol>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ action('RoleController@create') }}">
                                <button class="btn btn-info" type="button">Add Role</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="margin">
                                <label for="">Key words</label>
                                <input class="form-control" placeholder="keyword" name="col-xs-3" type="text">
                                <span class="small">(Search by company name email id)</span>
                            </div>
                        </div>
                    </div>


{{--                    <div class="col-md-2">--}}
{{--                        <div class="card-tools">--}}
{{--                            <div class="input-group input-group-sm" style="margin-top: 20px;">--}}
{{--                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <br>
                <br>
                <div class="row">

                    {{--list  start --}}
                    <div class="col-md-10">
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-info">Roles List </h5>
                                </div>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc">Select</th>
                                            <th class="sorting_asc">ID</th>
                                            <th class="sorting_asc">Name</th>
                                            <th class="sorting_asc" width="30%">Role</th>
                                            <th class="sorting_asc">Member Since</th>
                                            <th class="sorting_asc">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($roles as $role)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <input name="checkbox3" type="checkbox" value="1">
                                                </td>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach($role->permissions as $permission)
                                                        <span class="badge badge-dark text-light">{{ $permission->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $role->created_at }}</td>
                                                <td>
                                                    {{ Form::open(['action'=>['RoleController@destroy',$role->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                        <a href="{{ action('RoleController@edit',$role->id) }}">
                                                            <i class="fa text-success fa-pencil-alt"></i>
                                                        </a> &nbsp;  &nbsp;
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fas fa-trash"></i></button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{--list end--}}


                    <div class="col-md-12">
                        <div class="row"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                    Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }}
                </div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </section>

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
    <script src="http://localhost/adminlte/public/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="http://localhost/adminlte/public/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- date-range-picker -->
    <script src="http://localhost/adminlte/public/bower_components/moment/min/moment.min.js"></script>
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>



    <!-- Page script -->
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this role?');
            return !!x;
        }
    </script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                autoclose: true
            });
        })
    </script>

@stop