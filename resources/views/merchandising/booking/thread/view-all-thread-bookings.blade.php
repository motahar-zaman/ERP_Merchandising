@extends('layouts.fixed')

@section('title','WELL GROUP | All Thread Bookings')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thread Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thread Bookings</li>
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
                                    <th>Thread Style Name/No.</th>
                                    <th>Booking Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="cost_breakdowns">
                                @foreach($thread_bookings as $thread)
                                    <tr>
                                        <td>{{$thread->budget_sheet_style != null ? $thread->budget_sheet_style->style : ''}}</td>
                                        <td>{{$thread->to}}</td>
                                        <td>{{$thread->attn}}</td>
                                        <td>{{$thread->sub}}</td>
                                        <td>{{$thread->style_no}}</td>
                                        <td>{{$thread->book_date}}</td>
                                        <td>{{$thread->created_at}}</td>
                                        <td>

                                            {{ Form::open(['url'=>['merchandise/thread-delete',$thread->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ url('report/view-thread-booking-details',$thread->id) }}">
                                                <i class="fa text-success fa-eye"></i>
                                            </a> &nbsp;  &nbsp;
                                            &nbsp;
                                            @can('merchandiser')
                                            <a href="{{ url('report/thread-edit',$thread->id) }}">
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

