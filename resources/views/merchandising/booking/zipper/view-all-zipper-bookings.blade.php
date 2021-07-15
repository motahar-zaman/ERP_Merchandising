@extends('layouts.fixed')

@section('title','WELL GROUP | All Zipper Bookings')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Zipper Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Zipper Bookings</li>
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
                                    <th>Zipper Style No.</th>
                                    <th>To</th>
                                    <th>Attn</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($zipper_bookings as $zipper)
                                    <tr>
                                        <td>{{$zipper->budget_sheet_style != null ? $zipper->budget_sheet_style->style : ''}}</td>
                                        <td>{{$zipper->style_no}}</td>
                                        <td>{{$zipper->to}}</td>
                                        <td>{{$zipper->attn}}</td>
                                        <td>{{$zipper->sub}}</td>
                                        <td>{{$zipper->date}}</td>
                                        <td>{{$zipper->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/zipper-delete',$zipper->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ url('report/view-zipper-booking-details',$zipper->id) }}">
                                                <i class="fa text-success fa-eye"></i>
                                            </a> &nbsp;  &nbsp;
                                            &nbsp;
                                            @can('merchandiser')
                                            <a href="{{ url('report/zipper-edit',$zipper->id) }}">
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

