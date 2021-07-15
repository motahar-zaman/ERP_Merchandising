@extends('layouts.fixed')

@section('title','WELL-GROUP')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1 style="margin-left: 20px">Create Budget Sheet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home 1</a></li>
                        <li class="breadcrumb-item active">Create Budget Sheet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
<section class="content">
    <div class="col-lg-12">
        <div class="card"><br>
            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <!-- {{-- <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#basic_info" data-toggle="tab" style="font-weight: bold;">Basic Info</a></li>
                                <li class="nav-item"><a class="nav-link" href="#fabric_content" data-toggle="tab" style="font-weight: bold;">Fabric Information</a></li>
                                <li class="nav-item"><a class="nav-link" href="#appointed_trims" data-toggle="tab" style="font-weight: bold;">Appointed Trims</a></li>
                                <li class="nav-item"><a class="nav-link" href="#other_trims" data-toggle="tab" style="font-weight: bold;">Packaging Trims</a></li>
                                <li class="nav-item"><a class="nav-link" href="#other_cost" data-toggle="tab" style="font-weight: bold;">Other Cost</a></li>
                            </ul>
                        </div> --}} -->

                        {{ Form::open(['action'=>'Merchandise\BudgetSheetController@store','method'=>'POST', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="card-body">
                            <ul>
                                @php $i=0; @endphp
                                @foreach($errors->all() as $error)
                                    <li> {{ ++$i }} <span class="has-error"><strong> {{ $error }} </strong></span></li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="basic_info">
                                   {{-- @include('merchandising.budget_sheet.basic-info') --}}
                                   {{-- Personal Hrm Start --}}
                                   <fieldset style="border: 1px groove #663399 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="width:inherit;padding:0 10px;border-bottom:none;">Basic Information</legend>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('unit_id','Company Unit: ') }}
                                                {{ Form::select('unit_id',$repository->AllCompanyUnit(),$cost_breakdown ? $cost_breakdown->unit_id : '',['class'=>'form-control','placeholder'=>'Select Unit']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <input type='hidden' value="<?php echo $cost_sheet_id; ?>" name='cost_sheet_id'>
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('country_id','Country: ') }}
                                                {{ Form::select('country_id',$repository->countries(),$cost_breakdown ? $cost_breakdown->country_id:null,['class'=>'form-control','placeholder'=>'Country']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('merchandiser_name','Merchandiser : ') }}
                                                {{ Form::text('merchandiser_name',$cost_breakdown ? $cost_breakdown->merchandiser_name:null,['class'=>'form-control ','placeholder'=>'Merchandiser']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('consumer_name','Consumer: ') }}
                                                {{ Form::text('consumer_name',$cost_breakdown ? $cost_breakdown->consumer_name:null,['class'=>'form-control','placeholder'=>'Consumer']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('product_description','Product Description : ') }}
                                                {{ Form::text('product_description',$cost_breakdown ? $cost_breakdown->product_description:null,['class'=>'form-control','placeholder'=>'Product Description  ']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('style','Style: ') }}
                                                {{ Form::text('style',$cost_breakdown ? $cost_breakdown->style:null,['class'=>'form-control','placeholder'=>'Style']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('size_range','Size Range : ') }}
                                                {{ Form::text('size_range',$cost_breakdown ? $cost_breakdown->size_range:null,['class'=>'form-control ','placeholder'=>'Size Range']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('size_ratio','Size Ratio : ') }}
                                                {{ Form::text('size_ratio',$cost_breakdown ? $cost_breakdown->size_ratio:null,['class'=>'form-control ','placeholder'=>'Size Ratio']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('specs','Specs: ') }}
                                                {{ Form::text('specs',$cost_breakdown ? $cost_breakdown->specs:null,['class'=>'form-control ','placeholder'=>'Specs']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('estimate_garments','Estimate Gmts del : ') }}
                                                {{ Form::text('estimate_garments',$cost_breakdown ? $cost_breakdown->estimate_garments:null,['class'=>'form-control ','placeholder'=>'Estimate Gmts del']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('estimate_qty','ORDER QTY : ') }}
                                                {{ Form::text('estimate_qty',$cost_breakdown ? $cost_breakdown->estimate_qty:null,['class'=>'form-control ','placeholder'=>'Estimate Qty']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('fob','Confirmed FOB : ') }}
                                                {{ Form::text('fob',$cost_breakdown ? $cost_breakdown->fob:null,['class'=>'form-control ','placeholder'=>'Fob','required']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('consumption','Consumption : ') }}
                                                {{ Form::text('consumption',$cost_breakdown ? $cost_breakdown->consumption:null,['class'=>'form-control ','placeholder'=>'consumption']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('pocket_fab_yy','Pocket Fabric YY : ') }}
                                                {{ Form::text('pocket_fab_yy',$cost_breakdown ? $cost_breakdown->pocket_fab_yy:null,['class'=>'form-control ','placeholder'=>'Pocket Fabric YY']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('quote_id','Select Price Quotation Type: ') }}
                                                {{ Form::select('quote_id',$repository->AllPriceQuote(),$cost_breakdown ? $cost_breakdown->quote_id : '',['class'=>'form-control','placeholder'=>'Select Type']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('payment_terms','Payment Terms : ') }}
                                                {{ Form::text('payment_terms',$cost_breakdown ? $cost_breakdown->payment_terms : null,['class'=>'form-control ','placeholder'=>'Payment Terms']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <br>
                                            <div class="from-group">
                                                {{ Form::label('','Sketch : ') }} &nbsp; &nbsp;&nbsp;
                                                @for($i=1;$i<=sizeof($repository->check_box());$i++)
                                                    {{ Form::radio('has_sketch',$i,['class'=>'form-control']) }} {{ $repository->check_box()[$i] }}
                                                @endfor
                                            </div>
                                            <div class="from-group">
                                                {{ Form::label('','Size Ratio : ') }} &nbsp; &nbsp;
                                                @for($i=1;$i<=sizeof($repository->check_box());$i++)
                                                    {{ Form::radio('has_size_ratio',$i,['class'=>'form-control']) }} {{ $repository->check_box()[$i] }}
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <br>
                                            <div class="form-group {{ $errors->has('front_image') ? 'has-error' : '' }}">
                                                {{ Form::label('front_image','Front Image:') }}
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
                                                {{ Form::label('back_image','Back Image:') }}
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

                                    </div>{{-- row end --}}
                                   </fieldset>
                                    {{-- Personal Hrm End --}}
                                    <fieldset style="border: 1px groove #663399 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                        <legend style="width:inherit;padding:0 10px;border-bottom:none;">Fabric Information</legend>
                                    <div class="row">
                                        <div class="col-lg-12 card">
                                            {{--START BY AHMED --}}
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fabric <br> Content</th>
                                                        <th>Description<br></th>
                                                        <th>Fabric <br> Type</th>
                                                        <th>Orginal Qty
                                                        </th>
                                                        <!-- <th>Total Consumption<br>
                                                            <input type="hidden" id="fabric_tcon" value="{{$cost_breakdown->estimate_qty}}">
                                                            (TCon=A*{{$cost_breakdown->estimate_qty}})
                                                        </th> -->
                                                        <!-- {{-- <th>Unit</th> --}} -->
                                                        <th>Booking %<br></th>
                                                        <th>Order Qty(Dz/Yds/KGS/GRS/GG)<br></th>
                                                        <th>Price</th>
                                                        <th>Total Price</th>
                                                          <th>Supplier <br></th>
                                                        <th>Action<br></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="door">
                                                {{--start 1 row --}}
                                                    {{--@php--}}
                                                        {{--$gross_fabric_cost=0;--}}
                                                    {{--@endphp--}}
                                                @if($cost_breakdown_fabric->count() >0)
                                                    @foreach($cost_breakdown_fabric as $fabric)
                                                            <tr id="product{{$num}}">
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fabric_content1') ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::text('fabric_content'.$num,$fabric->fabric_content,['id'=>'fabric_content'.$num,'class'=>'form-control','placeholder'=>'Fabric Content']) }}

                                                                        @if($errors->has('fabric_content'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fabric_content'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fabric_description'.$num) ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::text('fabric_description'.$num,$fabric->fabric_description,['id'=>'fabric_description'.$num,'class'=>'form-control','placeholder'=>'Description']) }}
                                                                        @if($errors->has('fabric_description'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fabric_description'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fabric_id'.$num) ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::select('fabric_id'.$num,$repository->fabrics(),$fabric->fabric_id,['id'=>'fabric_id'.$num,'class'=>'form-control select2','placeholder'=>'Select Fabric']) }}
                                                                        @if($errors->has('fabric_id'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fabric_id'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td>
                            <div class="form-group {{ $errors->has('fab_orginal_qty'.$num) ? 'has-error' : '' }}">
                                                                        <!-- {{--{{ Form::label('','Unit : ') }}--}} -->
<input type="text" name="fab_orginal_qty{{$num}}" value="{{$cost_breakdown->estimate_qty}}" id="fab_orginal_qty{{$num}}" class="form-control" placeholder="Original Qty" >
                                                                        @if($errors->has('fab_orginal_qty'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fab_orginal_qty'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                               <div class="form-group {{ $errors->has('fab_booking'.$num) ? 'has-error' : '' }}">
                                                                        <input type="text" name="fab_booking{{ $num }}" id="fab_booking{{ $num }}" placeholder="Booking%" class="form-control" value="">
                                                                        @if($errors->has('fab_booking'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fab_booking'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fab_order_qty'.$num) ? 'has-error' : '' }}">
   <input type="text" class="form-control fab_order_qty" name="fab_order_qty{{$num}}" id="fab_order_qty{{$num}}" placeholder="Order qty">

                                                                        @if($errors->has('fab_order_qty'.$num))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('fab_order_qty'.$num) }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fab_price'.$num) ? 'has-error' : '' }}">
                                                                        <input type="text" name="fab_price{{ $num }}" id="fab_price{{ $num }}" placeholder="Price" class="form-control" value="">

                                                                        @if($errors->has('fab_price'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fab_price'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('fab_total_price'.$num) ? 'has-error' : '' }}">
                                                                        <input type="text" name="fab_total_price{{ $num }}" id="fab_total_price{{ $num }}" placeholder="total price" class="form-control" value="">
                                                                        @if($errors->has('fab_total_price'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('fab_total_price'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('supplier_id'.$num) ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::select('supplier_id'.$num,$repository->suppliers(),$fabric->supplier_id,['id'=>'supplier_id'.$num,'class'=>'form-control select2','placeholder'=>'Select Supplier']) }}
                                                                        @if($errors->has('supplier_id'.$num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('supplier_id'.$num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td><div class="btn-group" role="group" aria-label="Basic example"> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }}
                                                                    {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }}</div> </td>
                                                            </tr>
                                                        @php ++$num; @endphp
                                                    @endforeach
                                                @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="7"></th>
                                                        {{--<th id="gross_fabric_cost">{{$gross_fabric_cost}}</th>--}}
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>


                                    </div>
                                    </fieldset>
                                    <fieldset style="border: 1px groove #663399 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                        <legend style="width:inherit;padding:0 10px;border-bottom:none;">Trims Information</legend>
                                    <div class="row">
                                        <div class="col-lg-12 card">
                                            {{--START BY AHMED --}}
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                   
                                                    <th width="13%">Trims Items</th>
                                                    <th>REF</th>
                                                    <th>Color</th>
                                                    <th>Description</th>
                                                    <th>Orginal Qty<br>
                                                        
                                                    </th>
                                                    <!-- <th>Total Req.QTY<br>
                                                        (TTR=A*{{$cost_breakdown->estimate_qty}})
                                                    </th> -->
                                                    <th>Booking%</th>
                                                    <th>Order Qty(Dz/Yds/KGS/GRS/GG)</th>
                                                    <th>Price</th>
                                                    <th>Total Price</th>
                                                    <th>Supplier</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="door1">
                                                {{--start 1 row --}}
                                                {{--@if($cost_breakdown_trim->count() >1)--}}
                                                    @php
                                                        $gross_trim_cost=0;
                                                    @endphp
                                                    @foreach($cost_breakdown_trim as $trim)
                                                          <tr id="row{{$trim_num}}">
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trim_id'.$trim_num) ? 'has-error' : '' }}">
                                                                        <!-- {{--{{ Form::label('','Unit : ') }}--}} -->
                                  {{ Form::select('trim_id'.$trim_num,$repository->trims(),$trim->trim_id,['id'=>'trim_id'.$trim_num,'class'=>'form-control','placeholder'=>'Select Trims']) }}
                                    
                                                                        @if($errors->has('trim_id'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trim_id'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('reference'.$trim_num) ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::text('reference'.$trim_num,$trim->reference,['id'=>'reference'.$trim_num,'class'=>'form-control address','placeholder'=>'Reference']) }}
                                                                        @if($errors->has('reference'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('reference'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                    
                                                              <td>
                                                                  <div class="form-group {{ $errors->has('color'.$trim_num) ? 'has-error' : '' }}">
                                                                      {{--{{ Form::label('','Unit : ') }}--}}
                                                                      {{ Form::text('color'.$trim_num,$trim->color,['id'=>'color'.$trim_num,'class'=>'form-control telNo','placeholder'=>'Color']) }}
                                                                      @if($errors->has('color'.$trim_num))
                                                                          <span class="help-block">
                                                                            <strong>{{ $errors->first('color'.$trim_num) }}</strong>
                                                                        </span>
                                                                      @endif
                                                                  </div>
                                                              </td>
                                    
                                    
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trims_description'.$trim_num) ? 'has-error' : '' }}">
                                                                        {{--{{ Form::label('','Unit : ') }}--}}
                                                                        {{ Form::text('trims_description'.$trim_num,$trim->trims_description,['id'=>'trims_description'.$trim_num,'class'=>'form-control telNo','placeholder'=>'Ex. 52895']) }}
                                                                        @if($errors->has('trims_description'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trims_description'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                    
                                    
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trim_original_qty'.$trim_num) ? 'has-error' : '' }}">
                                                                  
                                                                        @php

                                                                            $t_consumption=floatval($trim->required_qty);
                                                                        @endphp
  <input type="text" name="trim_original_qty{{ $trim_num }}" id="trim_original_qty{{ $trim_num }}" placeholder="Original. Qty" class="form-control" value="{{ $t_consumption }}">

                                                                        @if($errors->has('trim_original_qty'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trim_original_qty'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trims_booking'.$trim_num) ? 'has-error' : '' }}">
                                                                        <input type="text" name="trims_booking{{ $trim_num }}" id="trims_booking{{ $trim_num }}"  placeholder="Booking %" class="form-control" value="">
                                                                        @if($errors->has('trims_booking'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trims_booking'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                    
                                                                <td>
                              <div class="form-group {{ $errors->has('trim_order_qty'.$trim_num) ? 'has-error' : '' }}">
                                  <input type="text" name="trim_order_qty{{ $trim_num }}" id="trim_order_qty{{ $trim_num }}"  placeholder="Order qty %" class="form-control" value="">

                                                                        @if($errors->has('trim_order_qty'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trim_order_qty'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trims_price'.$trim_num) ? 'has-error' : '' }}">

                  <input type="text" name="trims_price{{ $trim_num }}" id="trims_price{{ $trim_num }}"  placeholder="Price" class="form-control" value="">
                                                                        @if($errors->has('trims_price'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trims_price'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group {{ $errors->has('trims_total_price'.$trim_num) ? 'has-error' : '' }}">
                                  <input type="text" name="trims_total_price{{ $trim_num }}" id="trims_total_price{{ $trim_num }}"  placeholder="Total Price" class="form-control" value="">
                                                                        @if($errors->has('trims_total_price'.$trim_num))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('trims_total_price'.$trim_num) }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  <div class="form-group {{ $errors->has('distributor'.$trim_num) ? 'has-error' : '' }}">
                                                                      {{--{{ Form::label('','Unit : ') }}--}}
                                                                      {{ Form::select('distributor'.$trim_num,$repository->suppliers(),$trim->distributor,['id'=>'distributor'.$trim_num,'class'=>'form-control','placeholder'=>'Select Supplier']) }}
                                                                      @if($errors->has('distributor'.$trim_num))
                                                                          <span class="help-block">
                                                                            <strong>{{ $errors->first('distributor'.$trim_num) }}</strong>
                                                                        </span>
                                                                      @endif
                                                                  </div>
                                                              </td>
                                                                <td> <div class="btn-group" role="group" aria-label="Basic example">{{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }}
                                                                    {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','onclick'=>'addRow1()']) }}</div> </td>
                                                            </tr>
                                                          @php ++$trim_num; @endphp
                                                    @endforeach
                                                {{--@endif--}}
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="8"></th>
                                                        {{--<th id="gross_trim_cost">{{$gross_trim_cost}}</th>--}}
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    </fieldset>
                                    <fieldset style="border: 1px groove #663399 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                        <legend style="width:inherit;padding:0 10px;border-bottom:none;">Others Trims Information</legend>
                                        <div class="row">
                                            <div class="col-lg-12 card">
                                                {{--START BY AHMED --}}
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="13%">Other Trims Name</th>
                                                            <th>Description</th>
                                                            <th>Orginal Qty</th>
                                                            <th>Booking%</th>
                                                            <th>Order Qty(Dz/Yds/KGS/GRS/GG)</th>
                                                            <th>Price</th>
                                                            <th>Total Price</th>
                                                            <th>Supplier</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="door2">
                                                        @foreach($cost_breakdown_other_trim as $pack)

                                                              <tr id="col{{$other_num}}">
                                                                  <td>
                                                                      <div class="form-group {{ $errors->has('other_trim_id'.$other_num) ? 'has-error' : '' }}">
                                                                          {{--{{ Form::label('','Unit : ') }}--}}
                                                                          {{ Form::select('other_trim_id'.$other_num,$repository->otherTrims(),$pack->other_trim_id,['id'=>'other_trim_id'.$other_num,'class'=>'form-control','placeholder'=>'Select Fabric']) }}
                                                                          @if($errors->has('other_trim_id'.$other_num))
                                                                              <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trim_id'.$other_num) }}</strong>
                                                                            </span>
                                                                          @endif
                                                                      </div>
                                                                  </td>
                                        
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trim_description'.$other_num) ? 'has-error' : '' }}">

                                                                            {{ Form::text('other_trim_description'.$other_num,$pack->other_trim_description,['id'=>'other_trim_description'.$other_num,'class'=>'form-control','placeholder'=>'Description']) }}
                                                                            @if($errors->has('other_trim_description'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trim_description'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                        
                                        
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trims_qty'.$other_num) ? 'has-error' : '' }}">
             																<input type="text" name="other_trims_qty{{ $other_num }}" id="other_trims_qty{{ $other_num }}"  placeholder="Req. Qty" value="{{ $pack->qty }}" class="form-control">

                                                                            @if($errors->has('other_trims_qty'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trims_qty'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                        
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trims_booking'.$other_num) ? 'has-error' : '' }}">
                                                                            <input type="text" name="other_trims_booking{{ $other_num }}" id="other_trims_booking{{ $other_num }}"  placeholder="Booking%" value="" class="form-control">

                                                                            @if($errors->has('other_trims_booking'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trims_booking'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                        
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trim_order_qty'.$other_num) ? 'has-error' : '' }}">

                                                                            {{ Form::text('other_trim_order_qty'.$other_num,'',['id'=>'other_trim_order_qty'.$other_num,'class'=>'form-control last_salary other_cost','placeholder'=>'Order Qty']) }}
                                                                            @if($errors->has('other_trim_order_qty'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trim_order_qty'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trims_price'.$other_num) ? 'has-error' : '' }}">
                                                                            {{ Form::text('other_trims_price'.$other_num,'',['id'=>'other_trims_price'.$other_num,'class'=>'form-control last_salary other_cost','placeholder'=>'Price']) }}
                                                                            @if($errors->has('other_trims_price'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trims_price'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group {{ $errors->has('other_trims_total_price'.$other_num) ? 'has-error' : '' }}">
                                                                            {{ Form::text('other_trims_total_price'.$other_num,'',['id'=>'other_trims_total_price'.$other_num,'class'=>'form-control last_salary other_cost','placeholder'=>'Total Price']) }}
                                                                            @if($errors->has('other_trims_total_price'.$other_num))
                                                                                <span class="help-block">
                                                                                <strong>{{ $errors->first('other_trims_total_price'.$other_num) }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                      <div class="form-group {{ $errors->has('provider'.$other_num) ? 'has-error' : '' }}">

                                                                          {{ Form::select('provider'.$other_num,$repository->suppliers(),$pack->provider,['id'=>'provider'.$other_num,'class'=>'form-control','placeholder'=>'Select Supplier']) }}
                                                                          @if($errors->has('provider'.$other_num))
                                                                              <span class="help-block">
                                                                                <strong>{{ $errors->first('provider'.$other_num) }}</strong>
                                                                            </span>
                                                                          @endif
                                                                      </div>
                                                                  </td>
                                                                    <td><div class="btn-group" role="group" aria-label="Basic example"> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }}
                                                                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow2()']) }} </div></td>
                                                                </tr>
                                                              @php ++$other_num; @endphp
                                                            @endforeach

                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="5"></th>
{{--                                                            <th id="gross_other_cost">{{$gross_other_cost}}</th>--}}
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        
                                        
                                        </div>
                                    </fieldset>
                                    <fieldset style="border: 1px groove #663399 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                        <legend style="width:inherit;padding:0 10px;border-bottom:none;">Other Cost Information</legend>
                                        {{-- <div class="row"> --}}
                                        
                                        <div class="heading">
                                            <h1 style="background-color: #0c5460;text-align: center;color: white">Embroidery</h1>
                                        </div>
                                        <div class="row">
                                            @for($i = 1; $i <= 3; $i++)
                                                @php
                                                    $embroidery = null;
                                                    if($i == 1){
                                                        $embroidery = $cost_breakdown ? $cost_breakdown->embroidery : null;
                                                    }
                                                @endphp
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                    <br>
                                                    <div class="from-group">
                                                        {{ Form::label('','Embroidery '.$i.': ') }}
                                                        {{ Form::text('embroidery_'.$i,$embroidery,['class'=>'form-control total_costing','placeholder'=>'Embroidery','onkeyup'=>'totalCMCosting()']) }}
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                        <br>
                                        <div class="heading">
                                            <h1 style="background-color: #0c5460;text-align: center;color: white">Printing</h1>
                                        </div>
                                        <div class="row">
                                            @for($i = 1; $i <= 3; $i++)
                                                @php
                                                    $printing = null;
                                                    if($i == 1){
                                                        $printing = $cost_breakdown ? $cost_breakdown->printing : null;
                                                    }
                                                @endphp
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                    <br>
                                                    <div class="from-group">
                                                        {{ Form::label('','Printing '.$i.': ') }}
                                                        {{ Form::text('printing_'.$i,$printing,['class'=>'form-control total_costing','placeholder'=>'Printing','onkeyup'=>'totalCMCosting()']) }}
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                        
                                        <br>
                                        <div class="heading">
                                            <h1 style="background-color: #0c5460;text-align: center;color: white">Washing</h1>
                                        </div>
                                        <div class="row">
                                            @for($i = 1; $i <= 5; $i++)
                                                @php
                                                    $washing = null;
                                                    if($i == 1){
                                                        $washing = $cost_breakdown ? $cost_breakdown->washing : null;
                                                    }
                                                @endphp
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                    <br>
                                                    <div class="from-group">
                                                        {{ Form::label('',' Washing '.$i.': ') }}
                                                        {{ Form::text('washing_'.$i,$washing,['class'=>'form-control total_costing','placeholder'=>'Washing','onkeyup'=>'totalCMCosting()']) }}
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                        <br>
                                        <div class="heading">
                                            <h1 style="background-color: #0c5460;text-align: center;color: white">Others</h1>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <br>
                                                <div class="from-group">
                                                    {{ Form::label('','Testing Charge : ') }}
                                                    {{ Form::text('testing_charge',$cost_breakdown ? $cost_breakdown->testing_charge : null,['class'=>'form-control total_costing','placeholder'=>'Testing Charge','onkeyup'=>'totalCMCosting()']) }}
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <br>
                                                <div class="from-group">
                                                    {{ Form::label('','Other Charge : ') }}
                                                    {{ Form::text('other_charge',$cost_breakdown ? $cost_breakdown->other_charge : null,['class'=>'form-control total_costing','placeholder'=>'Other Charge','onkeyup'=>'totalCMCosting()']) }}
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <br>
                                                <div class="from-group">
                                                    {{ Form::label('','Financial/Commercial charge/Bank (Consider in %): ') }}
                                                    {{ Form::text('consider',$cost_breakdown ? $cost_breakdown->consider : null,['id'=>'cost_breakdown_consider','class'=>'form-control','placeholder'=>'Example : 6','onkeyup'=>'totalCMCosting()']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <br>
                                                <div class="from-group">
                                                    @php
                                                        $total_costing=0;
                                                        
                                                        $total_costing+= $cost_breakdown->embroidery+$cost_breakdown->embroidery_2+$cost_breakdown->embroidery_3;
                                                        $total_costing+= $cost_breakdown->printing+$cost_breakdown->printing_2+$cost_breakdown->printing_3;
                                                        $total_costing+= $cost_breakdown->washing+$cost_breakdown->washing_2+$cost_breakdown->washing_3+$cost_breakdown->washing_4+$cost_breakdown->washing_5;
                                                        $total_costing += $cost_breakdown->testing_charge+$cost_breakdown->other_charge;

                                                        $other_total_costings = $cost_breakdown_fabric->sum('fabric_cost')+$cost_breakdown_trim->sum('trim_costs')+$cost_breakdown_other_trim->sum('cost') + $cost_breakdown->cutting_marking;

                                                        $total_costing += $other_total_costings;
                                                        $total_costing -= ($total_costing*$cost_breakdown->consider)/100;
                                                    @endphp
                                                    {{ Form::label('','Cutting & Making: ') }}
                                                    {{ Form::text('cutting_marking',$total_costing,['id'=>'cutting_marking','class'=>'form-control ','placeholder'=>'Cutting & Marking']) }}
                                                </div>
                                                <input type="hidden" id="other_total_costings" value="{{ $other_total_costings }}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                            <div class="form-group">
                                                {{ Form::button('SAVE ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12"></div>
                                        {{-- </div> --}}
                                    </fieldset>
                                </div>

                                {{--//Start short-course-information added by Ahmed--}}
                                {{-- <div class="tab-pane" id="other_trims">
                                    @include('merchandising.budget_sheet.other-trims')
                                </div> --}}
                                <!-- /.end short-course-information  -->

                                {{--//Start short-course-information added by Ahmed--}}
                                {{-- <div class="tab-pane" id="other_cost">
                                    @include('merchandising.budget_sheet.other-cost')
                                </div> --}}
                                <!-- /.end short-course-information  -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</section>&nbsp;
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@stop

    @section('css')
        <style>
            .loader {
                position: absolute;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>

    @endsection

@section('script')
    <!-- page script -->
    <script type="text/javascript">

        function totalCMCosting(){
            var cm_costings = document.getElementsByClassName("total_costing");
            var cm_costing = 0;
            for(var i = 0; i < cm_costings.length; i++){
                if(cm_costings[i].value > 0){
                    cm_costing += parseFloat(cm_costings[i].value);
                }
            }

            //other_total_costings = cost_breakdown_fabric_cost + cost_breakdown_trim_cost + cost_breakdown_other_cost + cost_breakdown_cutting_making
            var other_total_costings = document.getElementById("other_total_costings").value;
            var cost_breakdown_consider = document.getElementById("cost_breakdown_consider").value;
            if(cost_breakdown_consider > 0){
                cost_breakdown_consider = cost_breakdown_consider;
            }else{
                cost_breakdown_consider = 0;
            }
            var total_costing = parseFloat(other_total_costings) + parseFloat(cm_costing);
            total_costing -= (total_costing * parseFloat(cost_breakdown_consider))/100;
            document.getElementById("cutting_marking").value = total_costing;
        }

        //Fabric Portion
        function totalFabricCost(num){
            var fabric_consumption = document.getElementById("fabric_consumption"+num).value;
            var fabric_tcon = document.getElementById("fabric_tcon").value * fabric_consumption;
            var fabric_unit_price = document.getElementById("unit_price"+num).value;

            document.getElementById("total_fabric_consumption"+num).value = fabric_tcon;
            document.getElementById("fabric_cost"+num).value = fabric_tcon * fabric_unit_price;

            //Set the gross fabric cost
            grossFabricCost();
        }

        function grossFabricCost(){
            var fabric_costs = document.getElementsByClassName("fabric_cost");
            var gross_fabric_cost = 0;
            for(var i = 0; i < fabric_costs.length; i++){
                gross_fabric_cost += parseFloat(fabric_costs[i].value);
            }
            document.getElementById("gross_fabric_cost").innerHTML = gross_fabric_cost;
        }

        //Trim Portion
        function totalTrimCost(num){
            var required_qty = document.getElementById("required_qty"+num).value;
            var trim_consumption = document.getElementById("fabric_tcon").value * required_qty;
            var trim_unit_price = document.getElementById("trims_price"+num).value;

            document.getElementById("trim_consumption"+num).value = trim_consumption;
            document.getElementById("trims_cost"+num).value = trim_consumption * trim_unit_price;

            //Set the gross trim cost
            grossTrimCost();
        }

        function grossTrimCost(){
            var trim_costs = document.getElementsByClassName("trims_cost");
            var gross_trim_cost = 0;
            for(var i = 0; i < trim_costs.length; i++){
                gross_trim_cost += parseFloat(trim_costs[i].value);
            }
            document.getElementById("gross_trim_cost").innerHTML = gross_trim_cost;
        }


        //Other Cost Portion
        function totalOtherCost(num){
            var qty = document.getElementById("qty"+num).value;
            var price = document.getElementById("price"+num).value;

            document.getElementById("cost"+num).value = qty * price;

            //Set gross other cost
            grossOtherCost();
        }

        function grossOtherCost(){
            var other_costs = document.getElementsByClassName("other_cost");
            var gross_other_cost = 0;
            for(var i = 0; i < other_costs.length; i++){
                gross_other_cost += parseFloat(other_costs[i].value);
            }
            document.getElementById("gross_other_cost").innerHTML = gross_other_cost;
        }

        
        $('body').on('keydown', 'input, select, textarea', function(e) {
            var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
            ;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });

//        $(document).on("click","#add_more",function () {
////            $("select").select2();
//            var clone = $(this).closest('tr').clone(true).insertAfter( $(this).closest('tr'));
//
//        });

        $(document).on("click","#remove",function () {
            $(this).parent().parent().parent().remove();
            grossFabricCost();
            grossTrimCost();+
            grossOtherCost();
        });
    </script>

    <script>
        // Add new row for fabric
        function addRow(){
            // get the last DIV which ID starts with ^= "product"
            var $div = $('tr[id^="product"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'product'+num);

            $('input[id^="fabric_content"]:last').prop('id','fabric_content'+num).prop('name','fabric_content'+num);

            $('input[id^="fabric_description"]:last').prop('id','fabric_description'+num).prop('name','fabric_description'+num);

            $('select[id^="fabric_id"]:last').prop('id','fabric_id'+num).prop('name','fabric_id'+num);

            $('input[id^="fab_orginal_qty"]:last').prop('id','fab_orginal_qty'+num).prop('name','fab_orginal_qty'+num);

            $('input[id^="fab_booking"]:last').prop('id','fab_booking'+num).prop('name','fab_booking'+num);

            $('input[id^="fab_order_qty"]:last').prop('id','fab_order_qty'+num).prop('name','fab_order_qty'+num);

            // $('select[id^="unit_id"]:last').prop('id','unit_id'+num).prop('name','unit_id'+num);
            $('input[id^="fab_price"]:last').prop('id','fab_price'+num).prop('name','fab_price'+num);

            $('input[id^="fab_total_price"]:last').prop('id','fab_total_price'+num).prop('name','fab_total_price'+num);

            $('select[id^="supplier_id"]:last').prop('id','supplier_id'+num).prop('name','supplier_id'+num);
            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
            $('#supplier_id'+num).last().next().next().remove();
            $('#fabric_id'+num).last().next().next().remove();
            // $('#unit_id'+num).last().next().next().remove();

            $klon.appendTo($("#door"));
            grossFabricCost();

        }


        // Add new row for trim portion
        function addRow1(){
            // get the last DIV which ID starts with ^= "row"
            var $div = $('tr[id^="row"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'row'+num);
            $('select[id^="trim_id"]:last').prop('id','trim_id'+num).prop('name','trim_id'+num);
            $('input[id^="reference"]:last').prop('id','reference'+num).prop('name','reference'+num);
            $('input[id^="color"]:last').prop('id','color'+num).prop('name','color'+num);
            $('input[id^="trims_description"]:last').prop('id','trims_description'+num).prop('name','trims_description'+num);

            $('input[id^="trim_original_qty"]:last').prop('id','trim_original_qty'+num).prop('name','trim_original_qty'+num);
            $('input[id^="trims_booking"]:last').prop('id','trims_booking'+num).prop('name','trims_booking'+num);

            $('input[id^="trim_order_qty"]:last').prop('id','trim_order_qty'+num).prop('name','trim_order_qty'+num);

            $('input[id^="trims_price"]:last').prop('id','trims_price'+num).prop('name','trims_price'+num);

//            $('input[id^="trims_price"]:last').prop('id','trims_price'+num).prop('name','trims_price'+num);

            $('input[id^="trims_total_price"]:last').prop('id','trims_total_price'+num).prop('name','trims_total_price'+num);
            $('select[id^="distributor"]:last').prop('id','distributor'+num).prop('name','distributor'+num);

            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
            $('#distributor'+num).last().next().next().remove();
            $('#trim_id'+num).last().next().next().remove();

            $klon.appendTo($("#door1"));
            grossTrimCost();

        }

        // Add new row for other cost
        function addRow2(){
            // get the last DIV which ID starts with ^= "row"
            var $div = $('tr[id^="col"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'col'+num);
            $('select[id^="provider"]:last').prop('id','provider'+num).prop('name','provider'+num);

            $('select[id^="other_trim_id"]:last').prop('id','other_trim_id'+num).prop('name','other_trim_id'+num);
            $('input[id^="other_trim_description"]:last').prop('id','other_trim_description'+num).prop('name','other_trim_description'+num);

      		$('input[id^="other_trims_qty"]:last').prop('id','other_trims_qty'+num).prop('name','other_trims_qty'+num);
      		$('input[id^="other_trims_booking"]:last').prop('id','other_trims_booking'+num).prop('name','other_trims_booking'+num);


            // $('input[id^="other_trims_booking"]:last').prop('id','other_trims_booking'+num).prop('name','other_trims_booking'+num);

            $('input[id^="other_trim_order_qty"]:last').prop('id','other_trim_order_qty'+num).prop('name','other_trim_order_qty'+num);

            $('input[id^="other_trims_price"]:last').prop('id','other_trims_price'+num).prop('name','other_trims_price'+num);

            $('input[id^="other_trims_total_price"]:last').prop('id','other_trims_total_price'+num).prop('name','other_trims_total_price'+num);
            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
             $('#provider'+num).last().next().next().remove();
             $('#other_trim_id'+num).last().next().next().remove();

            $klon.appendTo($("#door2"));
            grossOtherCost();

        }



    </script>

    <script>
       /* $('#door').keyup(function () {
            var $div = $('tr[id^="product"]:last');
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            for(var i=1;i<num;i++){
                var a = $("#product"+i+" input[id^='fabric_consumption']").val();
                var b = $("#product"+i+" input[id^='unit_price']").val();
                var c =$("#product"+i+" input[id^='fabric_cost']").val(parseInt(a)*parseInt(b));
            }
        })*/
    </script>

    {{-- <script>
        var global1=global2=global3=global4=global5=global6=0;
        var data = '';
            $(document).on("keyup","input",function () {
                var id;
                data = $(this).attr("id");
                id = data.slice(-1);
                global1 = $("#fabric_consumption"+id).val();
                global2 = $("#unit_price"+id).val();
                global3 = $("#required_qty"+id).val();
                global4 = $("#trims_price"+id).val();
                global5 = $("#qty"+id).val();
                global6 = $("#price"+id).val();
                $('#fabric_cost'+id).val(global1*global2);
                $('#trims_cost'+id).val(global3*global4);
                $('#cost'+id).val(global5*global6);
            });
    </script> --}}



@stop

