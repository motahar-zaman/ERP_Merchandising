@extends('layouts.fixed')
{{--Add Fabric By Nishat--}}
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
            {{ Form::open(['action'=>'Merchandise\FabricBookingController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
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
                        {{ Form::label('buyer_name','Buyer Name: ') }}
                        {{ Form::text('buyer_name',null,['class'=>'form-control','placeholder'=>'Buyer Name']) }}
                    </div>
                </div>
                <div class="col-lg-12">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="color: darkred">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
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
                                            <th>Add Percentage (+/-)%</th>
                                            <th>Booking Qty.</th>
                                            <th>Remarks </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="door">
                                        <tr id="fabric_row_add1">
                                            <td>

                                                <div class="form-group {{ $errors->has('fabric_name1') ? 'has-error' : '' }}">
                                                    {{ Form::text('fabric_name1',null,['id'=>'fabric_name1','class'=>'form-control','placeholder'=>'Fabric Details']) }}
                                                    @if($errors->has('fabric_name1'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('fabric_name1') }}</strong>
                                                     </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('color1') ? 'has-error' : '' }}">
                                                    {{ Form::text('color1',null,['id'=>'color1','class'=>'form-control','placeholder'=>'Select Color']) }}
                                                    @if($errors->has('color1'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('color1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('gmnts_qty1') ? 'has-error' : '' }}">
                                                    {{ Form::text('gmnts_qty1',null,['id'=>'gmnts_qty1','class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'Gmnts Qty']) }}
                                                    @if($errors->has('gmnts_qty'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('gmnts_qty1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('consumption1') ? 'has-error' : '' }}">
                                                    {{ Form::text('consumption1',null,['id'=>'consumption1','class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'consumption']) }}
                                                    @if($errors->has('consumption1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('consumption1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('req_qty1') ? 'has-error' : '' }}">
                                                    {{ Form::text('req_qty1',null,['id'=>'req_qty1','class'=>'form-control','placeholder'=>'Req. Qty','readonly']) }}
                                                    @if($errors->has('req_qty1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('req_qty1') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->has('percentage1') ? 'has-error' : '' }}">
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
                                                    {{ Form::text('book_qty1',null,['id'=>'book_qty1','class'=>'form-control','placeholder'=>'Book. Qty']) }}
                                                    @if($errors->has('book_qty1'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('book_qty1') }}</strong>
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
        var gmnts_qty = document.getElementById('gmnts_qty1').value;
        var consumption = document.getElementById('consumption1').value;
        var result = document.getElementById('req_qty1');
        var myResult = gmnts_qty * consumption;
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

