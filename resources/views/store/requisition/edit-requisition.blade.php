@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |EDIT REQUISITION DETAILS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Edit Requisition Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Requisition Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($requisition,array('method' => 'post', 'route' => ['update.requisition', $requisition->id])) }}
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('date','Date: ') }}
                        {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('style','Style: ') }}
                        {{ Form::select('style',$styles,null,['class'=>'form-control','placeholder'=>'Select Style:']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('ord_no','Order No: ') }}
                        {{ Form::text('ord_no',null,['class'=>'form-control','placeholder'=>'Order No Here']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('ord_qty','Order Qty: ') }}
                        {{ Form::text('ord_qty',null,['class'=>'form-control','placeholder'=>'Order Qty Here']) }}
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
                                        <thead>
                                        <tr>
                                            <th>Item Type</th>
                                            <th>Item Name</th>
                                            <th>Consumption</th>
                                            <th>Order Qty.</th>
                                            <th>Qoh</th>
                                            <th>Issued</th>
                                            <th>Roll</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        @php
                                            $num= 0;
                                        @endphp
                                        @foreach($requisition->store_requisition_details as $store_requisition_detail )
                                            @php
                                                $num++;
                                            @endphp
                                        <tr id="requisition_row_add{{$num}}">
                                            <td>

                                                <div class="form-group {{ $errors->has('item_type') ? 'has-error' : '' }}">
                                                    {{ Form::text('item_type'.$num,$store_requisition_detail?$store_requisition_detail->item_type:null,['id'=>'item_type'.$num,'class'=>'form-control','placeholder'=>'Item Type']) }}
                                                    @if($errors->has('item_type'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('item_type') }}</strong>
                                                     </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
                                                    {{ Form::text('item_name'.$num,$store_requisition_detail?$store_requisition_detail->item_name:null,['id'=>'item_name'.$num,'class'=>'form-control','placeholder'=>'Enter Item']) }}
                                                    @if($errors->has('item_name'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('item_name') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('consumption') ? 'has-error' : '' }}">
                                                    {{ Form::text('consumption'.$num,$store_requisition_detail?$store_requisition_detail->consumption:null,['id'=>'consumption'.$num,'class'=>'form-control','placeholder'=>'Consumption']) }}
                                                    @if($errors->has('consumption'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('consumption') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('ord_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('ord_qty'.$num,$store_requisition_detail?$store_requisition_detail->ord_qty:null,['id'=>'ord_qty'.$num,'class'=>'form-control','placeholder'=>'Order Qty.']) }}
                                                    @if($errors->has('ord_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('ord_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('qoh') ? 'has-error' : '' }}">
                                                    {{ Form::text('qoh'.$num,$store_requisition_detail?$store_requisition_detail->qoh:null,['id'=>'qoh'.$num,'class'=>'form-control','placeholder'=>'Supplier Name']) }}
                                                    @if($errors->has('qoh'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('qoh') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('issued') ? 'has-error' : '' }}">
                                                    {{ Form::text('issued'.$num,$store_requisition_detail?$store_requisition_detail->issued:null,['id'=>'issued'.$num,'class'=>'form-control','placeholder'=>'Balance Qty']) }}
                                                    @if($errors->has('issued'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('issued') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('roll') ? 'has-error' : '' }}">
                                                    {{ Form::text('roll'.$num,$store_requisition_detail?$store_requisition_detail->roll:null,['id'=>'roll'.$num,'class'=>'form-control','placeholder'=>'Receive Qty']) }}
                                                    @if($errors->has('roll'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('roll') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                                    {{ Form::text('remarks'.$num,$store_requisition_detail?$store_requisition_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Enter Remarks']) }}
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
        var $div = $('tr[id^="requisition_row_add"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'requisition_row_add'+num);

        $('input[id^="item_type"]:last').prop('id','item_type'+num).prop('name','item_type'+num);
        $('input[id^="item_name"]:last').prop('id','item_name'+num).prop('name','item_name'+num);
        $('input[id^="consumption"]:last').prop('id','consumption'+num).prop('name','consumption'+num);
        $('input[id^="ord_qty"]:last').prop('id','ord_qty'+num).prop('name','ord_qty'+num);
        $('input[id^="qoh"]:last').prop('id','qoh'+num).prop('name','qoh'+num);
        $('input[id^="issued"]:last').prop('id','issued'+num).prop('name','issued'+num);
        $('input[id^="roll"]:last').prop('id','roll'+num).prop('name','roll'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));
    }
</script>

