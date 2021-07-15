@extends('layouts.fixed')

@section('title','WELL GROUP | Efficiency')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Efficiency&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('line-loading-plan/efficiency/create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Efficiency</li>
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
                            <table class="table text-center table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Efficiency</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="efficiency">
                                @if(isset($efficiency[0]->id))
                                @foreach($efficiency as $value)
                                    <tr id="tr-{{ $value->id }}">
                                        <td>
                                            @if($value->day == 1) 
                                                {{$value->day}}<sup>st</sup> Day
                                            @elseif($value->day == 2)
                                                {{$value->day}}<sup>nd</sup> Day
                                            @elseif($value->day == 3)
                                                {{$value->day}}<sup>rd</sup> Day
                                            @else
                                                {{$value->day}}<sup>th</sup> Day
                                            @endif

                                            </td>
                                        <td>{{$value->efficiency}} %</td>
                                        <td>
                                            <a title="Edit" href=" {{ url('line-loading-plan/efficiency') }}/{{  $value->id }}/edit" class="btn bg-info btn-sm" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Delete" onclick="Delete('{{$value->id}}')" class="btn bg-danger btn-sm" role="button">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
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
@section('script')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        function Delete(id) {
        $.confirm({
            title: 'Confirm!',
            content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
            buttons: {
                confirm: function () {
                    $.ajax({
                      headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                      url: "{{url('line-loading-plan/efficiency')}}/"+id,
                      type: 'DELETE',
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
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop


