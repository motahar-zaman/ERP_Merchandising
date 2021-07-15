@extends('layouts.fixed')

@section('title','WELL-GROUP | FABRICS T&A')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Fabrics T&A</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Fabrics T&A</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Merchandise\ActionPlanController@fabrics_tna_store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                               {{--  <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('booking_date','Booking Date : ') }}
                                        {{ Form::date('booking_date',null, ['class'=>'form-control ','placeholder'=>'Date:']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('plan_inhouse_date','Plan Inhouse Date : ') }}
                                        {{ Form::date('plan_inhouse_date',null, ['class'=>'form-control ','placeholder'=>'Select Style:']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('actual_inhouse_date','Actual Inhouse Date : ') }}
                                        {{ Form::date('actual_inhouse_date',null, ['class'=>'form-control ','placeholder'=>'Select Style:']) }}
                                    </div>
                                </div> --}}
                            </div>
                            <br>
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Shell Fabric</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('color_name') ? 'has-error' : '' }}">
                                                {{ Form::label('','Garments Color Name : ') }}
                                                {{ Form::text('color_name',null,['class'=>'form-control','placeholder'=>'Enter Color Name:']) }}
                                                @if($errors->has('color_name'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('color_name') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('shell_booking_date') ? 'has-error' : '' }}">
                                                {{ Form::label('shell_booking_date','Booking Date : ') }}
                                                {{ Form::date('shell_booking_date',null,['class'=>'form-control','placeholder'=>'Date:']) }}
                                                @if($errors->has('shell_booking_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('shell_booking_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('shell_plan_inhouse_date') ? 'has-error' : '' }}">
                                                {{ Form::label('shell_plan_inhouse_date','Plan Inhouse Date : ') }}
                                                {{ Form::date('shell_plan_inhouse_date',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
                                                @if($errors->has('shell_plan_inhouse_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('shell_plan_inhouse_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('shell_actual_inhouse_date') ? 'has-error' : '' }}">
                                                {{ Form::label('shell_actual_inhouse_date','Actual Inhouse Date : ') }}
                                                {{ Form::date('shell_actual_inhouse_date',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
                                                @if($errors->has('shell_actual_inhouse_date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('shell_actual_inhouse_date') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('shell_origin_country') ? 'has-error' : '' }}">
                                                {{ Form::label('shell_origin_country','Origin Country : ') }}
                                                 <select class="form-control" id="shell_origin_country" name="shell_origin_country">
                                                   <option value="No Country">Select Country</option>
                                                   @if(isset($countries[0]->id))
                                                   @foreach($countries as $country)
                                                   <option value="{{ $country->name }}">{{  $country->name }}</option>
                                                   @endforeach
                                                   @endif
                                               </select>
                                                @if($errors->has('shell_origin_country'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('shell_origin_country') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('shell_app_supplier_name') ? 'has-error' : '' }}">
                                                {{ Form::label('shell_app_supplier_name','Approved Supplier Name  : ') }}
                                                {{ Form::text('shell_app_supplier_name',null,['class'=>'form-control','placeholder'=>'Enter Supplier Name:']) }}
                                                @if($errors->has('shell_app_supplier_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('shell_app_supplier_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Trims Fabric</h2>
                                        </div>
                                    <br>

                                    <div class="row" style="padding-bottom: 20px; ">
                                        <div class="col-lg-12 card" style="padding-top: 20px">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group {{ $errors->has('trims_booking_date') ? 'has-error' : '' }}">
                                                        {{ Form::label('trims_booking_date','Booking Date  : ') }}
                                                        {{ Form::date('trims_booking_date',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
                                                        @if($errors->has('trims_booking_date'))
                                                            <span class="help-block">
                                                        <strong>{{ $errors->first('trims_booking_date') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group {{ $errors->has('trims_plan_inhouse_date') ? 'has-error' : '' }}">
                                                        {{ Form::label('trims_plan_inhouse_date','Plan Inhouse Date  : ') }}
                                                        {{ Form::date('trims_plan_inhouse_date',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
                                                        @if($errors->has('trims_plan_inhouse_date'))
                                                            <span class="help-block">
                                                        <strong>{{ $errors->first('trims_plan_inhouse_date') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group {{ $errors->has('trims_actual_inhouse_date') ? 'has-error' : '' }}">
                                                        {{ Form::label('trims_actual_inhouse_date','Actual Inhouse Date  : ') }}
                                                        {{ Form::date('trims_actual_inhouse_date',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
                                                        @if($errors->has('trims_actual_inhouse_date'))
                                                            <span class="help-block">
                                                        <strong>{{ $errors->first('trims_actual_inhouse_date') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group {{ $errors->has('trims_origin_country') ? 'has-error' : '' }}">
                                                        {{ Form::label('trims_origin_country','Origin Country : ') }}
                                                       <select class="form-control" id="trims_origin_country" name="trims_origin_country">
                                                           <option value="No Country">Select Country</option>
                                                           @if(isset($countries[0]->id))
                                                           @foreach($countries as $country)
                                                           <option value="{{ $country->name }}">{{  $country->name }}</option>
                                                           @endforeach
                                                           @endif
                                                       </select>
                                                        @if($errors->has('trims_origin_country'))
                                                            <span class="help-block">
                                    <strong>{{ $errors->first('trims_origin_country') }}</strong>
                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group {{ $errors->has('trims_app_supplier_name') ? 'has-error' : '' }}">
                                                        {{ Form::label('trims_app_supplier_name','Approved Supplier Name  : ') }}
                                                        {{ Form::text('trims_app_supplier_name',null,['class'=>'form-control','placeholder'=>'Enter Supplier Name:']) }}
                                                        @if($errors->has('trims_app_supplier_name'))
                                                            <span class="help-block">
                                                        <strong>{{ $errors->first('trims_app_supplier_name') }}</strong>
                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
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
                            <div class="table-responsive p-0 col-lg-12">
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th>Action</th>
                                        <th>Color Name</th>
                                        <th>BOOKING DATE(Shell Fabric)</th>
                                        <th>PLAN INHOUSE DATE(Shell Fabric)</th>
                                        <th>ACTUAL INHOUSE DATE(Shell Fabric)</th>
                                        <th>ORIGIN COUNTRY(Shell Fabric)</th>
                                        <th>APPROVED SUPPLIER NAME(Shell Fabric)</th>
                                        <th>BOOKING DATE(Trims Fabric)</th>
                                        <th>PLAN INHOUSE DATE(Trims Fabric)</th>
                                        <th>ACTUAL INHOUSE DATE(Trims Fabric)</th>
                                        <th>ORIGIN COUNTRY(Trims Fabric)</th>
                                        <th>APPROVED SUPPLIER NAME(Trims Fabric) </th>
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
            //console.log(data);

            var key = parseInt($('#tna_value').val());

//            alert('add to list');
            var row = '<tr id="fabrics_tna_'+(key+1)+'">' +
                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>' +

                '<td><span id="color_name_row_'+(key+1)+'">'+$('input[name=color_name]').val()+'</span><input type="hidden" name="color_name[]" id="color_name_'+(key+1)+'" value="'+$('input[name=color_name]').val()+'"></td>' +

                '<td><span id="shell_booking_date_row_'+(key+1)+'">'+$('input[name=shell_booking_date]').val()+'</span><input type="hidden" name="shell_booking_date[]" id="shell_booking_date_'+(key+1)+'" value="'+$('input[name=shell_booking_date]').val()+'"></td>' +

                '<td><span id="shell_plan_inhouse_date_row_'+(key+1)+'">'+$('input[name=shell_plan_inhouse_date]').val()+'</span><input type="hidden" name="shell_plan_inhouse_date[]" id="shell_plan_inhouse_date_'+(key+1)+'" value="'+$('input[name=shell_plan_inhouse_date]').val()+'"></td>' +

                '<td><span id="shell_actual_inhouse_date_row_'+(key+1)+'">'+$('input[name=shell_actual_inhouse_date]').val()+'</span><input type="hidden" name="shell_actual_inhouse_date[]" id="shell_actual_inhouse_date_'+(key+1)+'" value="'+$('input[name=shell_actual_inhouse_date]').val()+'"></td>' +

                '<td><span id="shell_origin_country_row_'+(key+1)+'">'+$('#shell_origin_country').val()+'</span><input type="hidden" name="shell_origin_country[]" id="shell_origin_country_'+(key+1)+'" value="'+$('#shell_origin_country').val()+'"></td>' +

                '<td><span id="shell_app_supplier_name_row_'+(key+1)+'">'+$('input[name=shell_app_supplier_name]').val()+'</span><input type="hidden" name="shell_app_supplier_name[]" id="shell_app_supplier_name_'+(key+1)+'" value="'+$('input[name=shell_app_supplier_name]').val()+'"></td>' +

                '<td><span id="trims_booking_date_row_'+(key+1)+'">'+$('input[name=trims_booking_date]').val()+'</span><input type="hidden" name="trims_booking_date[]" id="trims_booking_date_'+(key+1)+'" value="'+$('input[name=trims_booking_date]').val()+'"></td>' +

                '<td><span id="trims_plan_inhouse_date_row_'+(key+1)+'">'+$('input[name=trims_plan_inhouse_date]').val()+'</span><input type="hidden" name="trims_plan_inhouse_date[]" id="trims_plan_inhouse_date_'+(key+1)+'" value="'+$('input[name=trims_plan_inhouse_date]').val()+'"></td>' +

                '<td><span id="trims_actual_inhouse_date_row_'+(key+1)+'">'+$('input[name=trims_actual_inhouse_date]').val()+'</span><input type="hidden" name="trims_actual_inhouse_date[]" id="trims_actual_inhouse_date_'+(key+1)+'" value="'+$('input[name=trims_actual_inhouse_date]').val()+'"></td>' +

                '<td><span id="trims_origin_country_row_'+(key+1)+'">'+$('#trims_origin_country').val()+'</span><input type="hidden" name="trims_origin_country[]" id="trims_origin_country_'+(key+1)+'" value="'+$('#trims_origin_country').val() +'"></td>' +

                '<td><span id="trims_app_supplier_name_row_'+(key+1)+'">'+$('input[name=trims_app_supplier_name]').val()+'</span><input type="hidden" name="trims_app_supplier_name[]" id="trims_app_supplier_name_'+(key+1)+'" value="'+$('input[name=trims_app_supplier_name]').val()+'"></td>' +

                '</tr>';
            $("#table").append(row);
            $('#trims_origin_country').removeAttr('selected');
            $('#form').trigger("reset");
        }

        function removeRow(key){
            $('#fabrics_tna_'+key).remove();
        }
        function editRow(key){
            var color_name = $('#color_name_'+key).val();
            var shell_booking_date = $('#shell_booking_date_'+key).val();
            var shell_plan_inhouse_date = $('#shell_plan_inhouse_date_'+key).val();
            var shell_actual_inhouse_date = $('#shell_actual_inhouse_date_'+key).val();
            var shell_origin_country = $('#shell_origin_country_'+key).val();
            var shell_app_supplier_name = $('#shell_app_supplier_name_'+key).val();
            var trims_booking_date = $('#trims_booking_date_'+key).val();
            var trims_plan_inhouse_date = $('#trims_plan_inhouse_date_'+key).val();
            var trims_actual_inhouse_date = $('#trims_actual_inhouse_date_'+key).val();
            var trims_origin_country = $('#trims_origin_country_'+key).val();
            var trims_app_supplier_name = $('#trims_app_supplier_name_'+key).val();
            
            $.alert({
                 title: 'Edit Fabrics T&A',
                 content: "url:{{url('actionPlan/fabrics_tna/edit/')}}/"+color_name +'&'+shell_booking_date +'&'+shell_plan_inhouse_date +'&'+shell_actual_inhouse_date +'&'+shell_origin_country +'&'+shell_app_supplier_name +'&'+trims_booking_date +'&'+trims_plan_inhouse_date +'&'+trims_actual_inhouse_date +'&'+trims_origin_country +'&'+trims_app_supplier_name,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   close: {
                     text: 'Save',
                     btnClass: 'btn-default',
                     action: function(){

                         $('#color_name_row_'+key).html($('#color_name_edit').val());
                         $('#shell_booking_date_row_'+key).html($('#shell_booking_date_edit').val());
                         $('#shell_plan_inhouse_date_row_'+key).html($('#shell_plan_inhouse_date_edit').val());
                         $('#shell_actual_inhouse_date_row_'+key).html($('#shell_booking_date_edit').val());
                         $('#shell_origin_country_row_'+key).html($('#shell_origin_country_edit').val());
                         $('#shell_app_supplier_name_row_'+key).html($('#shell_app_supplier_name_edit').val());
                         $('#trims_booking_date_row_'+key).html($('#trims_booking_date_edit').val());
                         $('#trims_plan_inhouse_date_row_'+key).html($('#trims_plan_inhouse_date_edit').val());
                         $('#trims_actual_inhouse_date_row_'+key).html($('#trims_actual_inhouse_date_edit').val());
                         $('#trims_origin_country_row_'+key).html($('#trims_origin_country_edit').val());
                         $('#trims_app_supplier_name_row_'+key).html($('#trims_app_supplier_name_edit').val());

                         
                         $('#color_name__'+key).val($('#color_name_edit').val());
                         $('#shell_booking_date_'+key).val($('#shell_booking_date_edit').val());
                         $('#shell_plan_inhouse_date_'+key).val($('#shell_plan_inhouse_date_edit').val());
                         $('#shell_actual_inhouse_date_'+key).val($('#shell_booking_date_edit').val());
                         $('#shell_origin_country_'+key).val($('#shell_origin_country_edit').val());
                         $('#shell_app_supplier_name_'+key).val($('#shell_app_supplier_name_edit').val());
                         $('#trims_booking_date_'+key).val($('#trims_booking_date_edit').val());
                         $('#trims_plan_inhouse_date_'+key).val($('#trims_plan_inhouse_date_edit').val());
                         $('#trims_actual_inhouse_date_'+key).val($('#trims_actual_inhouse_date_edit').val());
                         $('#trims_origin_country_'+key).val($('#trims_origin_country_edit').val());
                         $('#trims_app_supplier_name_'+key).val($('#trims_app_supplier_name_edit').val());

                        //return false;

                     }
                   }
                }
           });
        }

    </script>
@endsection