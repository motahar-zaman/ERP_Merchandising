@extends('layouts.fixed')

@section('title','WELL GROUP | Sample T&A')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sample T&A&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('actionPlan/sample_tna') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sample T&A</li>
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
                                    <th>order No</th>
                                    <th>Color Name</th>
                                    <th colspan="2">1ST FIT SUBMISSION DATE</th>
                                    <th colspan="2">2ND FIT SUBMISSION DATE</th>
                                    <th colspan="2">3RD FIT SUBMISSION DATE</th>
                                    <th colspan="2">FIT APPROVED COMMENTS RECEIVE DATE</th>
                                    <th colspan="2">1ST WASH SUBMISSION DATE</th>
                                    <th colspan="2">2ND WASH SUBMISSION DATE</th>
                                    <th colspan="2">3RD WASH SUBMISSION DATE</th>
                                    <th colspan="2">WASH APPROVED COMMENTS RECEIVE DATE</th>
                                    <th colspan="2">SIZE SET SUBMISSION DATE</th>
                                    <th colspan="2">SIZE SET APPROVED COMMENTS RECEIVE DATE</th>
                                    <th colspan="2">1ST P.P SUBMISSION DATE</th>
                                    <th colspan="2">2ND P.P SUBMISSION DATE </th>
                                    <th colspan="2">3RD P.P SUBMISSION DATE </th>
                                    <th colspan="2">PP APPROVED COMMENTS RECEIVE DATE</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    @for($i = 0; $i < 14; $i++)
                                    <th>Plan</th>
                                    <th>Actual</th>
                                    @endfor
                                </tr>
                                </thead>
                                <tbody id="sample_tna">
                                @if(isset($sample_tna[0]->id))
                                @foreach($sample_tna as $value)
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
                                        <td>{{$value->first_fit_submission}}</td>
                                        <td>{{$value->actual_first_fit_submission}}</td>
                                        <td>{{$value->second_fit_submission}}</td>
                                        <td>{{$value->actual_second_fit_submission}}</td>
                                        <td>{{$value->third_fit_submission}}</td>
                                        <td>{{$value->actual_third_fit_submission}}</td>
                                        <td>{{$value->fit_approved_date}}</td>
                                        <td>{{$value->actual_fit_approved_date}}</td>
                                        <td>{{$value->first_wash_sub_date}}</td>
                                        <td>{{$value->actual_first_wash_sub_date}}</td>
                                        <td>{{$value->second_wash_sub_date}}</td>
                                        <td>{{$value->actual_second_wash_sub_date}}</td>
                                        <td>{{$value->third_wash_sub_date}}</td>
                                        <td>{{$value->actual_third_wash_sub_date}}</td>
                                        <td>{{$value->wash_app_comm_rcv_date}}</td>
                                        <td>{{$value->actual_wash_app_comm_rcv_date}}</td>
                                        <td>{{$value->size_set_sub_date}}</td>
                                        <td>{{$value->actual_size_set_sub_date}}</td>
                                        <td>{{$value->size_set_rcv_date}}</td>
                                        <td>{{$value->actual_size_set_rcv_date}}</td>
                                        <td>{{$value->first_pp_sub_date}}</td>
                                        <td>{{$value->actual_first_pp_sub_date}}</td>
                                        <td>{{$value->second_pp_sub_date}}</td>
                                        <td>{{$value->actual_second_pp_sub_date}}</td>
                                        <td>{{$value->third_pp_sub_date}}</td>
                                        <td>{{$value->actual_third_pp_sub_date}}</td>
                                        <td>{{$value->pp_approved_date}}</td>
                                        <td>{{$value->actual_pp_approved_date}}</td>
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
                    $('#sample_tna').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit Sample T&A',
                 content: "url:{{url('actionPlan/reports/sample-tna/edit/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#sample_tna_form').submit();
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
                      url: "{{url('actionPlan/reports/sample-tna/delete/')}}/"+id,
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

