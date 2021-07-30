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
                        <form method="post" action="{{route("order-element")}}">
                            @csrf
                            <input type="hidden" name="order_id" id="order_id" value="{{$orderId}}">
                            <div class="card-body">
                                <h4 class="pb-3 ml-0">Enter Elements Details</h4>
                                <div id="elements">
                                    <div class="form-group row">
                                        <div class="col-md-3 pl-0 pr-0">
                                            <input type="text" name="element_name[]" id="element_name" placeholder="element name" value="" required>
                                            <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-3 pl-0 pr-5">
                                            <select name="size[]" id="size" placeholder="select size" class="mr-1">
                                                <option value=""></option>
                                                @foreach($sizeQuantity as $size)
                                                    <option data-id="{{$size->quantity}}" value="{{$size->id}}">{{$size->size_name}} - {{$size->quantity}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="number" name="quantity[]" id="quantity" placeholder="quantity" min="0" max="100" step="0.01" value="">
                                        </div>

                                        <div class="col-md-2">
                                            <input onchange="calculateTotalQuantity()" type="number" name="wastage[]" id="wastage" placeholder="wastage" min="1" max="100" step="0.01" value="">
                                        </div>

<!--
                                        <div class="col-md-2 pl-0 pr-0">
                                            <label>Total Quantity <span id="total_quantity">0</span></label>
                                        </div>-->
                                    </div>

                                    <div class="form-group row pb-4">
                                        <div class="col-md-3 pl-0">
                                            <input type="text" name="color[]" id="color" placeholder="color" value="">
                                        </div>

                                        <div class="col-md-3">
                                            <input type="text" name="type[]" id="type" placeholder="type" value="">
                                        </div>

                                        <div class="col-md-3">
                                            <input type="text" name="note[]" id="note" placeholder="note" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3 element_add_area">
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
                var content = '<div class="form-group row">' +
                    '<div class="col-md-3 pl-0 pr-0">' +
                    '<input type="text" name="element_name[]" id="element_name" placeholder="element name" value="" required>' +
                    '<span class="text-danger">*</span>' +
                    '</div>' +
                    '<div class="col-md-3 pl-0 pr-5">' +
                    '<select name="size[]" id="size" placeholder="select size" class="mr-1">' +
                    '<option value=""></option>' +
                    '@foreach($sizeQuantity as $size)' +
                    '<option data-id="{{$size->quantity}}" value="{{$size->id}}">{{$size->size_name}} - {{$size->quantity}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +

                    '<div class="col-md-2">' +
                    '<input type="number" name="quantity[]" id="quantity" placeholder="quantity" min="0" max="100" step="0.01" value="">' +
                    '</div>' +

                    '<div class="col-md-2">' +
                    '<input onchange="calculateTotalQuantity()" type="number" name="wastage[]" id="wastage" placeholder="wastage" min="1" max="100" step="0.01" value="">' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group row pb-4">' +
                    '<div class="col-md-3 pl-0">' +
                    '<input type="text" name="color[]" id="color" placeholder="color" value="">' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<input type="text" name="type[]" id="type" placeholder="type" value="">' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<input type="text" name="note[]" id="note" placeholder="note" value="">' +
                    '</div>' +
                    '</div>';
                $('.element_add_area').before(content);

                $('select').selectize({
                    sortField: 'text'
                });
            });

            $('select').selectize({
                sortField: 'text'
            });
        });

        function calculateTotalQuantity(){
            /*let data = $("#size").find('option:selected').html().split("-");
            let unit = parseInt(data[1]);
            let quantity = $("#quantity").val();
            let wastage = $("#wastage").val();
            if(wastage === "" || wastage < 1){
                wastage = 1;
            }

            $("#total_quantity").html(unit * quantity * wastage);*/
        }
    </script>
@stop
