@extends('layouts.fixed')

@section('title','WELL GROUP | All Poly Bookings')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Poly Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Poly Bookings</li>
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
                        <div class="card-header" >
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Budget Sheet Style No.</th>
                                    <th>To</th>
                                    <th>Attn</th>
                                    <th>Subject</th>
                                    <th>Booking Date</th>
                                    <th>Required Del. Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($poly_bookings as $poly)
                                    <tr>
                                        <td>{{$poly->budget_sheet_style != null ? $poly->budget_sheet_style->style : ''}}</td>
                                        <td>{{$poly->to}}</td>
                                        <td>{{$poly->attn}}</td>
                                        <td>{{$poly->sub}}</td>
                                        <td>{{$poly->date}}</td>
                                        <td>{{$poly->req_del_date}}</td>
                                        <td>{{$poly->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/poly-delete',$poly->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ url('report/view-poly-booking-details',$poly->id) }}">
                                                <i class="fa text-success fa-eye"></i>
                                            </a> &nbsp;  &nbsp;
                                            &nbsp;
                                            @can('merchandiser')
                                            <a href="{{ url('report/poly-edit',$poly->id) }}">
                                                <i class="fa text-success fa-pencil-alt"></i>
                                            </a> &nbsp;  &nbsp;
                                            <button type="submit" class="text-danger"><i class="fa fas fa-trash"></i></button>
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


@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

