@extends('layouts.fixed')

@section('title','AdminLTE')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Designation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Supplier</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">

            <div class="card"><br>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <h2 class="text-info text-center">Add Designation</h2>
                            {!! Form::model($grade,['route'=>['grade.update',$grade->id],'method'=>'POST', 'class'=>'form-horizontal']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('details', 'Designation Name', ['class'=>'label-control'])}}
                                {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Enter Designation name','autofocus','required']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                {{ Form::label('details', 'Description', ['class'=>'label-control'])}}
                                {{ Form::textarea('details',old('details'),['class'=>'form-control','placeholder'=>'shortly Brief about Grade','rows'=>5,'cols'=>5]) }}
                                @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="">
                                    {{ Form::submit('Update Grade',['class'=>'btn btn-success']) }} &nbsp; &nbsp; <a href="{{ route('grades') }}" class="btn btn-danger">Edit Cancel</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
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

@section('script')
    <!-- page script -->

@stop
