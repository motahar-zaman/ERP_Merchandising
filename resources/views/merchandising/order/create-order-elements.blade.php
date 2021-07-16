@extends('layouts.fixed')

@section('title','Create order')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Order Elements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Create Order Elements</li>
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
                        <div class="card-info" style="width:95%">
                            <div class="card-header">
                                <h3 class="card-title">Create Order Elements</h3>
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

                                    <div id="elements">
                                        <div class="pt-4">
                                            <h4>Enter Elements Details</h4>
                                            <div class="form-group row {{ $errors->has('element_name') ? 'has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <input type="text" name="element_name[]" id="element_name" placeholder="element name" value="" required>
                                                    <span class="text-danger pr-2">*</span>
                                                    <input type="number" name="quantity[]" id="quantity" min="1" max="500000" step="1" placeholder="quantity" required>
                                                    <span class="text-danger pr-2">*</span>
                                                    <input type="text" name="size[]" id="size" placeholder="size" value="">
                                                    <span class="pr-3"></span>
                                                    <input type="text" name="color[]" id="color" placeholder="color" value="">
                                                    <span class="pr-3"></span>
                                                    <input type="text" name="type[]" id="type" placeholder="type" value="">
                                                    @if($errors->has('element_name'))<span class="help-block text-danger">{{ $errors->first('element_name') }}</span>@endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5 mb-3 element_add_area">
                                        <div class="col-md-2 offset-4">
                                            <a href="javascript:;" class="btn btn-outline-info add_element"><i class="fa fa-plus" aria-hidden="true"> </i> Add Elements</a>
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
        $(document).ready(function(){
            $('.add_element').on('click', function(){
                var content = $('#elements').html();
                $('.element_add_area').before(content);
            })
        });
    </script>
@stop
