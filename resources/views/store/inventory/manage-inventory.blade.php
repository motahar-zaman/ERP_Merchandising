@extends('layouts.fixed')

@section('title','Well Group | Manage Inventory')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-inventory')}}"><h4 style="color: white"><b>Add Inventory</b></h4></a></button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Rcv Date</th>
                                <th>INVOICE/CHALAN NO:</th>
                                <th>Style No</th>
                                <th>Order No</th>
                                <th>Order Qty.</th>
                                <th>Buyer Name</th>
                                <th>Supplier Name</th>
                                <th>Exp Lc</th>
                                <th>Bb Lc</th>
                                <th>PO No</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            {{-- <tbody>
                            @php $i = 1; @endphp
                            @foreach($store_inventory as $inventory)
                                <tr role="row" id="tr-{{ $inventory->id }}" class="odd">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $inventory->rcv_date }}</td>
                                    <td>{{ $inventory->inv_cha }}</td>
                                    <td>{{ $inventory->store_order !=null ? $inventory->store_order->style_no : ''}}</td>
                                    <td>{{ $inventory->store_order->order_no }}</td>
                                    <td>{{ $inventory->order_qty }}</td>
                                    <td>{{ $inventory['buyer'] != null ? $inventory['buyer'] : '' }}</td>
                                    <td>{{ $inventory->supplier_name != null ? $inventory->supplier_name->name : ''}}</td>
                                    <td>{{ $inventory->exp_lc }}</td>
                                    <td>{{ $inventory->bb_lc }}</td>
                                    <td>{{ $inventory->po_no }}</td>
                                    <td>
                                        <a title="Print" style="cursor: pointer;" onclick="window.open('{{url("inventory-report")}}/{{ $inventory->id }}/print','_blank')">
                                            <i class="fa text-success fa-print"></i>
                                        </a>
                                        <a title="Edit" href="{{ url('report/view-Store-inventory',$inventory->id) }}">
                                            <i class="fa text-success fa-eye"></i>
                                        </a>&nbsp;  &nbsp;
                                        @can('store')
                                        <button type="button" onclick="Delete('{{ $inventory->id }}')" class="text-danger"><i class="fa fas fa-trash"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody> --}}

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
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <!-- page script -->
    <script>
        
        $(function () {
            $("#example1").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('store/get-inventory') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'rcv_date', name: 'rcv_date'},
                    {data: 'inv_cha', name: 'inv_cha'},
                    {data: 'style_no', name: 'style_no'},
                    {data: 'order_no', name: 'order_no'},
                    {data: 'order_qty', name: 'order_qty'},
                    {data: 'buyer', name: 'buyer'},
                    {data: 'supplier_name', name: 'supplier_name'},
                    {data: 'exp_lc', name: 'exp_lc'},
                    {data: 'bb_lc', name: 'bb_lc'},
                    {data: 'po_no', name: 'po_no'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                          url: "{{url('store/inventory-delete/')}}/"+id,
                          type: 'DELETE',
                          dataType: 'json',
                          data: {},
                          success:function(response) {
                            if(response.success){
                              $('#tr-'+id).fadeOut();
                            }else{
                              $.alert({
                                title:"Whoops!",
                                content:"<hr><strong class='text-danger'>Something Went Wrong!</strong><hr>",
                                type:"red"
                              });
                            }
                          }
                        });
                    },
                    cancel: function () {

                    }
                }
            });   
        }
    </script>
@stop