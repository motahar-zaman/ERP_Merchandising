@extends('layouts.fixed')

@section('title','WELL GROUP | Line Loading Plan')

@section('content')
<style type="text/css">
    .tableFixHead          { overflow-y: auto !important; max-height: 750px !important; }
    .tableFixHead thead th { position: sticky !important; top: 0 !important; }

    /* Just common table stuff. Really. */
    table  { border-collapse: collapse !important; width: 100% !important; }
    th, td { padding: 8px 16px !important; }
    th     { background:#eee !important; }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Line Loading Plan&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ url('line-loading-plan/create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Line Loading Plan</li>
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
                        <div  class="tableFixHead card-body table-responsive p-0">
                            <table class="table table-bordered table-hover text-nowrap" >
                                <thead id="stickyHeader">
                                    <tr>
                                        @php 
                                            $lineLoadings = lineLoading();
                                            $current_year = date('Y');
                                            $start_year = $current_year.'-01-01';
                                            $end_year = date('Y',strtotime($current_year.'+2 years')).'-01-01';
                                            $period = new DatePeriod(
                                                 new DateTime($start_year),
                                                 new DateInterval('P1D'),
                                                 new DateTime($end_year)
                                            );
                                        @endphp
                                        <th>Action</th>
                                        @foreach($lineLoadings as $value)
                                        <th>{{ $value }}</th>
                                        @endforeach
                                        <th>Target</th>
                                        @foreach($period as $key => $element)
                                            <th>{{ $element->format('d/M') }} ({{ $element->format('Y') }})</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody id="line_loading_plan">
                                @if(isset($line_loading_plan[0]->id))
                                @foreach($line_loading_plan as $value)
                                    <tr class="tr-{{ $value->id }}">
                                        <td>
                                            <a title="View/Edit" href="{{ url('line-loading-plan') }}/view/{{ $value->id }}" class="btn bg-info btn-sm" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a title="Delete" onclick="Delete('{{$value->id}}')" class="btn bg-danger btn-sm" role="button">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{optional($value->factory)->name}}</td>
                                        <td>{{$value->floor}}</td>
                                        <td>{{$value->line_no}}</td>
                                        <td>{{optional($value->buyer)->name}}</td>
                                        <td>{{optional($value->style)->style}}</td>
                                        <td>{{optional($value->item)->name}}</td>
                                        <td>{{$value->quantity}}</td>
                                        <td>{{$value->with_percent}}</td>
                                        <td>{{$value->allot_qty}}</td>
                                        <td>{{$value->mc_use}}</td>
                                        <td>{{$value->manpower}}</td>
                                        <td>{{$value->smv}}</td>
                                        <td>{{$value->avg_prod}}</td>
                                        <td>{{$value->days_total}}</td>
                                        <td>{{$value->eff_avg}}</td>
                                        <td>{{$value->avl_min_1}}</td>
                                        <td>{{$value->avl_min_2}}</td>
                                        <td>Target Efficiency</td>
                                        @php 
                                            $date_with_efficiency = json_decode($value->date_with_efficiency, true);
                                        @endphp
                                        @foreach($period as $key => $element)
                                            <td>
                                                @if(array_key_exists($element->format('Y-m-d'), $date_with_efficiency))
                                                {{ $date_with_efficiency[$element->format('Y-m-d')] }} %
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr class="tr-{{ $value->id }}">
                                        <td colspan="18"></td>
                                        <td>Target Output</td>
                                        @foreach($period as $key => $element)
                                            <td>
                                            @if(array_key_exists($element->format('Y-m-d'), $date_with_efficiency))
                                            {{ round(($date_with_efficiency[$element->format('Y-m-d')]*3033)/100) }}
                                            @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr class="tr-{{ $value->id }}">
                                        <td colspan="18"></td>
                                        <td>Cumulative Output</td>
                                        @php
                                            $cumulative_output = 0;
                                        @endphp
                                        @foreach($period as $key => $element)
                                            <td>
                                            @if(array_key_exists($element->format('Y-m-d'), $date_with_efficiency))
                                            @php
                                                $cumulative_output += round(($date_with_efficiency[$element->format('Y-m-d')]*3033)/100) ;
                                            @endphp
                                            {{ $cumulative_output }}
                                            @endif
                                            </td>
                                        @endforeach
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
    <link rel="stylesheet" href="{{ url('public/plugins/datatables/dataTables.bootstrap4.css') }}">
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
                    $('#line_loading_plan').html(data);
                }
            })
        });

        function Edit(id){
            $.alert({
                 title: 'Edit Line Loading Plan',
                 content: "url:{{url('bookingPlan/edit-store/')}}/"+id,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        $('#line_loading_plan_form').submit();
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
                      url: "{{url('line-loading-plan/delete/')}}/"+id,
                      type: 'GET',
                      dataType: 'json',
                      success:function(response) {
                        if(response.success){
                          $('.tr-'+id).fadeOut();
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
    <script src="{{ url('public/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('public/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

