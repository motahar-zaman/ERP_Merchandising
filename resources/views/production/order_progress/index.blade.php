@extends('layouts.fixed')

@section('title','Well Group | Order Progress')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><
    </section> --}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" >
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('production/create-order-progress')}}"><h4 style="color: white"><b>Add Order Progress</b></h4></a></button><br>
                        <form method="GET" action="{{url('production/order-progress-report')}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="from_date">Factory</label>
                                            <select name="factory_id" class="form-control">
                                                <option value=""> --- Select Factory --- </option>
                                                @foreach($factories as $key => $factory)
                                                    <option value="{{ $key }}" @if($factory_id == $key) selected @endif>{{ $factory }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="from_date">From</label>
                                      <input type="date" class="form-control" id="from_date" value="{{ $from_date }}" placeholder="Enter email" name="from_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                      <label for="to_date">To</label>
                                      <input type="date" class="form-control" id="to_date" value="{{ $to_date }}" placeholder="Enter password" name="to_date">
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                   <div class="row">
                                       <div class="col-md-6" style="margin-top: 30px">
                                           <button type="submit" class="btn-block btn btn-success"><i class="fa fa-search"></i> Search</button>
                                       </div>
                                       <div class="col-md-6" style="margin-top: 30px">
                                           <a href="#" class="btn-block btn btn-primary"><i class="fa fa-print"></i> Print</a>
                                       </div>
                                   </div>
                                </div>
                            </div>
                            
                            
                            
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Factory</th>
                                <th>Reporting Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr id="tr-{{ $order->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $factories[$order->factory_id] }}</td>
                                        <td>{{ date('d-M-Y', strtotime($order->reporting_date)) }}</td>
                                        <td class="text-center">
                                            <button type="button" onclick="window.open('{{ url('production/order-progress-report') }}/{{ $order->id }}')" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</button>
                                            <button type="button" onclick="Delete('{{ $order->id }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
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
    <script src="{{ asset('/') }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
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

        $('.select2').select2()

        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                          url: "{{url('production/order-progress-delete')}}/"+id,
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