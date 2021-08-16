@extends('layouts.fixed')

@section('title','Edit Order')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
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
                                <h3 class="card-title">Edit Order</h3>
                            </div>
                            <form method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row {{ $errors->has('style_name') ? 'has-error' : '' }}">
                                        <label for="style_name" class="col-md-3 offset-1 control-label">Style Name<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="hidden" name="orderId" id="orderId" value="{{$order->id}}">
                                            <input type="text" class="form-control" name="style_name" id="style_name" placeholder="style name" value="{{$order->style_name}}" required>
                                            @if($errors->has('style_name'))<span class="help-block text-danger">{{ $errors->first('style_name') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('order_no') ? 'has-error' : '' }}">
                                        <label for="order_no" class="col-md-3 offset-1 control-label">Order No<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" class="form-control" name="order_no" id="order_no" placeholder="order no" value="{{$order->order_no}}" required>
                                            @if($errors->has('order_no'))<span class="help-block text-danger">{{ $errors->first('order_no') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="description" class="col-md-3 offset-1 control-label">Description<span class="text-danger">*</span></label>
                                        <div class="col-md-8 pl-0 pr-0">
                                            <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{$order->order_name}}" required>
                                            @if($errors->has('description'))<span class="help-block text-danger">{{ $errors->first('description') }}</span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('buyer') ? 'has-error' : '' }}">
                                        <label for="buyer" class="col-md-3 offset-1 control-label">Buyer Select<span class="text-danger">*</span></label>
                                        <div class="col-md-5 pl-0 pr-0">
                                            <select name="buyer" placeholder="Select a buyer" required>
                                                <option value=""></option>
                                                @foreach($buyers as $buyer)
                                                    <option value="{{$buyer->id}}" <?php if($order->buyer_id == $buyer->id) echo "selected"?>>{{$buyer->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('buyer'))<span class="help-block text-danger">{{ $errors->first('buyer') }}</span>@endif
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <label>Or</label>
                                        </div>
                                        <div class="col-md-2 pl-0">
                                            <a href="{{url("merchandise/add-buyer")}}" class="btn btn-outline-info">
                                                <i class="fa fa-plus" aria-hidden="true"> </i> Add Buyer
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="delivery_date" class="col-md-3 offset-1 control-label">Delivery Date<span class="text-danger">*</span></label>
                                        <div class="col-md-4 pl-0 pr-0">
                                            <input onchange="calculateDayRange()" type="date" class="form-control" name="delivery_date" id="delivery_date" placeholder="dd-mm-yyyy" value="{{$order->delivery_date}}" required>
                                            @if($errors->has('delivery_date'))<span class="help-block text-danger">{{ $errors->first('delivery_date') }}</span>@endif
                                        </div>
                                        <?php
                                            $from = strtotime(date('Y-m-d'));
                                            $to = strtotime($order->delivery_date);
                                            $diff = ceil(($to - $from) / (3600 * 24));
                                        ?>
                                        <div class="col-md-4 pl-4">
                                            <label>Left <span id="day_range">{{$diff}}</span> days </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="time_segment" class="col-md-3 offset-1 control-label">Time Segment</label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="pr-2">
                                                    <input type="number" class="form-control" name="first" id="first" min="1" max="100" step="1" placeholder="" value="15">
                                                </div>
                                                <div class="pr-2">
                                                    <input type="number" class="form-control" name="third" id="third" min="1" max="100" step="1" placeholder="" value="15">
                                                </div>
                                                <div class="pr-2">
                                                    <input type="number" class="form-control" name="forth" id="forth" min="1" max="100" step="1" placeholder="" value="15">
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" name="fifth" id="fifth" min="1" max="100" step="1" placeholder="" value="35">
                                                </div>
                                            </div>
                                            @if($errors->has('day_range'))<span class="help-block text-danger">{{ $errors->first('day_range') }}</span>@endif
                                        </div>
                                    </div>

                                    <?php
                                        $totalQuantity = 0;
                                        foreach($order->sizeQuantity as $size){
                                            $totalQuantity += $size->quantity;
                                    ?>
                                            <div class="form-group row">
                                                <label for="order_quantity" class="col-md-3 offset-1 control-label">Size & Quantity</label>
                                                <div class="col-md-4 pl-0">
                                                    <input type="hidden" name="sizeId[]" value="{{$size->id}}">
                                                    <input type="text" class="form-control" name="size[]" placeholder="size" value="{{$size->size_name}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <input onchange="totalQuantity()" class="form-control quantity" type="number" name="quantity[]" step="1" placeholder="quantity" value="{{$size->quantity}}">
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>

                                    <div class="row element_add_area justify-content-center mb-3">
                                        <label>Total Quantity = <span id="total_quantity">{{$totalQuantity}}</span> Pcs</label>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-md-2">
                                            <a href="javascript:;" class="btn btn-outline-info add_size_quantity">
                                                <i class="fa fa-plus" aria-hidden="true"> </i> Add Size
                                            </a>
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
            $('.add_size_quantity').on('click', function(){
                var content = '<div class="form-group row">' +
                    '<label for="order_quantity" class="col-md-3 offset-1 control-label">Size & Quantity</label>' +
                    '<div class="col-md-4 pl-0">' +
                    '<input type="text" class="form-control" name="size[]" placeholder="size" value="">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<input onchange="totalQuantity()" class="form-control quantity" type="number" name="quantity[]" step="1" placeholder="quantity" value="">' +
                    '</div>' +
                    '</div>';
                $('.element_add_area').before(content);
            });

            $('select').selectize({
                sortField: 'text'
            });
        });

        function totalQuantity(){
            let sum = 0;

            $('.quantity').each(function (index, element) {
                sum += $(element).val() === "" ? 0 : parseFloat($(element).val());
            });

            $("#total_quantity").html(sum);
        }

        function calculateDayRange(){
            let date = new Date($("#delivery_date").val());
            let date2 = new Date();
            let range = date.getTime() - date2.getTime();
            let rangeDay = Math.round(range / (1000 * 3600 * 24));

            $("#day_range").html(rangeDay);
        }
    </script>
@stop
