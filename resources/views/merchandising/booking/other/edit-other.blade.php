@extends('layouts.fixed')
{{--Edit Other By Nishat--}}
@section('title','WELL-GROUP | Other BOOKING')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Other Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Other booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12 card">
            {{ Form::model($other,array('method' => 'post', 'route' => ['other.update', $other->id])) }}
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
                            {{ Form::label('item','Other Other Size: ') }}
                            {{ Form::text('item',null,['class'=>'form-control','placeholder'=>'Item']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('other_desc','Other Description: ') }}
                            {{ Form::textarea('other_desc',null,['class'=>'form-control','placeholder'=>'Description']) }}
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
                                        {{-- <th>Size</th>
                                        <th>Other Color</th>
                                        <th>Color Code</th>
                                        <th>Other Length</th>
                                        <th>Other Color</th> --}}
                                        <th>Item Name</th>
                                        <th>Item Desc</th>
                                        <th>Gmnts Qty</th>
                                        <th>With Percentage(%)</th>
                                        <th>Booking Qty.</th>
                                        <th>Remarks </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="door">
                                    @php $num =0; @endphp
                                    @foreach($other->other_booking_details as $other_booking_detail)
                                    @php $num++; @endphp
                                        {{-- <input type="hidden" name="detail_id{{ $num }}" value="{{ $other_booking_detail->id }}"> --}}

                                        <tr id="other_row_add{{$num}}">
                                        <td>
                                            <div class="form-group {{ $errors->has('item'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('item'.$num,$other_booking_detail ? $other_booking_detail->item :null,['id'=>'item'.$num,'class'=>'form-control','placeholder'=>'Item Name']) }}
                                                @if($errors->has('item'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('item'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group {{ $errors->has('description'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('description'.$num,$other_booking_detail ? $other_booking_detail->description :null,['id'=>'description'.$num,'class'=>'form-control','placeholder'=>'Item Desc']) }}
                                                @if($errors->has('description'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('description'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div class="form-group {{ $errors->has('size'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('size'.$num,$other_booking_detail ? $other_booking_detail->size :null,['id'=>'size'.$num,'class'=>'form-control','placeholder'=>'Size']) }}
                                                @if($errors->has('size'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('size'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('color_other'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('color_other'.$num,$other_booking_detail ? $other_booking_detail->color_other :null,['id'=>'color_other'.$num,'class'=>'form-control','placeholder'=>'Tape Color']) }}
                                                @if($errors->has('color_other'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('color_other'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('color_code'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('color_code'.$num,$other_booking_detail ? $other_booking_detail->color_code :null,['id'=>'color_code'.$num,'class'=>'form-control','placeholder'=>'Color Code']) }}
                                                @if($errors->has('color_code'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('color_code'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('length'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('length'.$num,$other_booking_detail ? $other_booking_detail->length :null,['id'=>'length'.$num,'class'=>'form-control','placeholder'=>'Length']) }}
                                                @if($errors->has('length'.$num))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('length'.$num) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group{{ $errors->has('other_color'.$num) ? 'has-error' : '' }}">
                                                {{ Form::text('other_color'.$num,$other_booking_detail ? $other_booking_detail->other_color :null,['id'=>'other_color'.$num,'class'=>'form-control','placeholder'=>'Select Color']) }}
                                                @if ($errors->has('other_color'.$num))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('other_color'.$num) }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </td> --}}
                                        <td>
                                            <div class="form-group {{ $errors->has('gmnts_qty'.$num) ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmnts_qty'.$num,$other_booking_detail ? $other_booking_detail->gmnts_qty :null,['id'=>'gmnts_qty'.$num,'class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
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
                                                {{ Form::text('percentage'.$num,$other_booking_detail ? $other_booking_detail->percentage :null,['id'=>'percentage'.$num,'onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Percentage']) }}
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
                                                {{ Form::text('book_qty'.$num,$other_booking_detail ? $other_booking_detail->book_qty :null,['id'=>'book_qty'.$num,'class'=>'form-control','placeholder'=>'Book Qty']) }}
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
                                                {{ Form::text('remarks'.$num,$other_booking_detail ? $other_booking_detail->remarks :null,['id'=>'remarks'.$num,'class'=>'form-control','placeholder'=>'Remarks']) }}
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
                                    <input type="hidden" id="total_detail" name="total_detail" value="{{ $num }}">
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
        var $div = $('tr[id^="other_row_add"]:last');


        // Read the Number from that DIV's ID (i.e: 3 from "product3")
        // And increment that number by 1
        var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

        // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
        var $klon = $div.clone().prop('id', 'other_row_add'+num);

        // $('input[id^="size"]:last').prop('id','size'+num).prop('name','size'+num);
        // $('input[id^="color_other"]:last').prop('id','color_other'+num).prop('name','color_other'+num);
        // $('input[id^="color_code"]:last').prop('id','color_code'+num).prop('name','color_code'+num);
        // $('input[id^="length"]:last').prop('id','length'+num).prop('name','length'+num);
        // $('input[id^="other_color"]:last').prop('id','other_color'+num).prop('name','other_color'+num);
        $('input[id^="item"]:last').prop('id','item'+num).prop('name','item'+num);
        $('input[id^="description"]:last').prop('id','description'+num).prop('name','description'+num);
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