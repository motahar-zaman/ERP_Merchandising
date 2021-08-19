@extends('layouts.fixed')

@section('title','Edit Merchandiser')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Merchandiser</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Merchandiser</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="col-12">
            <div class="card"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Merchandiser</h3>
                            </div>
                            <form method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name" class="col-md-3 offset-1 control-label">Name<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="hidden" name="merchandiserId" id="merchandiserId" value="{{$merchandiser->id}}">
                                            <input type="text" class="form-control" name="name" id="style_name" placeholder="merchandiser name" value="{{$merchandiser->name}}" required>
                                            @if($errors->has('name'))<span class="help-block text-danger">{{ $errors->first('name') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email" class="col-md-3 offset-1 control-label">Email<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="merchandiser email" value="{{$merchandiser->email}}" required>
                                            @if($errors->has('email'))<span class="help-block text-danger">{{ $errors->first('email') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label for="phone" class="col-md-3 offset-1 control-label">Phone no<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="merchandiser phone no" value="{{$merchandiser->phone_no}}" required>
                                            @if($errors->has('phone'))<span class="help-block text-danger">{{ $errors->first('phone') }}</span>@endif
                                        </div>
                                    </div>


                                    <div class="form-group row {{ $errors->has('designation') ? 'has-error' : '' }}">
                                        <label for="designation" class="col-md-3 offset-1 control-label">Designation<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" class="form-control" name="designation" id="designation" placeholder="merchandiser designation" value="{{$merchandiser->designation}}" required>
                                            @if($errors->has('designation'))<span class="help-block text-danger">{{ $errors->first('designation') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                        <label for="remarks" class="col-md-3 offset-1 control-label">Remarks<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" class="form-control" name="remarks" id="remarks" placeholder="remarks" value="{{$merchandiser->remarks}}" required>
                                            @if($errors->has('remarks'))<span class="help-block text-danger">{{ $errors->first('remarks') }}</span>@endif
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
            </div>
        </div>
    </section>
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
        $(document).ready(function(){
        });
    </script>
@stop
