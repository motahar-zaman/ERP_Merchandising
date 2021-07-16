@extends('layouts.fixed')

@section('title','Create order')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Create Order</h3>
                            </div>
                            <!-- form start -->
                            <form method="post">
                                @csrf
                                <div class="card-body">
                                    @if($errors->any())
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <div class="form-group row {{ $errors->has('order_name') ? 'has-error' : '' }}">
                                        <label for="order_name" class="col-md-2 offset-1 control-label">Order Name<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" name="order_name" id="order_name" placeholder="place a name" value="">
                                            @if($errors->has('order_name'))<span class="help-block text-danger">{{ $errors->first('order_name') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('day_range') ? 'has-error' : '' }}">
                                        <label for="day_range" class="col-md-2 offset-1 control-label">Day Range<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="number" name="day_range" id="day_range" min="1" max="500" step="1" placeholder="number of days" value="120">
                                            @if($errors->has('day_range'))<span class="help-block text-danger">{{ $errors->first('day_range') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('buyer') ? 'has-error' : '' }}">
                                        <label for="buyer" class="col-md-2 offset-1 control-label">Buyer Select<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <select name="buyer">
                                                <option value="1">Zaman</option>
                                                <option value="2">Farukh</option>
                                                <option value="3">Zubayer</option>
                                                <option value="4">Kunisan</option>
                                                <option value="5">Katakana</option>
                                            </select>
                                            @if($errors->has('buyer'))<span class="help-block text-danger">{{ $errors->first('buyer') }}</span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('time_segment') ? 'has-error' : '' }}">
                                        <label for="time_segment" class="col-md-2 offset-1 control-label">Time Segment<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="number" name="first" id="first" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="second" id="second" min="1" max="100" step="1" placeholder="" value="20">
                                            <input type="number" name="third" id="third" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="forth" id="forth" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="fifth" id="fifth" min="1" max="100" step="1" placeholder="" value="35">
                                            @if($errors->has('day_range'))<span class="help-block text-danger">{{ $errors->first('day_range') }}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
                                    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
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
    <script>
        function resetInputFields(){
            $("#order_name").value("");
            $("#day_range").value("");
            $("#buyer").value("");
        }
    </script>
@stop
