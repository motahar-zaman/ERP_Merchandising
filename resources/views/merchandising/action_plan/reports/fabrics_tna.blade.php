@extends('layouts.fixed')

@section('title','WELL GROUP | FABRIC TNA')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FABRIC TNA&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('actionPlan/fabrics_tna') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">FABRIC TNA</li>
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
                                    <th colspan="3"></th>
                                    <th style="text-align: center;" colspan="5">Shell</th>
                                    <th style="text-align: center;" colspan="5">Trims</th>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <th>Order No</th>
                                    <th>Color Name</th>
                                    <th>Booking Date</th>
                                    <th>Plan Inhouse Date</th>
                                    <th>Actual Date</th>
                                    <th>Origin</th>
                                    <th>Supplier Name</th>
                                    <th>Booking Date</th>
                                    <th>Plan Inhouse Date</th>
                                    <th>Actual Date</th>
                                    <th>Origin</th>
                                    <th>Supplier Name</th>
                                </tr>
                                </thead>
                                <tbody id="fabrics_tna">
                                @if(isset($fabrics_tna[0]->id))
                                @foreach($fabrics_tna as $value)
                                    <tr id="tr-{{ $value->id }}">
                                        <td>
                                            <a title="Edit" onclick="Edit('{{ $value->id }}')" class="btn bg-info btn-sm" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Delete" onclick="Delete('{{$value->id}}')" class="btn bg-danger btn-sm" role="button">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{$value->order_summary_style}}</td>
                                        <td>{{$value->color_name}}</td>
                                        <td>{{$value->shell_booking_date}}</td>
                                        <td>{{$value->shell_plan_inhouse_date}}</td>
                                        <td>{{$value->shell_actual_inhouse_date}}</td>
                                        <td>{{$value->shell_origin_country}}</td>
                                        <td>{{$value->shell_app_supplier_name}}</td>
                                        <td>{{$value->trims_booking_date}}</td>
                                        <td>{{$value->trims_plan_inhouse_date}}</td>
                                        <td>{{$value->trims_actual_inhouse_date}}</td>
                                        <td>{{$value->trims_origin_country}}</td>
                                        <td>{{$value->trims_app_supplier_name}}</td>
                                        
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
                    $('#fabrics_tna').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit FABRIC TNA',
                 content: "url:{{url('actionPlan/reports/fabrics-tna/edit/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#fabrics_tna_form').submit();
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
                      url: "{{url('actionPlan/reports/fabrics-tna/delete/')}}/"+id,
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

