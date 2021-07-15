@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |ADD REQUISITION DETAILS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Create Requisition</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            <br>
            <div class="card-header" style="background-color: #17A2B8;color: white">
                <h3 class="card-title"><b>Create Requisition</b></h3>
            </div>
            {{ Form::open(['action'=>'store\requisition\StoreRequisitionController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('date','Date: ') }}
                        {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Date','required']) }}
                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="form-group">
                        <label for="style">Select Style:</label>
                        <select id="style" name="style" onchange="getRequisition()" class="form-control">
                            <option value="" selected>Select</option>
                            @foreach($booking_styles as $key => $style)
                                <option value="{{$key}}"> {{$style}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('ord_no','Order No: ') }}
                        {{ Form::text('ord_no',null,['class'=>'form-control','placeholder'=>'Order No Here','id'=>'ord_no','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('ord_qty','Order Qty: ') }}
                        {{ Form::text('ord_qty',null,['class'=>'form-control','placeholder'=>'Order Qty Here','id'=>'ord_qty','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('buyer','Buyer Name: ') }}
                        {{ Form::text('buyer',null,['class'=>'form-control','placeholder'=>'Buyer Name Here','id'=>'buyer','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('company_unit','Company: ') }}
                        {{ Form::select('company_unit',$company_units,null,['class'=>'form-control','placeholder'=>'Select Company Name']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('remarks','Remarks: ') }}
                        {{ Form::text('remarks',null,['class'=>'form-control','placeholder'=>'Remarks']) }}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <br><br>
                            <div class="row">
                                <div class="col-lg-12  table-responsive">
                                    <table class="table table-striped">
                                        <thead style="background-color: #17A2B8;color: white">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Consumption</th>
                                            <th>Order Qty.</th>
                                            <th>Qoh</th>
                                            <th>Issued</th>
                                            <th>Roll</th>
                                            <th>Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                        <div class="form-group">
                                            {{ Form::button(' SAVE ',['class'=>'far fa-save fa-3x btn btn-warning','type'=>'submit']) }}
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

<script>

    function getRequisition() {
//        alert('hello');
        var styleID = $('#style').val();
        //alert(styleID);
        if (styleID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-requisition')}}?style_id=" + styleID,
                dataType : 'html',
                success: function (res) {
                    console.log(res);
                    if (res) {
                        var response=JSON.parse(res);
                        var order_no =response.style.order_no;
                        var order_qty =response.style.order_qty;
                        var buyer =response.style.buyer_name;

                        $("#door").html(response.html);
                        $("#ord_no").val(order_no);
                        $("#ord_qty").val(order_qty);
                        $("#buyer").val(buyer);
                    }
                    else {
                    }
                }
            });
        }
        else {
        }
    }


</script>

