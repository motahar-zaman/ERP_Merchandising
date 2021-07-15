@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |EDIT INVENTORY DETAILS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Edit Inventory Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Inventory Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($inventory,array('method' => 'post', 'route' => ['update.inventory', $inventory->id])) }}
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
                        {{ Form::label('inv_cha','Invoice/Chalan: ') }}
                        {{ Form::text('inv_cha',null,['class'=>'form-control','placeholder'=>'Invoice/Chalan:']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('no','No: ') }}
                        {{ Form::text('no',null,['class'=>'form-control','placeholder'=>'No Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('style_no','Style No: ') }}
                        {{ Form::select('style_no',$styles,null,['class'=>'form-control','placeholder'=>'Select Style:']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('order_no','Order No: ') }}
                        {{ Form::text('order_no',null,['class'=>'form-control','placeholder'=>'Order No. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('order_qty','Order Qty: ') }}
                        {{ Form::text('order_qty',null,['class'=>'form-control','placeholder'=>'Order Qty. Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('buyer','Buyer Name: ') }}
                        {{ Form::select('buyer',$buyers_list,null,['class'=>'form-control','placeholder'=>'Buyer Name Here']) }}
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
                                        <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Required Qty</th>
                                            <th>Invoice Qty</th>
                                            <th>Received Qty</th>
                                            <th>Short Qty</th>
                                            <th>Over Qty</th>
                                            <th>Fabric Roll</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        @php
                                            $num= 0;
                                        @endphp
                                        @foreach($inventory->store_inventory_details as $store_inventory_detail )
                                            @php
                                                $num++;
                                            @endphp
                                        <tr id="inventory_row_add{{$num}}">
                                            <td>

                                                <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
                                                    {{ Form::text('item_name'.$num,$store_inventory_detail?$store_inventory_detail->item_name:null,['id'=>'item_name'.$num,'class'=>'form-control','placeholder'=>'Select Group']) }}
                                                    @if($errors->has('item_name'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('item_name') }}</strong>
                                                     </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('req_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('req_qty'.$num,$store_inventory_detail?$store_inventory_detail->req_qty:null,['id'=>'req_qty'.$num,'class'=>'form-control','placeholder'=>'Enter Item']) }}
                                                    @if($errors->has('req_qty'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('req_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('invoice_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('invoice_qty'.$num,$store_inventory_detail?$store_inventory_detail->invoice_qty:null,['id'=>'invoice_qty'.$num,'class'=>'form-control','placeholder'=>'Order Qty']) }}
                                                    @if($errors->has('invoice_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('invoice_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('received_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('received_qty'.$num,$store_inventory_detail?$store_inventory_detail->received_qty:null,['id'=>'received_qty'.$num,'class'=>'form-control','placeholder'=>'Unit']) }}
                                                    @if($errors->has('received_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('received_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('short_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('short_qty'.$num,$store_inventory_detail?$store_inventory_detail->short_qty:null,['id'=>'short_qty'.$num,'class'=>'form-control','placeholder'=>'Supplier Name']) }}
                                                    @if($errors->has('short_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('short_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('over_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('over_qty'.$num,$store_inventory_detail?$store_inventory_detail->over_qty:null,['id'=>'over_qty'.$num,'class'=>'form-control','placeholder'=>'Receive Qty']) }}
                                                    @if($errors->has('over_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('over_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('fab_roll') ? 'has-error' : '' }}">
                                                    {{ Form::text('fab_roll'.$num,$store_inventory_detail?$store_inventory_detail->fab_roll:null,['id'=>'fab_roll'.$num,'class'=>'form-control','placeholder'=>'Balance Qty']) }}
                                                    @if($errors->has('fab_roll'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('fab_roll') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                                    {{ Form::text('remarks'.$num,$store_inventory_detail?$store_inventory_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Enter Remarks']) }}
                                                    @if($errors->has('remarks'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }} </td>
                                        </tr>
                                            @php $num ++ @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                        <div class="form-group">
                                            {{ Form::button(' SAVE ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
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

    function remove() {
        $(document).on("click","#remove",function () {
            $(this).parent().parent().remove();
        });
    }

    // Add new row
    function addRow(){
        // get the last DIV which ID starts with ^= "product"
        var $div = $('tr[id^="inventory_row_add"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'inventory_row_add'+num);

        $('input[id^="item_name"]:last').prop('id','item_name'+num).prop('name','item_name'+num);
        $('input[id^="req_qty"]:last').prop('id','req_qty'+num).prop('name','req_qty'+num);
        $('input[id^="invoice_qty"]:last').prop('id','invoice_qty'+num).prop('name','invoice_qty'+num);
        $('input[id^="received_qty"]:last').prop('id','received_qty'+num).prop('name','received_qty'+num);
        $('input[id^="short_qty"]:last').prop('id','short_qty'+num).prop('name','short_qty'+num);
        $('input[id^="over_qty"]:last').prop('id','over_qty'+num).prop('name','over_qty'+num);
        $('input[id^="fab_roll"]:last').prop('id','fab_roll'+num).prop('name','fab_roll'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));
    }
</script>

