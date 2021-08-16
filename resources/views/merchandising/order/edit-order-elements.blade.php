@extends('layouts.fixed')

@section('title','Edit Order Elements')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order Elements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Edit Order Elements</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="col-12">
            <div class="card"><br>
                <div class="row justify-content-center">
                    <div class="card-info" style="width:95%">
                        <div class="card-header">
                            <h3 class="card-title">Edit Elements Details</h3>
                        </div>

                        <form method="post" action="{{route('edit-order-elements-action')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="order_id" id="order_id" value="{{$orderId}}">
                            <div class="card-body">
                                <?php
                                    if(isset($orderElements) && count($orderElements) > 0){
                                        foreach($orderElements as $elements){
                                    ?>
                                        <div id="elements">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <input type="hidden" name="element_id[]" id="element_id" value="{{$elements->id}}">
                                                    <input type="text" class="form-control" name="element_name[]" id="element_name" value="{{$elements->element_name ?? ""}}" required>
                                                </div>
                                                <div class="col-md-3 pl-2">
                                                    <select name="size[]" id="size" class="mr-1">
                                                        <option value=""></option>
                                                        @foreach($sizeQuantity as $size)
                                                            <option value="{{$size->id}}" {{$elements->size_quantity_id == $size->id ? "selected" : ''}}>{{$size->size_name}} - {{$size->quantity}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="number" class="form-control" name="quantity[]" id="quantity" min="0" max="100" step="0.01" value="{{$elements->quantity_per_unit ?? ""}}">
                                                </div>

                                                <div class="col-md-2">
                                                    <input onchange="calculateTotalQuantity()" type="number" class="form-control" name="wastage[]" id="wastage" min="1" max="100" step="0.01" value="{{$elements->waste_percentage ?? ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group row pb-4">
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="color[]" id="color" placeholder="color" value="{{$elements->color ?? ""}}">
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="type[]" id="type" placeholder="type" value="{{$elements->type ?? ""}}">
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "<div class='text-center pb-3'><b>No elements added for this order</b></div>";
                                    }
                                ?>
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
            $('.add_element').on('click', function(){
                var content = '<div class="form-group row">' +
                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control" name="element_name[]" id="element_name" placeholder="element name" value="" required>' +
                    '</div>' +
                    '<div class="col-md-3 pl-2">' +
                    '<select name="size[]" id="size" placeholder="select size" class="mr-1">' +
                    '<option value=""></option>' +
                    '@foreach($sizeQuantity as $size)' +
                    '<option value="{{$size->id}}">{{$size->size_name}} - {{$size->quantity}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +

                    '<div class="col-md-2">' +
                    '<input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="quantity/unit" min="0" max="100" step="0.01" value="">' +
                    '</div>' +

                    '<div class="col-md-2">' +
                    '<input onchange="calculateTotalQuantity()" type="number" class="form-control" name="wastage[]" id="wastage" placeholder="wastage %" min="1" max="100" step="0.01" value="">' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group row pb-4">' +
                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control" name="color[]" id="color" placeholder="color" value="">' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control" name="type[]" id="type" placeholder="type" value="">' +
                    '</div>' +
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
