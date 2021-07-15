@extends('layouts.fixed')

@section('title','WELL-GROUP | Time & Action Plan')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Product Time And Action Plan</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Product Time And Action Plan</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Merchandise\ActionPlanController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
<section class="content">
    <div class="col-lg-12">
        <div class="card"><br>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('','Order Summary No : ') }}
                                        {{ Form::text('order_summary_no',$order_summary_no, ['class'=>'form-control ','readonly']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('','Input Date : ') }}
                                        {{ Form::date('input_date',null, ['class'=>'form-control ','placeholder'=>'Enter Date:']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('','Merchant Team : ') }}
                                        {{ Form::text('merchant_team',null, ['class'=>'form-control ','placeholder'=>'Enter Team Name:']) }}
                                    </div>
                                </div>
                            </div>
                            <br>
                                <div class="heading">
                                    <h3 style="background-color: #0c5460;text-align: center;color: white">Order Summary</h3>
                                </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('unit_id','Factory: ') }}
                                        {{ Form::select('unit_id',$repository->AllCompanyUnit(),null,['class'=>'form-control','placeholder'=>'Select Factory']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('buyer_id','Buyer Name: ') }}
                                        {{ Form::select('buyer_id',$buyers,null,['class'=>'form-control','placeholder'=>'Select Buyer']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('payment_term','Buyer Payment Terms: ') }}
                                        {{ Form::select('payment_term',$payment_terms,null,['class'=>'form-control','placeholder'=>'Select Payment Terms']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="form-group {{ $errors->has('front_image') ? 'has-error' : '' }}">
                                        {{ Form::label('front_image','Product Front Picture:') }}
                                        {{ Form::file("front_image",['class'=>'form-control']) }}
                                        @if($errors->has("front_image"))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('front_image') }}
                                                </strong>
                                        @endif
                                            </span>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="form-group {{ $errors->has('back_image') ? 'has-error' : '' }}">
                                        {{ Form::label('back_image','Product Back Picture:') }}
                                        {{ Form::file("back_image",['class'=>'form-control']) }}
                                        @if($errors->has("back_image"))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('back_image') }}
                                                </strong>
                                        @endif
                                            </span>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('','Item Name : ') }}
                                        {{ Form::text('item',null, ['class'=>'form-control ','placeholder'=>'Enter Item Name:']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('style_id','Style Name: ') }}
                                        {{ Form::select('style_id',$Styles,null,['class'=>'form-control','placeholder'=>'Select Style:','required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('spec_group','Spec Group : ') }}
                                        {{ Form::text('spec_group',null, ['class'=>'form-control ','placeholder'=>'Enter Spec Group:']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('size_range','Size Range : ') }}
                                        {{ Form::text('size_range',null, ['class'=>'form-control ','placeholder'=>'Enter Size Range:']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('confirmation_date','Order Confirmation Date : ') }}
                                        {{ Form::date('confirmation_date',null, ['class'=>'form-control ','placeholder'=>'Enter confirmation date:']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('po_issue_date','Po Issue Date : ') }}
                                        {{ Form::date('po_issue_date',null, ['class'=>'form-control ','placeholder'=>'Enter Po Issue date:']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('lc_contract_rcv_date','L/C Sales Contract Received Date : ') }}
                                        {{ Form::date('lc_contract_rcv_date',null, ['class'=>'form-control ','placeholder'=>'L/C Sales Contract Received Date:']) }}
                                    </div>
                                </div>
                            </div>
                        <br>
                        <br>
                        <br>
                        <div class="row" style="padding-bottom: 20px; ">
                            <div class="col-lg-6 card" style="padding-top: 20px">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('color_name') ? 'has-error' : '' }}">
                                            {{ Form::label('','Garments Color Name : ') }}
                                            <br>
                                            <br>
                                            {{ Form::text('color_name',null,['class'=>'form-control','placeholder'=>'Enter Color Name:']) }}
                                            @if($errors->has('color_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('color_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('fob_price_pcs') ? 'has-error' : '' }}">
                                            {{ Form::label('','Budget Approved FOB Price(Pcs) : ') }}
                                            {{ Form::text('fob_price_pcs',null,['class'=>'form-control','placeholder'=>'Enter Price:']) }}
                                            @if($errors->has('fob_price_pcs'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('fob_price_pcs') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('cm_price_pcs') ? 'has-error' : '' }}">
                                            {{ Form::label('','Budget Approved CM Price(Pcs) : ') }}
                                            {{ Form::text('cm_price_pcs',null,['class'=>'form-control','placeholder'=>'Enter Price:']) }}
                                            @if($errors->has('cm_price_pcs'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('cm_price_pcs') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('quantity_pcs') ? 'has-error' : '' }}">
                                            {{ Form::label('','Quantity(Pcs) : ') }}
                                            <br>
                                            <br>
                                            {{ Form::text('quantity_pcs',null,['class'=>'form-control','placeholder'=>'Enter Quantity:']) }}
                                            @if($errors->has('quantity_pcs'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('quantity_pcs') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('ship_date') ? 'has-error' : '' }}">
                                            {{ Form::label('','Garments Ship Date : ') }}
                                            {{ Form::date('ship_date',null,['class'=>'form-control','placeholder'=>'Ship Date:']) }}
                                            @if($errors->has('ship_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ship_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tna_value" id="tna_value" value="0">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info" onclick="addToList()">Add to List</button>
                                </div>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th>Action</th>
                                        <th>Color Name</th>
                                        <th>FOB Price(Pcs)</th>
                                        <th>CM Price(Pcs)</th>
                                        <th>Quantity(Pcs)</th>
                                        <th>Ship Date</th>
                                    </tr>
                                </table>
                            </div>

                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="col-md-1 btn btn-success">Save</button>
            </div>
        </div>
    </div>
    <br>
    {{ Form::close() }}
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>

        function addToList(e){
            //e.preventDefault();
            //$("#form").submit();
            var data = $("#form").serializeArray();
            var key = parseInt($('#tna_value').val());

//            alert('add to list');
            var row = '<tr id="order_summary_'+(key+1)+'">' +
                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>' +

                '<td><span id="color_name_row_'+(key+1)+'">'+$('input[name=color_name]').val()+'</span><input type="hidden" name="color_name[]" id="color_name_'+(key+1)+'" value="'+$('input[name=color_name]').val()+'"></td>' +

                '<td><span id="fob_price_pcs_row_'+(key+1)+'">'+$('input[name=fob_price_pcs]').val()+'</span><input type="hidden" name="fob_price_pcs[]" id="fob_price_pcs_'+(key+1)+'" value="'+$('input[name=fob_price_pcs]').val()+'"></td>' +

                '<td><span id="cm_price_pcs_row_'+(key+1)+'">'+$('input[name=cm_price_pcs]').val()+'</span><input type="hidden" name="cm_price_pcs[]" id="cm_price_pcs_'+(key+1)+'" value="'+$('input[name=cm_price_pcs]').val()+'"></td>' +

                '<td><span id="quantity_pcs_row_'+(key+1)+'">'+$('input[name=quantity_pcs]').val()+'</span><input type="hidden" name="quantity_pcs[]" id="quantity_pcs_'+(key+1)+'" value="'+$('input[name=quantity_pcs]').val()+'"></td>' +

                '<td><span id="ship_date_row_'+(key+1)+'">'+$('input[name=ship_date]').val()+'</span><input type="hidden" name="ship_date[]" id="ship_date_'+(key+1)+'" value="'+$('input[name=ship_date]').val()+'"></td>' +

                '</tr>';
            $("#table").append(row);
            // $('#2nd_form').trigger("reset");
        }

        function removeRow(key){
            $('#order_summary_'+key).remove();
        }

        function editRow(key){
            var color_name = $('#color_name_'+key).val();
            var fob_price_pcs = $('#fob_price_pcs_'+key).val();
            var cm_price_pcs = $('#cm_price_pcs_'+key).val();
            var quantity_pcs = $('#quantity_pcs_'+key).val();
            var ship_date = $('#ship_date_'+key).val();
            
            $.alert({
                 title: 'Edit Order Summary',
                 content: "url:{{url('actionPlan/order_summary/edit/')}}/"+color_name +'&'+fob_price_pcs +'&'+cm_price_pcs +'&'+quantity_pcs+'&'+ship_date,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   close: {
                     text: 'Save',
                     btnClass: 'btn-default',
                     action: function(){

                         $('#color_name_row_'+key).html($('#color_name_edit').val());
                         $('#fob_price_pcs_row_'+key).html($('#fob_price_pcs_edit').val());
                         $('#cm_price_pcs_row_'+key).html($('#cm_price_pcs_edit').val());
                         $('#quantity_pcs_row_'+key).html($('#quantity_pcs_edit').val());
                         $('#ship_date_row_'+key).html($('#ship_date_edit').val());

                         
                         $('#color_name_'+key).val($('#color_name_edit').val());
                         $('#fob_price_pcs_'+key).val($('#fob_price_pcs_edit').val());
                         $('#cm_price_pcs_'+key).val($('#cm_price_pcs_edit').val());
                         $('#quantity_pcs_'+key).val($('#quantity_pcs_edit').val());
                         $('#ship_date_'+key).val($('#ship_date_edit').val());

                        //return false;

                     }
                   }
                }
           });
        }
    </script>
    @endsection
