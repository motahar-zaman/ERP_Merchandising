@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |ADD MRR')

@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>ADD MRR</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            <br>
            <div class="card-header" style="background-color: #17A2B8;color: white">
                <h3 class="card-title"><b>Create MRR</b></h3>
            </div>
            {{ Form::open(['action'=>'store\mrr\MRRController@store','method'=>'POST', 'class'=>'form-horizontal','id'=>'form']) }}
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('date','Date: ') }}
                        {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Booking Date']) }}
                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="form-group">
                        <label for="buyer_id">Select Buyer:</label>
                        <select id="buyer_id" name="buyer_id" class="form-control"  required>
                            <option value="" selected>Select</option>
                            @foreach($buyers as $key => $buyer)
                                <option value="{{$buyer->id}}"> {{$buyer->name}}</option>
                                {{--<input type="hidden" value="{{$key}}" name="store_order_id">--}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('item','Item Name: ') }}
                        {{ Form::text('item',null,['class'=>'form-control','id'=>'item','required' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('invoice_no','INV/Challan No: ') }}
                        {{ Form::text('invoice_no',null,['class'=>'form-control','id'=>'invoice_no','required' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="form-group">
                        <label for="supplier_id">Select Supplier:</label>
                        <select id="supplier_id" name="supplier_id" class="form-control"  required>
                            <option value="" selected>Select</option>
                            @foreach($suppliers as $key => $supplier)
                                <option value="{{$supplier->id}}"> {{$supplier->name}}</option>
                                {{--<input type="hidden" value="{{$key}}" name="store_order_id">--}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('pkgs','PKGS: ') }}
                        {{ Form::text('pkgs',null,['class'=>'form-control','id'=>'pkgs','required' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('size','Size: ') }}
                        {{ Form::text('size',null,['class'=>'form-control','id'=>'size','required' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="form-group">
                        <label for="unit_id">Select Unit:</label>
                        <select id="unit_id" name="unit_id" class="form-control"  required>
                            <option value="" selected>Select</option>
                            @foreach($units as $key => $unit)
                                <option value="{{$unit->id}}"> {{$unit->name}}</option>
                                {{--<input type="hidden" value="{{$key}}" name="store_order_id">--}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('invoice_qty','INV/CLN Qty: ') }}
                        <input onkeyup="shortOver()" type="text" id="invoice_qty" class="form-control" name="invoice_qty">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('received_qty','RCVD Qty: ') }}
                        <input onkeyup="shortOver()" value="0" type="text" id="received_qty" class="form-control" name="received_qty">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('short_over','Short Over: ') }}
                        {{ Form::text('short_over',null,['class'=>'form-control','id'=>'short_over','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('remarks','Remarks: ') }}
                        <textarea name="remarks" class="form-control" id="remarks" required></textarea>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                    <div class="form-group">
                        {{ Form::button(' Save ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
                    </div>
                </div>
               
            </div>
             {{ Form::close() }}
        </div>
    </section>

@endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    function shortOver(){
        var invoice_qty = parseFloat($('#invoice_qty').val());
        var received_qty = parseFloat($('#received_qty').val());

        var short_over = parseFloat(invoice_qty - received_qty).toFixed(2);
        $('#short_over').val(short_over);
    }
</script>