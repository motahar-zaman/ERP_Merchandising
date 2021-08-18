@extends('layouts.fixed')

@section('title','Manage Buyer')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Buyer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Buyer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @can('merchandiser')
                    <div class="card-header" >
                        <button class="btn btn-success">
                            <a href="{{url('merchandise/add-buyer')}}">
                                <h6 style="color: white">Add Buyer</h6>
                            </a>
                        </button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Address</th>
                                    <th>Bank Info</th>
                                    @can('merchandiser')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($buyers as $buyer)
                                <tr role="row" class="odd">
                                    <td>{{ $buyer->name }}</td>
                                    <td>{{ $buyer->email }}</td>
                                    <td>{{ $buyer->phone }}</td>
                                    <td>{{ $buyer->address }}</td>
                                    <td>{{ $buyer->bank_details }}</td>
                                    @can('merchandiser')
                                    <td>
                                        {{ Form::open(['action'=>['BuyerController@destroy',$buyer->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('BuyerController@edit',$buyer->id) }}">
                                            <i class="fa text-success fa-pencil-alt"></i>
                                        </a> &nbsp;  &nbsp;
                                        <button type="submit" class="text-danger"><i class="fa fas fa-trash"></i></button>
                                        {{ Form::close() }}
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

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
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@stop
