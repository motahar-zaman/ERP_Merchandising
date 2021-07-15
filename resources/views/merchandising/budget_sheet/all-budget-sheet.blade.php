@extends('layouts.fixed')

@section('title','WELL GROUP | BUDGET SHEETS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ALL BUDGET SHEET</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ALL BUDGET SHEET</li>
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
                        <div class="card-header" >
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Merchandiser</th>
                                    <th>Consumer</th>
                                    <th>Product Description</th>
                                    <th>Style</th>
                                    <th>Quantity</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="budget_sheet">
                                @foreach($budget_sheets as $budget_sheet)
                                    <tr>
                                        <td>{{ $budget_sheet->country != null ? $budget_sheet->country->name  : '' }}</td>
                                        <td>{{$budget_sheet->merchandiser_name}}</td>
                                        <td>{{$budget_sheet->consumer_name}}</td>
                                        <td>{{$budget_sheet->product_description}}</td>
                                        <td>{{$budget_sheet->style}}</td>
                                        <td>{{$budget_sheet->estimate_qty}}</td>
                                        <td>{{$budget_sheet->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/budget-sheet-delete',$budget_sheet->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}

                                            <a href="{{ url('report/view-budget-sheet-details',$budget_sheet->id) }}" role="button" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @can('merchandiser')
                                            <a href="{{url('merchandise/budget-sheet-edit',$budget_sheet->id) }}" role="button" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                            @endcan
                                        </td>
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
                url:"{{route('budget.search.style')}}",
                data: {text:text,_token:csrf},
                success:function(data) {
                    $('#budget_sheet').html(data);
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


