@extends('layouts.fixed')

@section('title','Well Group | Manage Orders')

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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-order')}}"><h4 style="color: white"><b>Add Order</b></h4></a></button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Order No.</th>
                                <th>Style No.</th>
                                <th>Order Date</th>
                                <th>Shipment Date</th>
                                <th>Size Range</th>
                                <th>Unit Price</th>
                                <th>Order Qty</th>
                                <th>Order Value</th>
                                <th>Price Currency</th>
                                <th>Item Desc.</th>
                                <th>Shell Fabric</th>
                                <th>Master L/C No.</th>
                                <th>Master L/C Date</th>
                                <th>Wash Type</th>
                                <th>Embroidery</th>
                                <th>Printing</th>
                                <th>Remarks</th>
                                @can('store')
                                <th>Action</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($orders as $order)
                                <tr role="row" class="odd">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->style_no }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->shipment_date }}</td>
                                    <td>{{ $order->size_range }}</td>
                                    <td>{{ $order->unit_price }}</td>
                                    <td>{{ $order->order_qty }}</td>
                                    <td>{{ $order->order_value }}</td>
                                    <td>{{ $order->price_curr }}</td>
                                    <td>{{ $order->item_desc }}</td>
                                    <td>{{ $order->shell_fabric }}</td>
                                    <td>{{ $order->master_lc_no }}</td>
                                    <td>{{ $order->master_lc_date }}</td>
                                    <td>{{ $order->wash_type }}</td>
                                    <td>{{ $order->embroidery }}</td>
                                    <td>{{ $order->printing }}</td>
                                    <td>{{ $order->remarks }}</td>
                                    @can('store')
                                    <td>
                                        {{ Form::open(['action'=>['store\order\StoreOrderController@destroy',$order->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('store\order\StoreOrderController@edit',$order->id) }}">
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