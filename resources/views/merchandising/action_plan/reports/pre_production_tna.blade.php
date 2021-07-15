@extends('layouts.fixed')

@section('title','WELL GROUP | Pre Production T&A')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pre Production T&A&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('actionPlan/pre_production_act') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pre Production T&A</li>
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
                                    <th colspan="2">SIZE SET READY DATE</th>
                                    <th colspan="2">PP Meeting Date</th>
                                    <th colspan="2">Bulk Cut Date</th>
                                    <th colspan="2">Sweing Start Date</th>
                                    <th colspan="2">Sweing Finish Date</th>
                                    <th colspan="2">Washing Date</th>
                                    <th colspan="2">Finishig Packing Date</th>
                                    <th colspan="2">Final Inspection date</th>
                                    <th colspan="2">Ex Factory</th>
                                    <th colspan="2">Remarks</th>
                                </tr>
                                 <tr>
                                    <th colspan="3"></th>
                                    @for($i = 0; $i < 9; $i++)
                                    <th>Plan</th>
                                    <th>Actual</th>
                                    @endfor
                                </tr>
                                </thead>
                                <tbody id="pre_production_tna">
                                @if(isset($pre_production_tna[0]->id))
                                @foreach($pre_production_tna as $value)
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
                                        <td>{{$value->size_ready_date}}</td>
                                        <td>{{$value->actual_size_ready_date}}</td>
                                        <td>{{$value->pp_meeting_date}}</td>
                                        <td>{{$value->actual_pp_meeting_date}}</td>
                                        <td>{{$value->bulk_cut_date}}</td>
                                        <td>{{$value->actual_bulk_cut_date}}</td>
                                        <td>{{$value->sewing_start}}</td>
                                        <td>{{$value->actual_sewing_start}}</td>
                                        <td>{{$value->sewing_finish}}</td>
                                        <td>{{$value->actual_sewing_finish}}</td>
                                        <td>{{$value->washing_date}}</td>
                                        <td>{{$value->actual_washing_date}}</td>
                                        <td>{{$value->finishing_packing}}</td>
                                        <td>{{$value->actual_finishing_packing}}</td>
                                        <td>{{$value->final_inspection}}</td>
                                        <td>{{$value->actual_final_inspection}}</td>
                                        <td>{{$value->ex_factory}}</td>
                                        <td>{{$value->actual_ex_factory}}</td>
                                        <td>{{$value->remarks}}</td>


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
                    $('#pre_production_tna').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit Pre Production T&A',
                 content: "url:{{url('actionPlan/reports/pre-production-tna/edit/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#pre_production_tna_form').submit();
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
                      url: "{{url('actionPlan/reports/pre-production-tna/delete/')}}/"+id,
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

