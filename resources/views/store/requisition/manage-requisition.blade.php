@extends('layouts.fixed')

@section('title','Well Group | Manage Requisition')

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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-requisition')}}"><h4 style="color: white"><b>Add Requisition</b></h4></a></button>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Date</th>
                                <th>Style</th>
                                <th>Order No</th>
                                <th>Order Qty.</th>
                                <th>Buyer Name</th>
                                <th>Company Unit</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($store_requisition as $requisition)
                                {{--{{dd($requisition)}}--}}
                                <tr id="tr-{{ $requisition->id }}" role="row" class="odd">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $requisition->date }}</td>
                                    <td>{{ optional($requisition->style_name)->style_no }}</td>
                                    <td>{{ $requisition->store_order->order_no }}</td>
                                    <td>{{ $requisition->ord_qty }}</td>
                                    <td>{{ $requisition->buyer }}</td>
                                    <td>{{ $requisition->company_name != null ?$requisition->company_name->name : '' }}</td>
                                    <td>{{ $requisition->remarks }}</td>
                                    <td>
                                        <a title="Print" style="cursor: pointer;" onclick="window.open('{{url("requisition-report")}}/{{ $requisition->id }}/print','_blank')">
                                            <i class="fa text-success fa-print"></i>
                                        </a>
                                        <a title="Edit" href="{{ url('report/view-Store-requisition',$requisition->id) }}">
                                            <i class="fa text-success fa-eye"></i>
                                        </a>  &nbsp;
                                        @can('store')
                                        <button type="button" onclick="Delete('{{ $requisition->id }}')" class="text-danger"><i class="fa fas fa-trash"></i></button>
                                        @endcan
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
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
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
        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                          url: "{{url('store/requisition-delete/')}}/"+id,
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