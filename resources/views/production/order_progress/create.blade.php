@extends('layouts.fixed')

@section('title','WELL-GROUP | Order Progress')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Order Progress</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Order Progress</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Production\OrderProgressController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Create Order Progress</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('factory_id','Factory: ') }}
                                                {{ Form::select('factory_id',$factories,null,['id'=>'factory_id','class'=>'form-control','placeholder'=>'Select Factory','onchange'=>'getForecast()','required']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('production_date','Production Date : ') }}
                                                {{ Form::date('production_date',null,['id'=>'production_date','class'=>'form-control ','placeholder'=>'Date','required']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('reporting_date','Reporting Date : ') }}
                                                {{ Form::date('reporting_date',$date_today, ['id'=>'reporting_date','class'=>'form-control ','placeholder'=>'Reporting Date']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                                                {{ Form::label('','Floor : ') }}
                                                <select onchange="getForecast()" name="floor" id="floor" class="form-control">
                                                    <option value="">Select Floor</option>
                                                    @foreach(floors() as $key => $floor)
                                                        <option value="{{ $key }}">{{ $floor }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('line') ? 'has-error' : '' }}">
                                                {{ Form::label('','Line : ') }}
                                                <select onchange="getForecast()" name="line_no" id="line_no" class="form-control">
                                                    <option value="">Select Line</option>
                                                    @foreach(lines() as $key => $line)
                                                        <option value="{{ $key }}">{{ $line }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('buyer_id') ? 'has-error' : '' }}">
                                                {{ Form::label('buyer_id','Buyer: ') }}
                                                {{ Form::select('buyer_id',$buyers,null,['class'=>'form-control','placeholder'=>'Select Buyer']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('style_id') ? 'has-error' : '' }}">
                                               {{ Form::label('style_id','Style: ') }}
                                                {{ Form::select('style_id',$styles,null,['class'=>'form-control','placeholder'=>'Select Style']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('color','Color: ') }}
                                                {{ Form::text('color',null,['id'=>'color','class'=>'form-control','placeholder'=>'Color']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('exit_date','Exit Date : ') }}
                                                {{ Form::date('exit_date',null,['id'=>'exit_date','class'=>'form-control ','placeholder'=>'Exit Date']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                                {{ Form::label('item_id','Item: ') }}
                                                {{ Form::select('item_id',$items,null,['class'=>'form-control','placeholder'=>'Select Item','onchange'=>'getForecast()']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('order_qty','Order Qty: ') }}
                                                {{ Form::text('order_qty',null,['id'=>'order_qty','class'=>'form-control','placeholder'=>'Select Order Qty']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('order_qty_with_percentage','Order Qty (With 2 %): ') }}
                                                {{ Form::text('order_qty_with_percentage',null,['id'=>'order_qty_with_percentage','class'=>'form-control','placeholder'=>'Order Qty (With 2 %)','readonly']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Cutting</h2>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('today_cutting','Today Cutting: ') }}
                                                {{ Form::text('today_cutting',null,['id'=>'today_cutting','class'=>'form-control','placeholder'=>'Today Cutting']) }}
                                            </div>
                                        </div>
                                       {{--  <div class="col-lg-6">
                                            <div class="form-group">
                                                {{ Form::label('total_cutting','Total Cutting: ') }}
                                                {{ Form::text('total_cutting',null,['id'=>'total_cutting','class'=>'form-control','placeholder'=>'Total Cutting']) }}
                                            </div>
                                        </div> --}}
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Sweing</h2>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('today_sewing_input','Today Input: ') }}
                                                {{ Form::text('today_sewing_input',null,['id'=>'today_sewing_input','class'=>'form-control','placeholder'=>'Today Input']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_sewing_input','Total Input: ') }}
                                                {{ Form::text('total_sewing_input',null,['id'=>'total_sewing_input','class'=>'form-control','placeholder'=>'Total Input']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('today_sewing','Today Sewing: ') }}
                                                {{ Form::text('today_sewing',null,['id'=>'today_sewing','class'=>'form-control','placeholder'=>'Today Sewing']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_sewing','Total Sewing: ') }}
                                                {{ Form::text('total_sewing',null,['id'=>'total_sewing','class'=>'form-control','placeholder'=>'Total Sewing']) }}
                                            </div>
                                        </div> --}}
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('sewing_wip','WIP: ') }}
                                                {{ Form::text('sewing_wip',null,['id'=>'sewing_wip','class'=>'form-control','placeholder'=>'WIP']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Washing</h2>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('today_send','Today Send: ') }}
                                                {{ Form::text('today_send',null,['id'=>'today_send','class'=>'form-control','placeholder'=>'Today Send']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('total_send','Total Send: ') }}
                                                {{ Form::text('total_send',null,['id'=>'total_send','class'=>'form-control','placeholder'=>'Total Send']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('today_washing_received','Today Received: ') }}
                                                {{ Form::text('today_washing_received',null,['id'=>'today_washing_received','class'=>'form-control','placeholder'=>'Today Received']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('total_washing_received','Total Received: ') }}
                                                {{ Form::text('total_washing_received',null,['id'=>'total_washing_received','class'=>'form-control','placeholder'=>'Total Received']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('washing_wip','WIP: ') }}
                                                {{ Form::text('washing_wip',null,['id'=>'washing_wip','class'=>'form-control','placeholder'=>'WIP']) }}
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Finishing</h2>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('today_finishing_received','Today Received: ') }}
                                                {{ Form::text('today_finishing_received',null,['id'=>'today_finishing_received','class'=>'form-control','placeholder'=>'Today Received']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_finishing_received','Total Received: ') }}
                                                {{ Form::text('total_finishing_received',null,['id'=>'total_finishing_received','class'=>'form-control','placeholder'=>'Total Received']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('day_qc_pass','Day QC Pass: ') }}
                                                {{ Form::text('day_qc_pass',null,['id'=>'day_qc_pass','class'=>'form-control','placeholder'=>'Day QC Pass']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_qc_pass','Total QC Pass: ') }}
                                                {{ Form::text('total_qc_pass',null,['id'=>'total_qc_pass','class'=>'form-control','placeholder'=>'Total QC Pass']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('today_pack','Today Pack (PCS): ') }}
                                                {{ Form::text('today_pack',null,['id'=>'today_pack','class'=>'form-control','placeholder'=>'Today Pack (PCS)']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_pack','Total Pack (PCS): ') }}
                                                {{ Form::text('total_pack',null,['id'=>'total_pack','class'=>'form-control','placeholder'=>'Total Pack (PCS)']) }}
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('bal_pack','BAL. Pack (PCS): ') }}
                                                {{ Form::text('bal_pack',null,['id'=>'bal_pack','class'=>'form-control','placeholder'=>'BAL. Pack (PCS)']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('daily_ctn','Daily CTN: ') }}
                                                {{ Form::text('daily_ctn',null,['id'=>'daily_ctn','class'=>'form-control','placeholder'=>'Daily CTN']) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <div class="form-group">
                                                {{ Form::label('total_ctn','Total CTN.: ') }}
                                                {{ Form::text('total_ctn',null,['id'=>'total_ctn','class'=>'form-control','placeholder'=>'Total CTN.']) }}
                                            </div>
                                        </div> --}}
                                        
                                    </div>
                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Cutting</h2>
                                        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {{ Form::label('ship_qty','Ship Qty: ') }}
                                                {{ Form::text('ship_qty',null,['id'=>'ship_qty','class'=>'form-control','placeholder'=>'Ship Qty']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {{ Form::label('remarks','Remarks: ') }}
                                                {{ Form::text('remarks',null,['id'=>'remarks','class'=>'form-control','placeholder'=>'Remarks']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="key_value" id="key_value" value="0">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info" onclick="addToList()">Add to List</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="table-responsive p-0 col-lg-12">
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th colspan="10"></th>
                                        <th class="text-center">Cutting</th>
                                        <th colspan="3" class="text-center">Sewing</th>
                                        <th colspan="3" class="text-center">Washing</th>
                                        <th colspan="5" class="text-center">Finishing</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <th>Floor</th>
                                        <th>Line No</th>
                                        <th>Buyer</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Exit Date</th>
                                        <th>Item</th>
                                        <th>Ord. Qty</th>
                                        <th>Ord. Qty (With 2 %)</th>
                                        <th>Today Cutting</th>
                                        <th>Today Input</th>
                                        <th>Today Sewing</th>
                                        <th>WIP</th>
                                        <th>Today Send</th>
                                        <th>Today Receive</th>
                                        <th>WIP</th>
                                        <th>Today Receive</th>
                                        <th>Daily QC Pass</th>
                                        <th>Today Pack</th>
                                        <th>BAL. Pack</th>
                                        <th>Daily CTN.</th>
                                        <th>Ship Qty</th>
                                        <th>Remarks</th>
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
        var all_input_fields = ['floor','line_no','buyer_id','style_id','color','exit_date','item_id','order_qty','order_qty_with_percentage','today_cutting','today_sewing_input','today_sewing','sewing_wip','today_send','today_washing_received','washing_wip','today_finishing_received','day_qc_pass','today_pack','bal_pack','daily_ctn','ship_qty','remarks',];

        $( document ).ready(function() {

            
        });
        $("#order_qty").keyup(function(){
            var order_qty = parseFloat(document.getElementById("order_qty").value);
            order_qty_with_percentage = 0;
            if(order_qty > 0){
                var order_qty_with_percentage = order_qty + (order_qty*2)/100;
            }

            document.getElementById("order_qty_with_percentage").value = order_qty_with_percentage;
            
        });

        function addToList(e){
            var data = $("#form").serializeArray();
            var key = parseInt($('#key_value').val());
            
//            alert('add to list');
            //<i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;
            var row = '<tr id="order_progress_'+(key+1)+'">' +
                '<td><i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>';
            var i =0;
            for(i = 0; i< all_input_fields.length; i++){
                if(i != 0 && i != 1 && i != 2 && i != 3 && i != 6){
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+'').val()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }else{
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+' option:selected').text()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }
                

            }
            row += '</tr>';

            $("#table").append(row);
            //$('#form').trigger("reset");
            $('#key_value').val(key+1);
        }

        function removeRow(key){
            $('#order_progress_'+key).remove();
        }

    </script>
@endsection