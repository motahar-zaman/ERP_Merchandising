@extends('layouts.fixed')
{{--Add Poly By Nishat--}}
@section('title','WELL-GROUP | CARTON BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Carton Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Carton booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::open(['action'=>'Merchandise\CartonBookingController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
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
                        {{ Form::label('date','Booking Date: ') }}
                        {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('req_del_date','Required Del. Date: ') }}
                        {{ Form::date('req_del_date',null,['class'=>'form-control','placeholder'=>'']) }}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                    <br>
                    <div class="from-group">
                        {{ Form::label('style','Budget Sheet Style: ') }}
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
                        {{ Form::open(['action'=>'Merchandise\PolyBookingController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Style</th>
                                        <th>Gmts Size</th>
                                        <th>Order Type</th>
                                        <th>Length </th>
                                        <th>Width </th>
                                        <th>Height </th>
                                        <th>Type Of Carton </th>
                                        <th>GMTS Qty</th>
                                        <th>Pcs Per Carton</th>
                                        <th>Required Qty.</th>
                                        <th>With Percentage(%)</th>
                                        <th>Booking Qty.</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="door">
                                    <tr id="poly_row_add1">
                                        <td>
                                            <div class="form-group {{ $errors->has('style1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('style1',null,['id'=>'style1','class'=>'form-control','placeholder'=>'Style']) }}
                                                @if($errors->has('style1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('style1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('gmts_size1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmts_size1',null,['id'=>'gmts_size1','class'=>'form-control','placeholder'=>'Gmts Size']) }}
                                                @if($errors->has('gmts_size1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('gmts_size1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('ord_type1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('ord_type1',null,['id'=>'ord_type1','class'=>'form-control','placeholder'=>'Type']) }}
                                                @if($errors->has('ord_type1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('ord_type1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('length1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('length1',null,['id'=>'length1','class'=>'form-control','placeholder'=>'Length']) }}
                                                @if($errors->has('length1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('length1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('width1') ? 'has-error' : '' }}">
                                                {{ Form::text('width1',null,['id'=>'width1','class'=>'form-control','placeholder'=>'Width']) }}
                                                @if($errors->has('width1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('width1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('height1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('height1',null,['id'=>'height1','class'=>'form-control','placeholder'=>'Height']) }}
                                                @if($errors->has('height1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('height1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('type_of_carton1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('type_of_carton1',null,['id'=>'type_of_carton1','class'=>'form-control','placeholder'=>'Carton Type']) }}
                                                @if($errors->has('type_of_carton1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('type_of_carton1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('gmnts_qty1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmnts_qty1',null,['id'=>'gmnts_qty1','onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
                                                @if($errors->has('gmnts_qty1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('pcs_per_carton1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('pcs_per_carton1',null,['id'=>'pcs_per_carton1','onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Pcs Per Poly']) }}
                                                @if($errors->has('pcs_per_poly1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('pcs_per_carton1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('req_qty1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('req_qty1',null,['id'=>'req_qty1','class'=>'form-control','placeholder'=>'Req Qty.']) }}
                                                @if($errors->has('req_qty1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('req_qty1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td><td>
                                            <div class="form-group {{ $errors->has('percentage1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('percentage1',null,['id'=>'percentage1','onKeyup'=>'req_qty_cal()','class'=>'form-control','placeholder'=>'Percentage']) }}
                                                @if($errors->has('percentage1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('percentage1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group {{ $errors->has('book_qty1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('book_qty1',null,['id'=>'book_qty1','class'=>'form-control','placeholder'=>'Book Qty.']) }}
                                                @if($errors->has('book_qty1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('book_qty1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('remarks1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('remarks1',null,['id'=>'remarks1','class'=>'form-control','placeholder'=>'Remarks']) }}
                                                @if($errors->has('remarks1'))
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
        var $div = $('tr[id^="poly_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'poly_row_add'+num);

        $('input[id^="style"]:last').prop('id','style'+num).prop('name','style'+num);
        $('input[id^="gmts_size"]:last').prop('id','gmts_size'+num).prop('name','gmts_size'+num);
        $('input[id^="ord_type"]:last').prop('id','ord_type'+num).prop('name','ord_type'+num);
        $('input[id^="length"]:last').prop('id','length'+num).prop('name','length'+num);
        $('input[id^="width"]:last').prop('id','width'+num).prop('name','width'+num);
        $('input[id^="height"]:last').prop('id','height'+num).prop('name','height'+num);
        $('input[id^="type_of_carton"]:last').prop('id','type_of_carton'+num).prop('name','type_of_carton'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="pcs_per_carton"]:last').prop('id','pcs_per_carton'+num).prop('name','pcs_per_carton'+num);
        $('input[id^="req_qty"]:last').prop('id','req_qty'+num).prop('name','req_qty'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="book_qty"]:last').prop('id','book_qty'+num).prop('name','book_qty'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));

    }

    function qty_calculate() {
        var gmnts_qty = document.getElementById('gmnts_qty1').value;
        var pcs_per_carton = document.getElementById('pcs_per_carton1').value;
        var result = document.getElementById('req_qty1');
        var myResult = (gmnts_qty/pcs_per_carton);
        result.value = myResult;
    }

    function req_qty_cal(){
        var req_qty = document.getElementById('req_qty1').value;
        var percentage = document.getElementById('percentage1').value;
        var result = document.getElementById('book_qty1');
        var myResult = req_qty * (percentage*0.01);
        var booking_qty = parseInt(req_qty) + parseInt(myResult);
        result.value = booking_qty;
    }
</script>

