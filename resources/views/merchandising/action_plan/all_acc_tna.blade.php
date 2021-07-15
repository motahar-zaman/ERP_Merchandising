@extends('layouts.fixed')

@section('title','WELL-GROUP | ALL ACC T&A')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>All Acc T&A</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>ALL ACC T&A</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Merchandise\ActionPlanController@all_acc_tna_store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('order_style','Select Order Summary Style : ') }}
                                        <select required class="form-control" name="order_style" id="order_style">
                                            <option value="">Select Order Summary</option>
                                            @if(isset($order_summary_nos[0]->id))
                                            @foreach($order_summary_nos as $order_summary)
                                                <option value="{{ $order_summary->id }}" @if($order_summary_no = $order_summary->id) selected @endif>{{ $order_summary->id }} - {{ optional($order_summary->style)->style }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">ALL ACC T&A</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
                                                {{ Form::label('','Item Name : ') }}
                                                <select class="form-control" name="item_name" id="item_name">
                                                    <option value="Select Item">Select Item</option>
                                                    @php
                                                        $items = itemNames();    
                                                    @endphp
                                                    @foreach($items as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- {{ Form::text('item_name',null,['class'=>'form-control','placeholder'=>'Enter Item Name:']) }} --}}
                                                @if($errors->has('item_name'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('item_name') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('booking_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Booking Date : ') }}
                                                {{ Form::date('booking_date',null,['class'=>'form-control','placeholder'=>'Enter Booking Date:']) }}
                                                @if($errors->has('booking_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('booking_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('inhouse_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Plan Inhouse Date : ') }}
                                                {{ Form::date('inhouse_date',null,['class'=>'form-control']) }}
                                                @if($errors->has('inhouse_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('inhouse_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('actual_inhouse_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Actual Inhouse Date : ') }}
                                                {{ Form::date('actual_inhouse_date',null,['class'=>'form-control']) }}
                                                @if($errors->has('actual_inhouse_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('actual_inhouse_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('org_country') ? 'has-error' : '' }}">
                                                {{ Form::label('','Origin Country : ') }}
                                                <select class="form-control" id="org_country" name="org_country">
                                                   <option value="No Country">Select Country</option>
                                                   @if(isset($countries[0]->id))
                                                   @foreach($countries as $country)
                                                   <option value="{{ $country->name }}">{{  $country->name }}</option>
                                                   @endforeach
                                                   @endif
                                               </select>
                                                @if($errors->has('org_country'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('org_country') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group {{ $errors->has('supplier_name') ? 'has-error' : '' }}">
                                                {{ Form::label('','Approved Supplier Name : ') }}
                                                {{ Form::text('supplier_name',null,['class'=>'form-control','placeholder'=>'Approved Supplier Name:']) }}
                                                @if($errors->has('supplier_name'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('supplier_name') }}</strong>
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



                            </div>
                            <div class="col-lg-12">
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th>Action</th>
                                        <th>Item Name</th>
                                        <th>Booking Date</th>
                                        <th>Plan Inhouse Date</th>
                                        <th>Actual Plan Inhouse Date</th>
                                        <th>Origin Country</th>
                                        <th>Approved Supplier Name</th>
                                    </tr>
                                </table>
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
            var row = '<tr id="all_acc_tna_'+(key+1)+'">' +

                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>' +

                '<td><span id="item_name_row_'+(key+1)+'">'+$('#item_name').val()+'</span><input type="hidden" name="item_name[]"  id="item_name_'+(key+1)+'" value="'+$('#item_name').val()+'"></td>' +

                '<td><span id="booking_date_row_'+(key+1)+'">'+$('input[name=booking_date]').val()+'</span><input type="hidden" name="booking_date[]" id="booking_date_'+(key+1)+'" value="'+$('input[name=booking_date]').val()+'"></td>' +

                '<td><span id="inhouse_date_row_'+(key+1)+'">'+$('input[name=inhouse_date]').val()+'</span><input type="hidden" name="inhouse_date[]" id="inhouse_date_'+(key+1)+'" value="'+$('input[name=inhouse_date]').val()+'"></td>' +

                '<td><span id="actual_inhouse_date_row_'+(key+1)+'">'+$('input[name=actual_inhouse_date]').val()+'</span><input type="hidden" name="actual_inhouse_date[]" id="actual_inhouse_date_'+(key+1)+'" value="'+$('input[name=actual_inhouse_date]').val()+'"></td>' +

                '<td><span id="org_country_row_'+(key+1)+'">'+$('#org_country').val()+'</span><input type="hidden" name="org_country[]" id="org_country_'+(key+1)+'" value="'+$('#org_country').val()+'"></td>' +

                '<td><span id="supplier_name_row_'+(key+1)+'">'+$('input[name=supplier_name]').val()+'</span><input type="hidden" name="supplier_name[]" id="supplier_name_'+(key+1)+'" value="'+$('input[name=supplier_name]').val()+'"></td>' +
                '</tr>';
            $("#table").append(row);
            $('#form').trigger("reset");
        }

         function removeRow(key){
            $('#all_acc_tna_'+key).remove();
        }
        function editRow(key){
            var item_name = $('#item_name_'+key).val();
            var booking_date = $('#booking_date_'+key).val();
            var inhouse_date = $('#inhouse_date_'+key).val();
            var actual_inhouse_date = $('#actual_inhouse_date_'+key).val();
            var org_country = $('#org_country_'+key).val();
            var supplier_name = $('#supplier_name_'+key).val();
            
            $.alert({
                 title: 'Edit ACC T&A',
                 content: "url:{{url('actionPlan/all_acc_tna/edit/')}}/"+item_name +'&'+booking_date +'&'+inhouse_date +'&'+actual_inhouse_date +'&'+org_country +'&'+supplier_name +'&',
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   close: {
                     text: 'Save',
                     btnClass: 'btn-default',
                     action: function(){

                         $('#item_name_row_'+key).html($('#item_name_edit').val());
                         $('#booking_date_row_'+key).html($('#booking_date_edit').val());
                         $('#inhouse_date_row_'+key).html($('#inhouse_date_edit').val());
                         $('#actual_inhouse_date_row_'+key).html($('#actual_inhouse_date_edit').val());
                         $('#org_country_row_'+key).html($('#org_country_edit').val());
                         $('#supplier_name_row_'+key).html($('#supplier_name_edit').val());

                         
                         $('#item_name_'+key).val($('#item_name_edit').val());
                         $('#booking_date_'+key).val($('#booking_date_edit').val());
                         $('#inhouse_date_'+key).val($('#inhouse_date_edit').val());
                         $('#actual_inhouse_date_'+key).val($('#actual_inhouse_date_edit').val());
                         $('#org_country_'+key).val($('#org_country_edit').val());
                         $('#supplier_name_'+key).val($('#supplier_name_edit').val());

                        //return false;

                     }
                   }
                }
           });
        }

    </script>
@endsection