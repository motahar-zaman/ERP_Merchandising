@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
@section('title','WELL-GROUP |ADD BOOKING DETAILS')

@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Booking Details</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            <br>
            <div class="card-header" style="background-color: #17A2B8;color: white">
                <h3 class="card-title"><b>Create Booking</b></h3>
            </div>
            {{ Form::open(['action'=>'store\booking\StoreBookingController@store','method'=>'POST', 'class'=>'form-horizontal','id'=>'form']) }}
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
                    <div class="form-group">
                        <label for="order_no">Select Style:</label>
                        <select id="style_no" name="store_order_id" onchange="getOrderlist()" class="form-control"  >
                            <option value="" selected>Select</option>
                            @foreach($all_styles as $key => $style)
                                <option value="{{$key}}"> {{$style}}</option>
                                {{--<input type="hidden" value="{{$key}}" name="store_order_id">--}}
                            @endforeach
                        </select>
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
                                        <thead style="background-color: #17A2B8;color: white">
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
                                        <tr id="booking_row_add1">
                                            <td>

                                                <div class="form-group {{ $errors->has('group1') ? 'has-error' : '' }}">
                                                    {{ Form::select('group1',$group_list,null,['id'=>'group1','class'=>'form-control','placeholder'=>'Select Group']) }}
                                                    @if($errors->has('group1'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('group1') }}</strong>
                                                     </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('item1') ? 'has-error' : '' }}">
                                                    {{ Form::text('item1',null,['id'=>'item1','class'=>'item_name form-control','placeholder'=>'Enter Item Name Here.','style'=>'width:100%']) }}
                                                    @if($errors->has('item1'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('item1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('order_qty1') ? 'has-error' : '' }}">
                                                    {{ Form::text('order_qty1',null,['id'=>'order_qty1','class'=>'form-control','placeholder'=>'Order Qty']) }}
                                                    @if($errors->has('order_qty1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('order_qty1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('unit1') ? 'has-error' : '' }}">
                                                    {{ Form::select('unit1',$units,null,['id'=>'unit1','class'=>'form-control','placeholder'=>'Select Unit']) }}
                                                    @if($errors->has('unit1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('unit1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('supplier_name1') ? 'has-error' : '' }}">
                                                    {{ Form::select('supplier_name1',$suppliers_list,null,['id'=>'supplier_name1','class'=>'form-control','placeholder'=>'Select Supplier:']) }}
                                                    @if($errors->has('supplier_name1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('supplier_name1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('rcv_qty1') ? 'has-error' : '' }}">
                                                    {{ Form::text('rcv_qty1',null,['id'=>'rcv_qty1','class'=>'form-control','readonly' => 'true','placeholder'=>'Receive Qty']) }}
                                                    @if($errors->has('rcv_qty1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('rcv_qty1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('balance_qty1') ? 'has-error' : '' }}">
                                                    {{ Form::text('balance_qty1',null,['id'=>'balance_qty1','class'=>'form-control','readonly' => 'true','placeholder'=>'Balance Qty']) }}
                                                    @if($errors->has('balance_qty1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('balance_qty1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('qoh1') ? 'has-error' : '' }}">
                                                    {{ Form::text('qoh1',null,['id'=>'qoh1','class'=>'form-control','readonly' => 'true','placeholder'=>'Qoh Here']) }}
                                                    @if($errors->has('qoh1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('qoh1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('fabric_roll1') ? 'has-error' : '' }}">
                                                    {{ Form::text('fabric_roll1',null,['id'=>'fabric_roll1','class'=>'form-control','placeholder'=>'Fabric Roll Here']) }}
                                                    @if($errors->has('fabric_roll1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('fabric_roll1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('remarks1') ? 'has-error' : '' }}">
                                                    {{ Form::text('remarks1',null,['id'=>'remarks1','class'=>'form-control','placeholder'=>'Remarks']) }}
                                                    @if($errors->has('remarks1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('remarks1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }} </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                        <div class="form-group">
                                            {{ Form::button(' SAVE ',['class'=>'far fa-save fa-3x btn btn-warning','type'=>'button','onclick'=>'submitForm()']) }}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    // $(document).ready(function() {
    //     var form=$('#form');
    //     form.on('submit', function(e){
    //         e.preventDefault();
    //         $('.item_name').each(function(){
              
    //         })
    //         form.submit()
    //     });
    // });
    function remove() {
        $(document).on("click","#remove",function () {
            $(this).parent().parent().remove();
        });
    }

    function submitForm(){
        var items = [];
        var i = j= 0;
        var same = 0;
        
        $('.item_name').each(function(){
            items.push(this.value);
        })

        for(i = 0; i < items.length ; i++){
            for(j = 0; j < items.length ; j++){
                if(j != i){
                    if(items[i] == items[j]){
                        same = 1;
                    }
                }
            }
        }

        if(same == 1){
            alert('Same item can not taken twice !');
        }else{
            $('#form').submit();
        }
    }

    // Add new row
    function addRow(){
        
        // get the last DIV which ID starts with ^= "product"
        var $div = $('tr[id^="booking_row_add"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
        var i = 0;
        
            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'booking_row_add'+num);

            $('select[id^="group"]:last').prop('id','group'+num).prop('name','group'+num);
            $('input[id^="item"]:last').prop('id','item'+num).prop('class','item_name form-control').prop('name','item'+num);
            $('input[id^="order_qty"]:last').prop('id','order_qty'+num).prop('name','order_qty'+num);
            $('select[id^="unit"]:last').prop('id','unit'+num).prop('name','unit'+num);
            $('select[id^="supplier_name"]:last').prop('id','supplier_name'+num).prop('name','supplier_name'+num);
            $('input[id^="rcv_qty"]:last').prop('id','rcv_qty'+num).prop('name','rcv_qty'+num);
            $('input[id^="balance_qty"]:last').prop('id','balance_qty'+num).prop('name','balance_qty'+num);
            $('input[id^="qoh"]:last').prop('id','qoh'+num).prop('name','qoh'+num);
            $('input[id^="fabric_roll"]:last').prop('id','fabric_roll'+num).prop('name','fabric_roll'+num);
            $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

            $('#group'+num).last().next().next().remove();
            $('#unit'+num).last().next().next().remove();
            $('#supplier_name'+num).last().next().next().remove();


            $klon.appendTo($("#door"));
        
    }

    function getOrderlist() {

        var styleID = $('#style_no').val();
//        alert(styleID);
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



