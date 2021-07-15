@extends('layouts.fixed')

@section('title','Well Group | Manage Merchandiser')

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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-merchandiser')}}"><h4 style="color: white"><b>Add Merchandiser</b></h4></a></button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Merchandiser Name</th>
                                <th>Merchandiser Address</th>
                                <th>Merchandiser Phone</th>
                                <th>Merchandiser Mobile</th>
                                <th>Merchandiser Fax</th>
                                <th>Merchandiser Email</th>
                                @can('store')
                                <th>Action</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($merchandisers as $merchandiser)
                                <tr role="row" class="odd">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $merchandiser->merchandiser_name }}</td>
                                    <td>{{ $merchandiser->merchandiser_address }}</td>
                                    <td>{{ $merchandiser->merchandiser_phone }}</td>
                                    <td>{{ $merchandiser->merchandiser_mobile }}</td>
                                    <td>{{ $merchandiser->merchandiser_fax }}</td>
                                    <td>{{ $merchandiser->merchandiser_email }}</td>
                                    @can('store')
                                    <td>
                                        {{ Form::open(['action'=>['store\merchandiser\StoreMerchandiserController@destroy',$merchandiser->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('store\merchandiser\StoreMerchandiserController@edit',$merchandiser->id) }}">
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