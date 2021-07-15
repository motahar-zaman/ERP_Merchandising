@extends('layouts.fixed')

@section('title','WELL GROUP | Booking Plan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking Plan&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('bookingPlan/create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Booking Plan</li>
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
                    <div class="card">
                        <div class="card-header table-responsive p-0" >
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                     @php 
                                        $bookingPlan = bookingPlan();
                                    @endphp
                                    @foreach($bookingPlan as $tna)
                                    <th>{{ $tna }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="booking_plan">
                                @if(isset($booking_plan[0]->id))
                                @foreach($booking_plan as $value)
                                    <tr id="tr-{{ $value->id }}">
                                        <td>
                                            <a title="View" href="{{ url('bookingPlan/view-report/') }}/{{ $value->id }}" class="btn bg-success btn-sm" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a title="Edit" onclick="Edit('{{ $value->id }}')" class="btn bg-info btn-sm" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Delete" onclick="Delete('{{$value->id}}')" class="btn bg-danger btn-sm" role="button">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->lc_factory}}</td>
                                        <td>{{optional($value->buyer)->name}}</td>
                                        <td>{{optional($value->style)->style}}</td>
                                        <td>{{$value->item}}</td>
                                        <td>{{$value->merchandiser}}</td>
                                        <td>{{$value->merchandiser_head}}</td>
                                        <td>{{$value->sketch_or_sample}}</td>
                                        <td>{{$value->smv}}</td>
                                        <td>{{$value->quantity}}</td>
                                        <td>{{$value->order_season}}</td>
                                        <td>{{$value->input_date}}</td>
                                        <td>{{$value->ex_factory}}</td>
                                        <td>{{$value->wash}}</td>
                                        <td>{{$value->emblishment}}</td>
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
                    $('#booking_plan').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit Booking Plan',
                 content: "url:{{url('bookingPlan/edit-store/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#booking_plan_form').submit();
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
                      url: "{{url('bookingPlan/delete/')}}/"+id,
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

