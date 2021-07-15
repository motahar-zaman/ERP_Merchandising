@extends('layouts.fixed')
{{--Edit Fabric By Nishat--}}
@section('title','WELL-GROUP | FABRIC BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Fabric Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fabric booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($fabrics,array('method' => 'post', 'route' => ['fabric.update', $fabrics->id])) }}
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
                        {{ Form::text('sub',null,['class'=>'form-control','placeholder'=>'Subject']) }}
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
                        {{ Form::select('budget_sheet_id',$budget_sheet_styles,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
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
                                            <th>Fabric Details</th>
                                            <th>Color</th>
                                            <th>Gmnts Qty</th>
                                            <th>Consumption</th>
                                            <th>Required Qty.</th>
                                            <th>Add Shrinkage (+/-)%</th>
                                            <th>Booking Qty.</th>
                                            <th>Remarks </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        @php
                                            $num= 0;
                                        @endphp
                                        @foreach($fabrics->fabric_booking_details as $fabric_booking_detail )
                                        @php
                                            $num++;
                                        @endphp
                                        <tr id="fabric_row_add{{$num}}">
                                            <td>

                                                <div class="form-group {{ $errors->has('fabric_name') ? 'has-error' : '' }}">
                                                    {{ Form::text('fabric_name'.$num,$fabric_booking_detail?$fabric_booking_detail->fabric_name:null,['id'=>'fabric_name'.$num,'class'=>'form-control','placeholder'=>'Fabric Details']) }}
                                                    @if($errors->has('fabric_name'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('fabric_name') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                                                    {{ Form::text('color'.$num,$fabric_booking_detail?$fabric_booking_detail->color:null,['id'=>'color'.$num,'class'=>'form-control','placeholder'=>'Color']) }}
                                                    @if($errors->has('color'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('color') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('gmnts_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('gmnts_qty'.$num,$fabric_booking_detail?$fabric_booking_detail->gmnts_qty:null,['id'=>'gmnts_qty'.$num,'class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'Gmnts Qty']) }}
                                                    @if($errors->has('gmnts_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('consumption') ? 'has-error' : '' }}">
                                                    {{ Form::text('consumption'.$num,$fabric_booking_detail?$fabric_booking_detail->consumption:null,['id'=>'consumption'.$num,'class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'consumption']) }}
                                                    @if($errors->has('consumption'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('consumption') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('req_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('req_qty'.$num,$fabric_booking_detail?$fabric_booking_detail->req_qty:null,['id'=>'req_qty'.$num,'class'=>'form-control','placeholder'=>'Req. Qty','readonly']) }}
                                                    @if($errors->has('req_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('req_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('percentage') ? 'has-error' : '' }}">
                                                    {{ Form::text('percentage'.$num,$fabric_booking_detail?$fabric_booking_detail->percentage:null,['id'=>'percentage'.$num,'onKeyup'=>'req_qty_cal()','class'=>'form-control','placeholder'=>'Percentage']) }}
                                                    @if($errors->has('percentage'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('percentage') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('book_qty') ? 'has-error' : '' }}">
                                                    {{ Form::text('book_qty'.$num,$fabric_booking_detail?$fabric_booking_detail->book_qty:null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book. Qty']) }}
                                                    @if($errors->has('book_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('book_qty') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                                    {{ Form::text('remarks'.$num,$fabric_booking_detail?$fabric_booking_detail->remarks:null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
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
        var $div = $('tr[id^="fabric_row_add"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'fabric_row_add'+num);

        $('input[id^="fabric_name"]:last').prop('id','fabric_name'+num).prop('name','fabric_name'+num);
        $('input[id^="color"]:last').prop('id','color'+num).prop('name','color'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="consumption"]:last').prop('id','consumption'+num).prop('name','consumption'+num);
        $('input[id^="req_qty"]:last').prop('id','req_qty'+num).prop('name','req_qty'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="book_qty"]:last').prop('id','book_qty'+num).prop('name','book_qty'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));
    }

    function qty_calculate(){
        var gmnts_qty = document.getElementById('gmnts_qty').value;
        var consumption = document.getElementById('consumption').value;
        var result = document.getElementById('req_qty');
        var myResult = gmnts_qty * consumption;
        result.value = myResult;
    }

    function req_qty_cal(){
        var req_qty = document.getElementById('req_qty').value;
        var percentage = document.getElementById('percentage').value;
        var result = document.getElementById('book_qty');
        var myResult = req_qty * (percentage*0.01);
        var booking_qty = parseInt(req_qty) + parseInt(myResult);
        result.value = booking_qty;
    }

</script>

