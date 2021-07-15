@extends('layouts.fixed')
{{--Add thread By Nishat--}}
@section('title','WELL-GROUP | THREAD BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Thread Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thread booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::open(['action'=>'Merchandise\ThreadBookingController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('unit_id','Company Unit: ') }}
                        {{ Form::select('unit_id',$repository->AllCompanyUnit(),null,['class'=>'form-control','placeholder'=>'Select Unit']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('to','To: ') }}
                        {{ Form::text('to',null,['class'=>'form-control','placeholder'=>'to']) }}
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
                        {{ Form::text('sub',null,['class'=>'form-control','placeholder'=>'Subject']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('style_no','Thread Style Name/No: ') }}
                        {{ Form::text('style_no',null,['class'=>'form-control','placeholder'=>'Style Name/No']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('book_date','Booking Date: ') }}
                        {{ Form::date('book_date',null,['class'=>'form-control','placeholder'=>'Booking Date']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('budget_sheet_id','Budget Sheet Style: ') }}
                        {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style','required']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('buyer_name','Buyer Name: ') }}
                        {{ Form::text('buyer_name',null,['class'=>'form-control','placeholder'=>'Buyer Name']) }}
                    </div>
                </div>
                <div class="col-12">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Thread Code</th>
                                    <th>Color Name</th>
                                    <th>Shade No.</th>
                                    <th>Count</th>
                                    <th>Process Name</th>
                                    <th>Garment's Order Qty. </th>
                                    <th>Per Gmts Consumption</th>
                                    <th>Total Meter</th>
                                    <th>Per cone in MTRS</th>
                                    <th>Total No. of Cones</th>
                                    <th>With Percentage</th>
                                    <th>Booking Qty.</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="door">
                                <tr id="thread_row_add1">
                                    <td>
                                        <div class="form-group {{ $errors->has('thread_code1') ? 'has-error' : '' }}">
                                            {{ Form::text('thread_code1',null,['id'=>'thread_code1','class'=>'form-control','placeholder'=>'Thread Code']) }}
                                            @if($errors->has('thread_code1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('thread_code1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('color1') ? 'has-error' : '' }}">
                                            {{ Form::text('color1',null,['id'=>'color1','class'=>'form-control','placeholder'=>'Color']) }}
                                            @if($errors->has('color1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('color1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('shade_no1') ? 'has-error' : '' }}">
                                            {{ Form::text('shade_no1',null,['id'=>'shade_no1','class'=>'form-control','placeholder'=>'Shade No.']) }}
                                            @if($errors->has('shade_no1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('shade_no1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('count1') ? 'has-error' : '' }}">
                                            {{ Form::text('count1',null,['id'=>'count1','class'=>'form-control','placeholder'=>'Count']) }}
                                            @if($errors->has('count1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('count1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('process1') ? 'has-error' : '' }}">
                                            {{ Form::text('process1',null,['id'=>'process1','class'=>'form-control','placeholder'=>'Process Name']) }}
                                            @if($errors->has('process1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('process1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('gmnts_qty1') ? 'has-error' : '' }}">
                                            {{ Form::text('gmnts_qty1',null,['id'=>'gmnts_qty1','onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Order Qty.']) }}
                                            @if($errors->has('gmnts_qty1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('consumption1') ? 'has-error' : '' }}">
                                            {{ Form::text('consumption1',null,['id'=>'consumption1','onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'per.gmnts. consumption']) }}
                                            @if($errors->has('consumption1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('consumption1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('total_meter1') ? 'has-error' : '' }}">
                                            {{ Form::text('total_meter1',null,['id'=>'total_meter1','class'=>'form-control','placeholder'=>'Total Meter','readonly']) }}
                                            @if($errors->has('total_meter1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('total_meter1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('cons_meter1') ? 'has-error' : '' }}">
                                            {{ Form::text('cons_meter1',null,['id'=>'cons_meter1','onKeyup'=>'total_cones()','class'=>'form-control','placeholder'=>'Per Cons in Meter']) }}
                                            @if($errors->has('cons_meter1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('cons_meter1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('total_cons1') ? 'has-error' : '' }}">
                                            {{ Form::text('total_cons1',null,['id'=>'total_cons1','class'=>'form-control','placeholder'=>'Total Cons']) }}
                                            @if($errors->has('total_cons1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('total_cons1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('percentage1') ? 'has-error' : '' }}">
                                            {{ Form::text('percentage1',null,['id'=>'percentage1','onKeyup'=>'booking_qty()','class'=>'form-control','placeholder'=>'Percentage']) }}
                                            @if($errors->has('percentage1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('percentage1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->has('booking1') ? 'has-error' : '' }}">
                                            {{ Form::text('booking1',null,['id'=>'booking1','class'=>'form-control','placeholder'=>'Total Booking']) }}
                                            @if($errors->has('booking1'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('booking1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove','onclick'=>'remove()']) }} ||
                                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }}
                                    </td>
                                </tr>

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
        var $div = $('tr[id^="thread_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'thread_row_add'+num);

        $('input[id^="thread_code"]:last').prop('id','thread_code'+num).prop('name','thread_code'+num);
        $('input[id^="color"]:last').prop('id','color'+num).prop('name','color'+num);
        $('input[id^="shade_no"]:last').prop('id','shade_no'+num).prop('name','shade_no'+num);
        $('input[id^="count"]:last').prop('id','count'+num).prop('name','count'+num);
        $('input[id^="process"]:last').prop('id','process'+num).prop('name','process'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="consumption"]:last').prop('id','consumption'+num).prop('name','consumption'+num);
        $('input[id^="total_meter"]:last').prop('id','total_meter'+num).prop('name','total_meter'+num);
        $('input[id^="cons_meter"]:last').prop('id','cons_meter'+num).prop('name','cons_meter'+num);
        $('input[id^="total_cons"]:last').prop('id','total_cons'+num).prop('name','total_cons'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="booking"]:last').prop('id','booking'+num).prop('name','booking'+num);

        $klon.appendTo($("#door"));

    }

    function qty_calculate() {
        var gmnts_qty = document.getElementById('gmnts_qty1').value;
        var consumption = document.getElementById('consumption1').value;
        var result = document.getElementById('total_meter1');
        var myResult = gmnts_qty * consumption;
        result.value = myResult;
    }

    function total_cones(){
        var total_meter = document.getElementById('total_meter1').value;
        var cons_meter = document.getElementById('cons_meter1').value;
        var result = document.getElementById('total_cons1');
        var myResult = total_meter / cons_meter;
        result.value = myResult;
    }
    function booking_qty(){
        var total_cons = document.getElementById('total_cons1').value;
        var percentage = document.getElementById('percentage1').value;
        var result = document.getElementById('booking1');
        var myResult = total_cons * (percentage * 0.01);
        var booking_qty = parseInt(total_cons) + parseInt(myResult);
        result.value = booking_qty;
    }
</script>

