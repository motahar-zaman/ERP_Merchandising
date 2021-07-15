@extends('layouts.fixed')
{{--Edit Hangtag By Nishat--}}
@section('title','WELL-GROUP | Hangtag BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Hang tag Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hangtag booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($hangtag,array('method' => 'post', 'route' => ['hangtag.update', $hangtag->id])) }}
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('to','To: ') }}
                        {{ Form::text('to',null,['class'=>'form-control','placeholder'=>'To']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('attn','Attn: ') }}
                        {{ Form::text('attn',null,['class'=>'form-control','placeholder'=>'Attn']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('sub','Subject: ') }}
                        {{ Form::text('sub',null,['class'=>'form-control','placeholder'=>'Sub']) }}
                    </div>
                </div>
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
                        {{ Form::label('style','Budget Sheet Style: ') }}
                        {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('style','Hangtag Style: ') }}
                        {{ Form::text('style',null,['class'=>'form-control','placeholder'=>'Style']) }}
                    </div>
                </div>
            </div>
                <div class="col-12">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Hangtag Details</th>
                                    <th>Color</th>
                                    <th>Upc Code</th>
                                    <th>Retail Price</th>
                                    <th>Size</th>
                                    <th>GMTS order Qty</th>
                                    <th>With Percentage(%)</th>
                                    <th>Booking Qty.</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="door">
                                @php
                                    $num =0;
                                @endphp
                                @foreach($hangtag->hangtag_booking_details as $hangtag_booking_detail)
                                    @php
                                        $num++;
                                    @endphp
                                <tr id="hangtag_row_add{{$num}}">
                                    <td>
                                        <div class="form-group {{ $errors->has('desc'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('desc'.$num,$hangtag_booking_detail?$hangtag_booking_detail->desc:null,['id'=>'desc'.$num,'class'=>'form-control','placeholder'=>'Details']) }}
                                            @if($errors->has('desc'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('desc'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('color'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('color'.$num,$hangtag_booking_detail?$hangtag_booking_detail->color:null,['id'=>'color'.$num,'class'=>'form-control','placeholder'=>'Color']) }}
                                            @if($errors->has('color'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('color'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('upc'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('upc'.$num,$hangtag_booking_detail?$hangtag_booking_detail->upc:null,['id'=>'upc'.$num,'class'=>'form-control','placeholder'=>'Upc.']) }}
                                            @if($errors->has('upc'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('upc'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('retail_price'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('retail_price'.$num,$hangtag_booking_detail?$hangtag_booking_detail->retail_price:null,['id'=>'retail_price'.$num,'class'=>'form-control','placeholder'=>'Retail Price']) }}
                                            @if($errors->has('retail_price'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('retail_price'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('size'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('size'.$num,$hangtag_booking_detail?$hangtag_booking_detail->size:null,['id'=>'size'.$num,'class'=>'form-control','placeholder'=>'Size']) }}
                                            @if($errors->has('size'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('size'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('gmnts_qty'.$num) ? 'has-error' : '' }}">
                                            {{ Form::text('gmnts_qty'.$num,$hangtag_booking_detail?$hangtag_booking_detail->gmnts_qty:null,['id'=>'gmnts_qty'.$num,'class'=>'form-control','placeholder'=>'Order Qty']) }}
                                            @if($errors->has('gmnts_qty'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('percentage'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('percentage'.$num,$hangtag_booking_detail?$hangtag_booking_detail->percentage:null,['id'=>'percentage'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Percentage']) }}
                                            @if($errors->has('percentage'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('percentage'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('book_qty'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('book_qty'.$num,$hangtag_booking_detail?$hangtag_booking_detail->book_qty:null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book qty']) }}
                                            @if($errors->has('book_qty'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('book_qty'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td><td>
                                        <div class="form-group {{ $errors->has('remarks'.$num) ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('remarks'.$num,$hangtag_booking_detail?$hangtag_booking_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
                                            @if($errors->has('remarks'.$num))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('remarks'.$num) }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }}
                                    </td>
                                </tr>
                                @php $num ++ @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                <div class="form-group">
                                    {{ Form::button('SAVE ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
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
        var $div = $('tr[id^="hangtag_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'hangtag_row_add'+num);

        $('input[id^="desc"]:last').prop('id','desc'+num).prop('name','desc'+num);
        $('input[id^="color"]:last').prop('id','color'+num).prop('name','color'+num);
        $('input[id^="upc"]:last').prop('id','upc'+num).prop('name','upc'+num);
        $('input[id^="retail_price"]:last').prop('id','retail_price'+num).prop('name','retail_price'+num);
        $('input[id^="size"]:last').prop('id','size'+num).prop('name','size'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="book_qty"]:last').prop('id','book_qty'+num).prop('name','book_qty'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));

    }

    function qty_calculate() {
        var gmnts_qty = document.getElementById('gmnts_qty').value;
        var Percentage = document.getElementById('percentage').value;
        var myResult = gmnts_qty * (Percentage*0.01);
        var booking_qty = parseInt(gmnts_qty) + parseInt(myResult);
        var result = document.getElementById('book_qty');
        result.value = booking_qty;
    }
</script>

