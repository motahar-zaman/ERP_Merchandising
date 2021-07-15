@extends('layouts.fixed')

@section('title','WELL GROUP | All Other Bookings')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Other Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Other Bookings</li>
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
                                    <th>Item</th>
                                    <th>To</th>
                                    <th>Attn</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($other_bookings as $other)
                                    <tr>
                                        <td>{{$other->budget_sheet_style != null ? $other->budget_sheet_style->style : ''}}</td>
                                        <td>{{$other->item}}</td>
                                        <td>{{$other->to}}</td>
                                        <td>{{$other->attn}}</td>
                                        <td>{{$other->sub}}</td>
                                        <td>{{$other->date}}</td>
                                        <td>{{$other->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/other-delete',$other->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ url('report/view-other-booking-details',$other->id) }}">
                                                <i class="fa text-success fa-eye"></i>
                                            </a> &nbsp;  &nbsp;
                                            &nbsp;
                                            @can('merchandiser')
                                            <a href="{{ url('report/other-edit',$other->id) }}">
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

