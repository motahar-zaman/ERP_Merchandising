@extends('layouts.fixed')

@section('title','WELL GROUP | ORDER SUMMARY DETAILS')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Summary DETAILS&nbsp;&nbsp;&nbsp;<a class="btn bg-success" onclick="Add()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Summary DETAILS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="col-md-12">
                    {{-- <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="style" name="style" placeholder="Type style code">
                    </div> --}}
                    <div class="card">
                        <div class="card-header table-responsive p-0" >
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Order No</th>
                                    <th>Color Name</th>
                                    <th>APPROVED FOB PRICE(PCS)</th>
                                    <th>APPROVED CM PRICE(PCS)</th>
                                    <th>Quantity(PCS)</th>
                                    <th>Ship Date</th>
                                </tr>
                                </thead>
                                <tbody id="order_summary_details">
                                @if(isset($order_summary_details[0]->id))
                                @foreach($order_summary_details as $value)
                                    <tr id="tr-{{ $value->id }}">
                                        <td>
                                            <a title="Edit" onclick="Edit('{{ $value->id }}')" class="btn bg-info btn-sm" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Delete" onclick="Delete('{{$value->id}}')" class="btn bg-danger btn-sm" role="button">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{$value->order_summary_id}}</td>
                                        <td>{{$value->color_name}}</td>
                                        <td>{{$value->fob_price_pcs}}</td>
                                        <td>{{$value->cm_price_pcs}}</td>
                                        <td>{{$value->quantity_pcs}}</td>
                                        <td>{{$value->ship_date}}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('script')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        $('#style').keyup(function () {
            var text = $(this).val();
            var csrf = "{{csrf_token()}}";
            $.ajax({
                type:"get",
                url:"{{route('search.style')}}",
                data: {text:text,_token:csrf},
                success:function(data) {
                    $('#order_summary_details').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit Order Summary DETAILS',
                 content: "url:{{url('actionPlan/reports/order-summary-details/edit/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#order_summary_details_form').submit();
                     }
                   },
                   close: {
                     text: 'Close',
                     btnClass: 'btn-default',
                   },
                }
           });
        }

        function Add(id){
            $.alert({
                 title: 'Add Order Summary DETAILS',
                 content: "url:{{url('actionPlan/reports/order-summary-details/add')}}",
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#order_summary_details_form').submit();
                     }
                   },
                   close: {
                     text: 'Close',
                     btnClass: 'btn-default',
                   },
                }
           });
        }

        function Delete(id) {
        $.confirm({
            title: 'Confirm!',
            content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
            buttons: {
                confirm: function () {
                    $.ajax({
                      url: "{{url('actionPlan/reports/order-summary-details/delete/')}}/"+id,
                      type: 'GET',
                      dataType: 'json',
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


@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

