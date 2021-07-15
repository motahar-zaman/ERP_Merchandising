@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |EDIT BOOKING DETAILS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Edit Booking Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Booking Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($bookings,array('method' => 'post', 'route' => ['update.booking', $bookings->id])) }}
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('booking_date','Booking Date: ') }}
                        {{ Form::date('booking_date',null,['class'=>'form-control','placeholder'=>'Booking Date']) }}
                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>

                    <div class="from-group">
                        {{ Form::label('style_no','Style No: ') }}
                        {{ Form::text('style_no',$bookings->store_order->style_no,['class'=>'form-control','readonly' => 'true']) }}
                    </div>

                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('order_no','Order No: ') }}
                        {{ Form::text('order_no',null,['class'=>'form-control','id'=>'order_no','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('order_qty','Order Qty: ') }}
                        {{ Form::text('order_qty',null,['class'=>'form-control','id'=>'order_qty','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('buyer_name','Buyer Name: ') }}
                        {{ Form::text('buyer_name',null,['class'=>'form-control','id'=>'buyer','readonly' => 'true']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('merchandiser_name','Merchandiser Name: ') }}
                        {{ Form::text('merchandiser_name',null,['class'=>'form-control','id'=>'merchandiser','readonly' => 'true']) }}
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
                                            <th>Group</th>
                                            <th>Item Name</th>
                                            <th>Order Qty</th>
                                            <th>Unit</th>
                                            <th>Supplier Name</th>
                                            <th>Receive Qty.</th>
                                            <th>Balance Qty.</th>
                                            <th>Qoh</th>
                                            <th>Fabric Roll</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        @if($bookings->store_booking_details->count() >0)
                                        @php
                                            $num= 0;
                                            $count_detail = 0;
                                        @endphp
                                        @foreach($bookings->store_booking_details as $key => $store_booking_detail )
                                            {{--{{dd($bookings->store_inventory_details)}}--}}
                                            @php
                                                $num++;
                                                $count_detail++;
                                            @endphp
                                        <input type="hidden" name="store_detail_id[]" value="{{ $store_booking_detail->id }}">
                                        
                                        <tr id="booking_row_add{{$num}}">
                                            <td>
                                                <div class="form-group {{ $errors->has('group'.$num) ? 'has-error' : '' }}">
                                                    {{-- <select class="form-control" id="group{{ $num }}" name="group[{{ $store_booking_detail->id }}]">
                                                        @foreach($group_list as $key => $group)
                                                            <option value="{{ $key }}">{{ $group }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    {{ Form::select('group[]',$group_list,$store_booking_detail->group,['id'=>'group'.$num,'class'=>'form-control']) }}
                                                    @if($errors->has('group'.$num))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('group'.$num) }}</strong>
                                                     </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('item'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('item[]',$store_booking_detail?$store_booking_detail->item:null,['id'=>'item'.$num,'class'=>'form-control','placeholder'=>'Enter Item']) }}
                                                    @if($errors->has('item'.$num))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('item'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('order_qty'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('detail_order_qty[]',$store_booking_detail?$store_booking_detail->order_qty:null,['id'=>'order_qty'.$num,'class'=>'form-control','placeholder'=>'Order Qty']) }}
                                                    @if($errors->has('order_qty'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('order_qty'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('unit'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::select('unit[]',$units,$store_booking_detail->unit,['id'=>'unit'.$num,'class'=>'form-control','placeholder'=>'Unit']) }}
                                                    @if($errors->has('unit'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('unit'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('supplier_name'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::select('supplier_name[]',$suppliers_list,$store_booking_detail->supplier_name,['id'=>'supplier_name'.$num,'class'=>'form-control','placeholder'=>'Supplier Name']) }}
                                                    @if($errors->has('supplier_name'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('supplier_name'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('rcv_qty'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('rcv_qty[]',$store_booking_detail?$store_booking_detail->store_inventory_details->sum('received_qty'):null,['id'=>'rcv_qty'.$num,'class'=>'form-control','placeholder'=>'Receive Qty','readonly' => 'true']) }}
                                                    @if($errors->has('rcv_qty'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('rcv_qty'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('balance_qty'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('balance_qty[]',$store_booking_detail?($store_booking_detail->store_inventory_details->sum('received_qty'))-($store_booking_detail->order_qty):null,['id'=>'balance_qty'.$num,'class'=>'form-control','placeholder'=>'Balance Qty','readonly' => 'true']) }}
                                                    @if($errors->has('balance_qty'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('balance_qty'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('qoh'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('qoh[]',$store_booking_detail?$store_booking_detail->store_inventory_details->sum('received_qty') - $store_booking_detail->store_requisition_details->sum('issued'):null,['id'=>'qoh'.$num,'class'=>'form-control','placeholder'=>'Qoh Here','readonly' => 'true']) }}
                                                    @if($errors->has('qoh'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('qoh'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('fabric_roll'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('fabric_roll[]',$store_booking_detail?$store_booking_detail->fabric_roll + $store_booking_detail->store_inventory_details->sum('fab_roll'):null,['id'=>'fabric_roll'.$num,'class'=>'form-control','placeholder'=>'Fabric Roll Here','readonly' => 'true']) }}
                                                    @if($errors->has('fabric_roll'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('fabric_roll'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('remarks'.$num) ? 'has-error' : '' }}">
                                                    {{ Form::text('remarks[]',$store_booking_detail?$store_booking_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Enter Remarks']) }}
                                                    @if($errors->has('remarks'.$num))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('remarks'.$num) }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }} </td>
                                        </tr>
                                            @php $num ++ @endphp
                                        @endforeach
                                        {{-- <input type="hidden" name="store_detail_count" value="{{ $num }}"> --}}
                                            @endif
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

    $('body').on('keydown', 'input, select, textarea', function(e) {
        var self = $(this)
            , form = self.parents('form:eq(0)')
            , focusable
            , next
        ;
        if (e.keyCode == 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible');
            next = focusable.eq(focusable.index(this)+1);
            if (next.length) {
                next.focus();
            } else {
                form.submit();
            }
            return false;
        }
    });

    function remove() {
        $(document).on("click","#remove",function () {
            $(this).parent().parent().remove();
        });
    }

    // Add new row
    function addRow(){
        // get the last DIV which ID starts with ^= "product"
        var $div = $('tr[id^="booking_row_add"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'booking_row_add'+num);

        $('select[id^="group"]:last').prop('id','group'+num).prop('name','group[]');
        $('input[id^="item"]:last').prop('id','item'+num).prop('name','item[]');
        $('input[id^="order_qty"]:last').prop('id','order_qty'+num).prop('name','detail_order_qty[]');
        $('select[id^="unit"]:last').prop('id','unit'+num).prop('name','unit[]');
        $('select[id^="supplier_name"]:last').prop('id','supplier_name'+num).prop('name','supplier_name[]');
        $('input[id^="rcv_qty"]:last').prop('id','rcv_qty'+num).prop('name','rcv_qty[]');
        $('input[id^="balance_qty"]:last').prop('id','balance_qty'+num).prop('name','balance_qty[]');
        $('input[id^="qoh"]:last').prop('id','qoh'+num).prop('name','qoh[]');
        $('input[id^="fabric_roll"]:last').prop('id','fabric_roll'+num).prop('name','fabric_roll[]');
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks[]');

        $('#group'+num).last().next().next().remove();
        $('#unit'+num).last().next().next().remove();
        $('#supplier_name'+num).last().next().next().remove();

        $klon.appendTo($("#door"));
    }

    function getOrderlist() {
        var styleID = $('#style_no').val();
        if (styleID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-order-list')}}?style_id=" + styleID,
                success: function (res) {
                    if (res) {
                        console.log(res);
                        var order_no =res['order_no'];
                        var order_qty =res['order_qty'];
                        var buyer =res['buyers'].name;
                        var merchandiser =res['merchandisers'].merchandiser_name;
                        $("#order_no").val(order_no);
                        $("#order_qty").val(order_qty);
                        $("#buyer").val(buyer);
                        $("#merchandiser").val(merchandiser);
                    }
                    else {
                        $("#order_no").empty();
                    }
                }
            });
        }
        else {
            $("#order_no").empty();
        }
    }
</script>

