@extends('layouts.fixed')

@section('title','Well Group | Manage Supplier')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @can('store')
                    <div class="card-header" >
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-supplier')}}"><h4 style="color: white"><b>Add Supplier</b></h4></a></button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Supplier Name</th>
                                <th>Supplier Phone</th>
                                <th>Supplier Email</th>
                                <th>Supplier Address</th>
                                @can('store')
                                <th>Action</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($suppliers as $supplier)
                                <tr role="row" class="odd">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    @can('store')
                                    <td>
                                        {{ Form::open(['action'=>['store\supplier\StoreSupplierController@destroy',$supplier->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('store\supplier\StoreSupplierController@edit',$supplier->id) }}">
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