@extends('layouts.fixed')

@section('title','Well Group | Manage Booking')

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
                        <button class="btn btn-info btn-lg btn-block"><a href="{{url('store/add-booking')}}"><h4 style="color: white"><b>Add Booking</b></h4></a></button><br>
                        <from class="form-inline">
                            <div class="form-group">
                              <label for="from_date">From: &nbsp;</label>
                              <input type="date" class="form-control" id="from_date" placeholder="Enter email" name="from_date">
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                              <label for="to_date">To:&nbsp;</label>
                              <input type="date" class="form-control" id="to_date" placeholder="Enter password" name="to_date">
                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                              {{ Form::select('supllier_id',$suppliers_list,null,['id'=>'supplier_id','class'=>'form-control select2','placeholder'=>'Select Supplier']) }}
                            </div>
                        </from>
                    </div>
                    @endcan
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Booking Date</th>
                                <th>Style No</th>
                                <th>Order No</th>
                                <th>Order Qty.</th>
                                <th>Buyer Name</th>
                                <th>Merchandiser Name</th>
                                <th>Supplier Wise</th>
                                <th>In House Report</th>
                                <th>Issue Report</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($store_bookings as $store_booking)
                                {{--{{dd($store_booking)}}--}}
                                <tr role="row" id="tr-{{ $store_booking->id }}" class="odd">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $store_booking->booking_date }}</td>
                                    <td>{{ $store_booking->store_order != null ?$store_booking->store_order->style_no : ''}}</td>
                                    <td>{{ optional($store_booking->store_order)->order_no }}</td>
                                    <td>{{ optional($store_booking->store_order)->order_qty }}</td>
                                    <td>{{ $store_booking->buyer_name !=null ? $store_booking->buyer_name : ''}}</td>
                                    <td>{{ $store_booking->merchandiser_name !=null ?$store_booking->merchandiser_name : ''}}</td>
                                    
                                    <td>
                                        <button onclick="window.open('supplier-wise-products/{{ $store_booking->id }}&'+$('#supplier_id').val(), '_blank')" class="btn btn-sm btn-primary">Search</button>
                                    </td>
                                    <td>
                                        <button onclick="window.open('inhouse-report/{{ $store_booking->id }}/'+$('#from_date').val()+'&'+$('#to_date').val(), '_blank')" class="btn btn-sm btn-primary">Search</button>
                                    </td>
                                    <td>
                                        <button onclick="window.open('issue-report/{{ $store_booking->id }}/'+$('#from_date').val()+'&'+$('#to_date').val(), '_blank')" class="btn btn-sm btn-primary">Search</button>
                                    </td>
                                    

                                    <td>
                                        <a title="Print" style="cursor: pointer;" onclick="window.open('{{url("booking-report")}}/{{ $store_booking->id }}/print','_blank')">
                                            <i class="fa text-success fa-print"></i>
                                        </a>
                                        <a title="View" href="{{ url('report/view-Store-booking',$store_booking->id) }}">
                                            <i class="fa text-success fa-eye"></i>
                                        </a>
                                        @can('store')
                                        <a title="Edit" href="{{ action('store\booking\StoreBookingController@edit',$store_booking->id) }}">
                                        <i class="fa text-success fa-pencil-alt"></i>
                                        </a> &nbsp;  &nbsp;
                                        <button type="button" onclick="Delete('{{ $store_booking->id }}')" class="text-danger"><i class="fa fas fa-trash"></i></button>
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
                          url: "{{url('store/booking-delete/')}}/"+id,
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