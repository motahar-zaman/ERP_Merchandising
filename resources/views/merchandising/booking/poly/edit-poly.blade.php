@extends('layouts.fixed')
{{--Edit Poly By Nishat--}}
@section('title','WELL-GROUP | POLY BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Poly Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Poly booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($poly,array('method' => 'post', 'route' => ['poly.update', $poly->id])) }}
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
                        {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
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
                                        <th>Adhesive </th>
                                        <th>Hanger Cut </th>
                                        <th>Air Hole </th>
                                        <th>Type Of Poly </th>
                                        <th>GMTS Qty</th>
                                        <th>Pcs Per Poly/Blister</th>
                                        <th>Required Qty.</th>
                                        <th>With Percentage(%)</th>
                                        <th>Booking Qty.</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="door">
                                    @php $num =0; @endphp
                                    @foreach($poly->poly_booking_details as $poly_detail)
                                    @php $num++; @endphp

                                        <tr id="poly_row_add{{$num}}">
                                        <td>
                                            <div class="form-group {{ $errors->has('style'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('style'.$num,$poly_detail ? $poly_detail->style :null,['id'=>'style'.$num,'class'=>'form-control','placeholder'=>'Style']) }}
                                                @if($errors->has('style'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('style'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('gmts_size'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmts_size'.$num,$poly_detail ? $poly_detail->gmts_size :null,['id'=>'gmts_size'.$num,'class'=>'form-control','placeholder'=>'Gmts Size']) }}
                                                @if($errors->has('gmts_size'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('gmts_size'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('ord_type'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('ord_type'.$num,$poly_detail ? $poly_detail->ord_type :null,['id'=>'ord_type'.$num,'class'=>'form-control','placeholder'=>'Type']) }}
                                                @if($errors->has('ord_type'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('ord_type'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('length'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('length'.$num,$poly_detail ? $poly_detail->length :null,['id'=>'length'.$num,'class'=>'form-control','placeholder'=>'Length']) }}
                                                @if($errors->has('length'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('length'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('width'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('width'.$num,$poly_detail ? $poly_detail->width :null,['id'=>'width'.$num,'class'=>'form-control','placeholder'=>'Width']) }}
                                                @if($errors->has('width'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('width'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('adhesive'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('adhesive'.$num,$poly_detail ? $poly_detail->adhesive :null,['id'=>'adhesive'.$num,'class'=>'form-control','placeholder'=>'Adhesive']) }}
                                                @if($errors->has('adhesive'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('adhesive'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('hang_cut'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('hang_cut'.$num,$poly_detail ? $poly_detail->hang_cut :null,['id'=>'hang_cut'.$num,'class'=>'form-control','placeholder'=>'Hanger Cut']) }}
                                                @if($errors->has('hang_cut'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('hang_cut'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('air_hole'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('air_hole'.$num,$poly_detail ? $poly_detail->air_hole :null,['id'=>'air_hole'.$num,'class'=>'form-control','placeholder'=>'Air Hole']) }}
                                                @if($errors->has('air_hole'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('air_hole'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('type_of_poly'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('type_of_poly'.$num,$poly_detail ? $poly_detail->type_of_poly :null,['id'=>'type_of_poly'.$num,'class'=>'form-control','placeholder'=>'Poly Type']) }}
                                                @if($errors->has('type_of_poly'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('type_of_poly'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('gmnts_qty'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmnts_qty'.$num,$poly_detail ? $poly_detail->gmnts_qty :null,['id'=>'gmnts_qty'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
                                                @if($errors->has('gmnts_qty'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('pcs_per_poly'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('pcs_per_poly'.$num,$poly_detail ? $poly_detail->pcs_per_poly :null,['id'=>'pcs_per_poly'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Pcs Per Poly']) }}
                                                @if($errors->has('pcs_per_poly'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('pcs_per_poly'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('req_qty'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('req_qty'.$num,$poly_detail ? $poly_detail->req_qty :null,['id'=>'req_qty'.$num,'class'=>'form-control','placeholder'=>'Req Qty.']) }}
                                                @if($errors->has('req_qty'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('req_qty'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td><td>
                                            <div class="form-group {{ $errors->has('percentage'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('percentage'.$num,$poly_detail ? $poly_detail->percentage :null,['id'=>'percentage'.$num,'onKeyup'=>'req_qty_cal()','class'=>'form-control','placeholder'=>'Percentage']) }}
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
                                                {{ Form::text('book_qty'.$num,$poly_detail ? $poly_detail->book_qty :null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book Qty.']) }}
                                                @if($errors->has('book_qty'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('book_qty'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('remarks'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('remarks'.$num,$poly_detail ? $poly_detail->remarks :null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
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
        $('input[id^="adhesive"]:last').prop('id','adhesive'+num).prop('name','adhesive'+num);
        $('input[id^="hang_cut"]:last').prop('id','hang_cut'+num).prop('name','hang_cut'+num);
        $('input[id^="air_hole"]:last').prop('id','air_hole'+num).prop('name','air_hole'+num);
        $('input[id^="type_of_poly"]:last').prop('id','type_of_poly'+num).prop('name','type_of_poly'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="pcs_per_poly"]:last').prop('id','pcs_per_poly'+num).prop('name','pcs_per_poly'+num);
        $('input[id^="req_qty"]:last').prop('id','req_qty'+num).prop('name','req_qty'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="book_qty"]:last').prop('id','book_qty'+num).prop('name','book_qty'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);

        $klon.appendTo($("#door"));

    }

    function qty_calculate() {
        var gmnts_qty = document.getElementById('gmnts_qty').value;
        var pcs_per_poly = document.getElementById('pcs_per_poly').value;
        var result = document.getElementById('req_qty');
        var myResult = gmnts_qty * pcs_per_poly;
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

