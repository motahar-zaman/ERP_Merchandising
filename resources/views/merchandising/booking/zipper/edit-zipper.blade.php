@extends('layouts.fixed')
{{--Edit Zipper By Nishat--}}
@section('title','WELL-GROUP | ZIPPER BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Zipper Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Zipper booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($zipper,array('method' => 'post', 'route' => ['zipper.update', $zipper->id])) }}
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('to','To: ') }}
                            {{ Form::text('to',null,['class'=>'form-control','placeholder'=>'To']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('attn','ATTN: ') }}
                            {{ Form::text('attn',null,['class'=>'form-control','placeholder'=>'Attn']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('sub','Subject: ') }}
                            {{ Form::text('sub',null,['class'=>'form-control','placeholder'=>'Sub']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('date','Date: ') }}
                            {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('budget_sheet_id','Budget Sheet Style: ') }}
                            {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('style_no','Zipper Style No: ') }}
                            {{ Form::text('style_no',null,['class'=>'form-control','placeholder'=>'Zipper Style No.']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('zipp_desc','Zipper Description: ') }}
                            {{ Form::textarea('zipp_desc',null,['class'=>'form-control','placeholder'=>'Zipper Desc.']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
                                        <th>Size</th>
                                        <th>Zipper Tape Color</th>
                                        <th>Color Code</th>
                                        <th>Zipper Length</th>
                                        <th>Zipper Color</th>
                                        <th>Gmnts Qty</th>
                                        <th>With Percentage(%)</th>
                                        <th>Booking Qty.</th>
                                        <th>Remarks </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="door">
                                    @php $num =0; @endphp
                                    @foreach($zipper->zipper_booking_details as $zipper_booking_detail)
                                    @php $num++; @endphp

                                        <tr id="zipper_row_add{{$num}}">
                                        <td>
                                            <div class="form-group {{ $errors->has('size'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('size'.$num,$zipper_booking_detail ? $zipper_booking_detail->size :null,['id'=>'size'.$num,'class'=>'form-control','placeholder'=>'Size']) }}
                                                @if($errors->has('size'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('size'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('tape_color'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('tape_color'.$num,$zipper_booking_detail ? $zipper_booking_detail->tape_color :null,['id'=>'tape_color'.$num,'class'=>'form-control','placeholder'=>'Tape Color']) }}
                                                @if($errors->has('tape_color'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('tape_color'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('color_code'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('color_code'.$num,$zipper_booking_detail ? $zipper_booking_detail->color_code :null,['id'=>'color_code'.$num,'class'=>'form-control','placeholder'=>'Color Code']) }}
                                                @if($errors->has('color_code'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('color_code'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('length'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('length'.$num,$zipper_booking_detail ? $zipper_booking_detail->length :null,['id'=>'length'.$num,'class'=>'form-control','placeholder'=>'Length']) }}
                                                @if($errors->has('length'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('length'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group{{ $errors->has('zipper_color'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('zipper_color'.$num,$zipper_booking_detail ? $zipper_booking_detail->zipper_color :null,['id'=>'zipper_color'.$num,'class'=>'form-control','placeholder'=>'Select Color']) }}
                                                @if ($errors->has('zipper_color'.$num))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('zipper_color'.$num) }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('gmnts_qty'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmnts_qty'.$num,$zipper_booking_detail ? $zipper_booking_detail->gmnts_qty :null,['id'=>'gmnts_qty'.$num,'class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
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
                                                {{ Form::text('percentage'.$num,$zipper_booking_detail ? $zipper_booking_detail->percentage :null,['id'=>'percentage'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Percentage']) }}
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
                                                {{ Form::text('book_qty'.$num,$zipper_booking_detail ? $zipper_booking_detail->book_qty :null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book Qty']) }}
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
                                                {{ Form::text('remarks'.$num,$zipper_booking_detail ? $zipper_booking_detail->remarks :null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
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
        </div>
    </section>

@endsection

@section('script')

<script>

    function remove() {
        $(document).on("click","#remove",function () {
            $(this).parent().parent().remove();
        });
    }

    // Add new row
    function addRow(){
        // get the last DIV which ID starts with ^= "product"
        var $div = $('tr[id^="zipper_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'zipper_row_add'+num);

        $('input[id^="size"]:last').prop('id','size'+num).prop('name','size'+num);
        $('input[id^="tape_color"]:last').prop('id','tape_color'+num).prop('name','tape_color'+num);
        $('input[id^="color_code"]:last').prop('id','color_code'+num).prop('name','color_code'+num);
        $('input[id^="length"]:last').prop('id','length'+num).prop('name','length'+num);
        $('input[id^="zipper_color"]:last').prop('id','zipper_color'+num).prop('name','zipper_color'+num);
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

@stop