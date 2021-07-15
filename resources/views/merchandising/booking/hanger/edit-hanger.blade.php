@extends('layouts.fixed')
{{--Edit Hanger By Nishat--}}
@section('title','WELL-GROUP | HANGER BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Hanger Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hanger booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="col-lg-12 card">
            {{ Form::model($hanger,array('method' => 'post', 'route' => ['hanger.update', $hanger->id])) }}
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
                        {{ Form::label('attn','ATTN: ') }}
                        {{ Form::text('attn',null,['class'=>'form-control','placeholder'=>'Attn']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('sub','Subject: ') }}
                        {{ Form::text('sub',null,['class'=>'form-control','placeholder'=>'subject']) }}
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
                        {{ Form::label('budget_sheet_style','Budget Sheet Style: ') }}
                        {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
                    </div>
                </div>

                <div class="col-12">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12  table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Buyer</th>
                                    <th>Style</th>
                                    <th>Gmnts Size</th>
                                    <th>Item</th>
                                    <th>Item Code</th>
                                    <th>Quality</th>
                                    <th>Gmnts Qty</th>
                                    <th>With Percentage(%)</th>
                                    <th>Booking Qty.</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="door">
                                @php $num =0; @endphp
                                @php $num++; @endphp
                                @foreach($hanger->hanger_booking_details as $hanger_booking_detail)
                                <tr id="hanger_row_add1">
                                    <td>
                                        <div class="form-group {{ $errors->has('buyer') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('buyer'.$num,$hanger_booking_detail?$hanger_booking_detail->buyer:null,['id'=>'buyer'.$num,'class'=>'form-control','placeholder'=>'Buyer']) }}
                                            @if($errors->has('buyer'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('buyer') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('style') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('style'.$num,$hanger_booking_detail?$hanger_booking_detail->style:null,['id'=>'style'.$num,'class'=>'form-control','placeholder'=>'style']) }}
                                            @if($errors->has('style'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('style') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('gmnts_size') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('gmnts_size'.$num,$hanger_booking_detail?$hanger_booking_detail->gmnts_size:null,['id'=>'gmnts_size'.$num,'class'=>'form-control','placeholder'=>'Size']) }}
                                            @if($errors->has('gmnts_size'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_size') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('hanger_item') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('hanger_item'.$num,$hanger_booking_detail?$hanger_booking_detail->hanger_item:null,['id'=>'hanger_item'.$num,'class'=>'form-control','placeholder'=>'Item']) }}
                                            @if($errors->has('hanger_item'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('hanger_item') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('item_code') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('item_code'.$num,$hanger_booking_detail?$hanger_booking_detail->item_code:null,['id'=>'item_code'.$num,'class'=>'form-control','placeholder'=>'Item Code']) }}
                                            @if($errors->has('item_code'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('item_code') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('quality') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('quality'.$num,$hanger_booking_detail?$hanger_booking_detail->quality:null,['id'=>'quality'.$num,'class'=>'form-control','placeholder'=>'Quality']) }}
                                            @if($errors->has('quality'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('quality') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('gmnts_qty') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('gmnts_qty'.$num,$hanger_booking_detail?$hanger_booking_detail->gmnts_qty:null,['id'=>'gmnts_qty'.$num,'class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
                                            @if($errors->has('gmnts_qty'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('percentage') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('percentage'.$num,$hanger_booking_detail?$hanger_booking_detail->percentage:null,['id'=>'percentage'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Percentage']) }}
                                            @if($errors->has('percentage'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('percentage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('book_qty') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('book_qty'.$num,$hanger_booking_detail?$hanger_booking_detail->book_qty:null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book Qty.']) }}
                                            @if($errors->has('book_qty'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('book_qty') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                            {{--{{ Form::label('','Unit : ') }}--}}
                                            {{ Form::text('remarks'.$num,$hanger_booking_detail?$hanger_booking_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
                                            @if($errors->has('remarks'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('remarks1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }}
                                    </td>
                                </tr>
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
        var $div = $('tr[id^="hanger_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'hanger_row_add'+num);

        $('input[id^="buyer"]:last').prop('id','buyer'+num).prop('name','buyer'+num);
        $('input[id^="style"]:last').prop('id','style'+num).prop('name','style'+num);
        $('input[id^="gmnts_size"]:last').prop('id','gmnts_size'+num).prop('name','gmnts_size'+num);
        $('input[id^="hanger_item"]:last').prop('id','hanger_item'+num).prop('name','hanger_item'+num);
        $('input[id^="item_code"]:last').prop('id','item_code'+num).prop('name','item_code'+num);
        $('input[id^="quality"]:last').prop('id','quality'+num).prop('name','quality'+num);
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

