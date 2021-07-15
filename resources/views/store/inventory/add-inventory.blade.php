@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |ADD INVENTORY DETAILS')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Add Inventory</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            <br>
            <div class="card-header" style="background-color: #17A2B8;color: white">
                <h3 class="card-title"><b>Create Inventory</b></h3>
            </div>
            {{ Form::open(['action'=>'store\inventory\StoreInventoryController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('rcv_date','Receive Date: ') }}
                        {{ Form::date('rcv_date',null,['class'=>'form-control','placeholder'=>'Receive Date']) }}
                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('inv_cha','Invoice/Chalan No: ') }}
                        {{ Form::text('inv_cha',null,['class'=>'form-control','placeholder'=>'Invoice/Chalan:']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="form-group">

                        <label for="order_no">Select Style:</label>
                        <select id="style_no" name="style_no" onchange="getOrderListInventory()" class="form-control"  >

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
                        {{ Form::label('order_no','Order No: ') }}
                        {{ Form::text('order_no',null,['class'=>'form-control','placeholder'=>'Order No. Here','id'=>'order_no','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('order_qty','Order Qty: ') }}
                        {{ Form::text('order_qty',null,['class'=>'form-control','placeholder'=>'Order Qty. Here','id'=>'order_qty','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('buyer','Buyer Name: ') }}
                        {{ Form::text('buyer',null,['class'=>'form-control','id'=>'buyer','readonly' => 'true','placeholder'=>'Buyer Name Here',]) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('supplier','Supplier Name: ') }}
                        {{ Form::select('supplier',$suppliers_list,null,['class'=>'form-control','placeholder'=>'Supplier Name Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('exp_lc','Exp Lc: ') }}
                        {{ Form::text('exp_lc',null,['class'=>'form-control','placeholder'=>'Exp Lc. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('bb_lc','BB Lc: ') }}
                        {{ Form::text('bb_lc',null,['class'=>'form-control','placeholder'=>'BB Lc. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('po_no','PO No: ') }}
                        {{ Form::text('po_no',null,['class'=>'form-control','placeholder'=>'PO No. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('accounts','Accounts: ') }}
                        {{ Form::text('accounts',null,['class'=>'form-control','placeholder'=>'Accounts Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('bond_no','Bond No: ') }}
                        {{ Form::text('bond_no',null,['class'=>'form-control','placeholder'=>'Bond No. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('floor','Floor: ') }}
                        {{ Form::text('floor',null,['class'=>'form-control','placeholder'=>'Floor Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('packages','Pkgs: ') }}
                        {{ Form::text('packages',null,['class'=>'form-control','placeholder'=>'Pkgs Here']) }}
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
                                            <th>Required Qty</th>
                                            <th>Invoice Qty</th>
                                            <th>Received Qty</th>
                                            <th>Short Qty</th>
                                            <th>Over Qty</th>
                                            <th>Fabric Roll</th>
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
    function cal(conId){
        var invoice_qty=parseInt(document.getElementById('invoice_qty'+conId).value);
        var received_qty=parseInt(document.getElementById('received_qty'+conId).value);
        if(invoice_qty>received_qty){
            $("#short"+conId).val(invoice_qty-received_qty);
            $("#over"+conId).val(0);
        }
        else if(invoice_qty<received_qty){
            $("#over"+conId).val(received_qty-invoice_qty);
            $("#short"+conId).val(0);
        }
        else{
            $("#over"+conId).val(0);
            $("#short"+conId).val(0);
        }
    }

    function getOrderListInventory() {
        var styleID = $('#style_no').val();
//        alert(styleID);
        if (styleID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-order-list-inventory')}}?style_id=" + styleID,
                dataType : 'html',
                success: function (res) {
                    if (res) {
                        var response=JSON.parse(res);
                        var order_no =response.style.order_no;
                        var order_qty =response.style.order_qty;
                        var buyer =response.style.buyer_name;

                        $("#door").html(response.html);
                        $("#order_no").val(order_no);
                        $("#order_qty").val(order_qty);
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


