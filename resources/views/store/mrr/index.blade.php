@extends('layouts.fixed')

@section('title','Well Group | MRR')

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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/report/mrr/create')}}"><h4 style="color: white"><b>Add MRR</b></h4></a></button><br>
                        <button onclick="window.open('{{ url('mrr-print') }}','_blank')" class="btn btn-success" style="float: right"><i class="fa fa-print"></i> Print</button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Date</th>
                                <th>Buyer</th>
                                <th>Item Name</th>
                                <th>MRR No</th>
                                <th>Inv/Challan No</th>
                                <th>Supplier Name</th>
                                <th>PKGS</th>
                                <th>SIZE</th>
                                <th>Unit</th>
                                <th>Inv/Cln Qty</th>
                                <th>RCVD Qty</th>
                                <th>Short Over</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($mrr as $key => $value)
                                <tr role="row" id="tr-{{ $value->id }}" class="odd">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ date('d.m.y', strtotime($value->date)) }}</td>
                                    <td>{{ optional($value->buyer)->name }}</td>
                                    <td>{{ $value->item }}</td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->invoice_no }}</td>
                                    <td>{{ optional($value->supplier)->name }}</td>
                                    <td>{{ $value->pkgs }}</td>
                                    <td>{{ $value->size }}</td>
                                    <td>{{ optional($value->unit)->name }}</td>
                                    <td>{{ $value->invoice_qty }}</td>
                                    <td>{{ $value->received_qty  }}</td>
                                    <td>{{ $value->invoice_qty - $value->received_qty}}</td>
                                    <td>{{ $value->remarks }}</td>
                                    <td>
                                        <a href="{{ url('store/report/mrr') }}/{{ $value->id }}/edit" title="Edit" class="btn bg-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="Delete('{{ $value->id }}')" title="Delete" class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
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
    <link rel="stylesheet" href="{{ url('public/plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="{{ url('public/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('public/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
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

        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                          url: "{{url('store/report/mrr/')}}/"+id,
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