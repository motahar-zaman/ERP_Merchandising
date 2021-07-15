@extends('layouts.fixed')

@section('title','WELL GROUP | All Tag Bookings')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Tag Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Tag Bookings</li>
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
                                    <th>Hangtag Style</th>
                                    <th>Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($hangtag_bookings as $hangtag)
                                    <tr>
                                        <td>{{$hangtag->budget_sheet_style != null ? $hangtag->budget_sheet_style->style : ''}}</td>
                                        <td>{{$hangtag->to}}</td>
                                        <td>{{$hangtag->attn}}</td>
                                        <td>{{$hangtag->sub}}</td>
                                        <td>{{$hangtag->style}}</td>
                                        <td>{{$hangtag->date}}</td>
                                        <td>{{$hangtag->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/hangtag-delete',$hangtag->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ url('report/view-hangtag-booking-details',$hangtag->id) }}">
                                                <i class="fa text-success fa-eye"></i>
                                            </a> &nbsp;  &nbsp;
                                            &nbsp;
                                            @can('merchandiser')
                                            <a href="{{ url('report/hangtag-edit',$hangtag->id) }}">
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

