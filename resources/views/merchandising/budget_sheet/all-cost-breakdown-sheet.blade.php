@extends('layouts.fixed')

@section('title','WELL GROUP | BUDGET SHEET')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CREATE BUDGET SHEET</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">CREATE BUDGET SHEET</li>
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
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="style" name="style" placeholder="Type style code">
                    </div>
                    <div class="card">
                        <div class="card-header table-responsive" >
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Merchandiser</th>
                                    <th>Consumer</th>
                                    <th>Product Description</th>
                                    <th>Style</th>
                                    <th>Size Range</th>
                                    <th>Specification</th>
                                    <th>Estimate Garments</th>
                                    <th>Quantity</th>
                                    @can('merchandiser')
                                    <th>Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($cost_breakdowns as $cost_breakdown)
                                    <tr>
                                        <td>{{$cost_breakdown->country !=null ? $cost_breakdown->country->name : ''}}</td>
                                        <td>{{$cost_breakdown->merchandiser_name}}</td>
                                        <td>{{$cost_breakdown->consumer_name}}</td>
                                        <td>{{$cost_breakdown->product_description}}</td>
                                        <td>{{$cost_breakdown->style}}</td>
                                        <td>{{$cost_breakdown->size_range}}</td>
                                        <td>{{$cost_breakdown->specs}}</td>
                                        <td>{{$cost_breakdown->estimate_garments}}</td>
                                        <td>{{$cost_breakdown->estimate_qty}}</td>
                                        @can('merchandiser')
                                        <td>

                                            {{ Form::open(['action'=>['Merchandise\BudgetSheetController@create',$cost_breakdown->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="submit" class="btn btn-success btn-sm">create</button>
                                            {{ Form::close() }}
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
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
    <script>
        $('#style').keyup(function () {
            var text = $(this).val();
            var csrf = "{{csrf_token()}}";
            $.ajax({
                type:"get",
                url:"{{route('search.style')}}",
                data: {text:text,_token:csrf},
                success:function(data) {
                    $('#cost_breakdowns').html(data);
                }
            })
        });
    </script>
@stop


@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop


