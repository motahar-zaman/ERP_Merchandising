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
                                    <div class="form-group row {{ $errors->has('style_name') ? 'has-error' : '' }}">
                                        <label for="style_name" class="col-md-3 offset-1 control-label">Style Name<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" name="style_name" id="style_name" placeholder="style name" value="" required>
                                            @if($errors->has('style_name'))<span class="help-block text-danger">{{ $errors->first('style_name') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('order_no') ? 'has-error' : '' }}">
                                        <label for="order_no" class="col-md-3 offset-1 control-label">Order No<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" name="order_no" id="order_no" placeholder="order no" value="" required>
                                            @if($errors->has('order_no'))<span class="help-block text-danger">{{ $errors->first('order_no') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="description" class="col-md-3 offset-1 control-label">Description<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" name="description" id="description" placeholder="description" value="" required>
                                            @if($errors->has('description'))<span class="help-block text-danger">{{ $errors->first('description') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('delivery_date') ? 'has-error' : '' }}">
                                        <label for="delivery_date" class="col-md-3 offset-1 control-label">delivery_date<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="date" name="delivery_date" id="delivery_date" placeholder="dd-mm-yyyy" value="" required>
                                            @if($errors->has('delivery_date'))<span class="help-block text-danger">{{ $errors->first('delivery_date') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('buyer') ? 'has-error' : '' }}">
                                        <label for="buyer" class="col-md-3 offset-1 control-label">Buyer Select<span class="text-danger">*</span></label>
                                        <div class="col-md-3 pl-0 pr-0">
                                            <select name="buyer">
                                                <option value="1">Zaman</option>
                                                <option value="2">Farukh</option>
                                                <option value="3">Zubayer</option>
                                                <option value="4">Kunisan</option>
                                                <option value="5">Katakana</option>
                                            </select>
                                            @if($errors->has('buyer'))<span class="help-block text-danger">{{ $errors->first('buyer') }}</span>@endif
                                        </div>
                                        <div class="col-md-1 pl-0">
                                            Or
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{url("merchandise/add-buyer")}}" class="btn btn-outline-info add_size_quantity"><i class="fa fa-plus" aria-hidden="true"> </i> Add Buyer</a>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('day_range') ? 'has-error' : '' }}">
                                        <label for="day_range" class="col-md-3 offset-1 control-label">Day Range</label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="number" name="day_range" id="day_range" min="1" max="500" step="1" placeholder="number of days" value="120">
                                            @if($errors->has('day_range'))<span class="help-block text-danger">{{ $errors->first('day_range') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('time_segment') ? 'has-error' : '' }}">
                                        <label for="time_segment" class="col-md-3 offset-1 control-label">Time Segment</label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="number" name="first" id="first" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="second" id="second" min="1" max="100" step="1" placeholder="" value="20">
                                            <input type="number" name="third" id="third" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="forth" id="forth" min="1" max="100" step="1" placeholder="" value="15">
                                            <input type="number" name="fifth" id="fifth" min="1" max="100" step="1" placeholder="" value="35">
                                            @if($errors->has('day_range'))<span class="help-block text-danger">{{ $errors->first('day_range') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('order_quantity') ? 'has-error' : '' }}">
                                        <label for="order_quantity" class="col-md-3 offset-1 control-label">Size Quantity</label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" name="size[]" placeholder="size" value="">
                                            <span class="mr-2"></span>
                                            <input onchange="totalQuantity()" class="quantity" type="number" name="quantity[]" step="1" placeholder="quantity" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group row element_add_area">
                                        <label for="total_quantity" class="col-md-3 offset-1 control-label">Total Quantity</label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" name="total_quantity" id="total_quantity" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 offset-4">
                                            <a href="javascript:;" class="btn btn-outline-info add_size_quantity"><i class="fa fa-plus" aria-hidden="true"> </i> Add Size</a>
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
        $(document).ready(function(){
            $('.add_size_quantity').on('click', function(){
                var content = '<div class="form-group row {{ $errors->has('order_quantity') ? 'has-error' : '' }}">'+
                    '<label for="order_quantity" class="col-md-3 offset-1 control-label">Size Quantity<span class="text-danger">*</span></label>'+
                    '<div class="col-md-8 pl-0 pr-0">'+
                    '<input type="text" name="size[]" placeholder="size" value="">'+
                    '<span class="mr-2"></span>'+
                    '<input onchange="totalQuantity()" class="quantity" type="number" name="quantity[]" step="1" placeholder="quantity" value="0">'+
                    '</div>'+
                    '</div>';
                $('.element_add_area').before(content);
            })
        });

        function totalQuantity(){
            let sum = 0;
            /*let values = $("input[name='quantity[]']").map(function(){return parseFloat($(this).val());}).get();
            for (let i = 0; i < values.length; i++) {
                sum += values[i];
            }*/

            $('.quantity').each(function (index, element) {
                sum += parseFloat($(element).val());
            });

            $("#total_quantity").val(sum);
        }
    </script>
@stop
