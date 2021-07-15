@extends('layouts.fixed')
{{--Add Zipper By Nishat--}}
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
                {{ Form::open(['action'=>'Merchandise\ZipperBookingController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('unit_id','Company Unit: ') }}
                            {{ Form::select('unit_id',$repository->AllCompanyUnit(),null,['class'=>'form-control','placeholder'=>'Select Unit']) }}
                        </div>
                    </div>
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
                            {{ Form::select('budget_sheet_id',$budget_sheet_style,null,['class'=>'form-control','placeholder'=>'Select Style','required']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('style_no','Zipper Style No: ') }}
                            {{ Form::text('style_no',null,['class'=>'form-control','placeholder'=>'Zipper Style No.']) }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('buyer_name','Buyer Name: ') }}
                            {{ Form::text('buyer_name',null,['class'=>'form-control','placeholder'=>'Buyer Name']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <br>
                        <div class="from-group">
                            {{ Form::label('zipp_desc','Zipper Description: ') }}
                            {{ Form::textarea('zipp_desc',null,['class'=>'form-control','placeholder'=>'Zipper Desc.']) }}
                        </div>
                    </div>


                    <div class="col-12">
                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Gmts Size</th>
                                        <th>Zipper Tape Color</th>
                                        <th>Color Code</th>
                                        <th>Zipper Metal Color</th>
                                        <th>Zipper Details</th>
                                        <th>Zipper Length</th>
                                        <th>Gmnts Qty</th>
                                        <th>With Percentage(%)</th>
                                        <th>Booking Qty.</th>
                                        <th>Remarks </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="door">
                                    <tr id="zipper_row_add1">
                                        <td>
                                            <div class="form-group {{ $errors->has('size1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('size1',null,['id'=>'size1','class'=>'form-control','placeholder'=>'Gmts Size']) }}
                                                @if($errors->has('size1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('size1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('tape_color1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('tape_color1',null,['id'=>'tape_color1','class'=>'form-control','placeholder'=>'Tape Color']) }}
                                                @if($errors->has('tape_color1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('tape_color1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('color_code1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('color_code1',null,['id'=>'color_code1','class'=>'form-control','placeholder'=>'Color Code']) }}
                                                @if($errors->has('color_code1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('color_code1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group{{ $errors->has('zipper_color1') ? 'has-error' : '' }}">
                                                {{ Form::text('zipper_color1',null,['id'=>'zipper_color1','class'=>'form-control','placeholder'=>'Enter Color']) }}
                                                @if ($errors->has('zipper_color1'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('zipper_color1') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group{{ $errors->has('zipper_details1') ? 'has-error' : '' }}">
                                                {{ Form::text('zipper_details1',null,['id'=>'zipper_details1','class'=>'form-control','placeholder'=>'Enter Details']) }}
                                                @if ($errors->has('zipper_details1'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('zipper_details1') }}</strong>
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
                                            <div class="form-group {{ $errors->has('gmnts_qty1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('gmnts_qty1',null,['id'=>'gmnts_qty1','class'=>'form-control','placeholder'=>'Gmnts Qty']) }}
                                                @if($errors->has('gmnts_qty1'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty1') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->has('percentage1') ? 'has-error' : '' }}">
                                                {{--{{ Form::label('','Unit : ') }}--}}
                                                {{ Form::text('percentage1',null,['id'=>'percentage1','onKeyup'=>'qty_calculate()','class'=>'form-control','placeholder'=>'Percentage']) }}
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
                                                {{ Form::text('book_qty1',null,['id'=>'book_qty1','class'=>'form-control','placeholder'=>'Book Qty']) }}
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
        $('input[id^="zipper_details"]:last').prop('id','zipper_details'+num).prop('name','zipper_details'+num);
        $('input[id^="gmnts_qty"]:last').prop('id','gmnts_qty'+num).prop('name','gmnts_qty'+num);
        $('input[id^="percentage"]:last').prop('id','percentage'+num).prop('name','percentage'+num);
        $('input[id^="book_qty"]:last').prop('id','book_qty'+num).prop('name','book_qty'+num);
        $('input[id^="remarks"]:last').prop('id','remarks'+num).prop('name','remarks'+num);
        $klon.appendTo($("#door"));

    }

    function qty_calculate() {
        var gmnts_qty = document.getElementById('gmnts_qty1').value;
        var Percentage = document.getElementById('percentage1').value;
        var myResult = gmnts_qty * (Percentage*0.01);
        var booking_qty = parseInt(gmnts_qty) + parseInt(myResult);
        var result = document.getElementById('book_qty1');
        result.value = booking_qty;
    }
</script>

@stop