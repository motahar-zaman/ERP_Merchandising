@extends('layouts.fixed')

@section('title','WELL-GROUP | FORECAST')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Forecast</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Forecast</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Production\ForecastController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                                        {{ Form::label('factory_id','Factory: ') }}
                                        {{ Form::select('factory_id',$repository->AllCompanyUnit(),null,['id'=>'factory_id','class'=>'form-control','placeholder'=>'Select Factory','onchange'=>'getForecast()','required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('production_date','Production Date : ') }}
                                        {{ Form::date('production_date',$date_today,['id'=>'production_date','class'=>'form-control ','placeholder'=>'Date']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('reporting_date','Reporting Date : ') }}
                                        {{ Form::date('reporting_date',$date_today, ['id'=>'reporting_date','class'=>'form-control ','placeholder'=>'Reporting Date']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <br>
                                    <div class="from-group">
                                        {{ Form::label('target_date','Target Date : ') }}
                                        {{ Form::date('target_date',$date_today, ['id'=>'target_date','class'=>'form-control ','placeholder'=>'Target Date']) }}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Details</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
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
                                                <select onchange="getForecast()" name="line" id="line" class="form-control">
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
                                                {{ Form::select('buyer_id',$buyers,null,['class'=>'form-control','placeholder'=>'Select Buyer','onchange'=>'getForecast()']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                                {{ Form::label('item_id','Item: ') }}
                                                {{ Form::select('item_id',$items,null,['class'=>'form-control','placeholder'=>'Select Item','onchange'=>'getForecast()']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('style_id') ? 'has-error' : '' }}">
                                               {{ Form::label('style_id','Style: ') }}
                                                {{ Form::select('style_id',$styles,null,['class'=>'form-control','placeholder'=>'Select Style','onchange'=>'getForecast()']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('smv') ? 'has-error' : '' }}">
                                                {{ Form::label('','SMV : ') }}
                                                {{ Form::text('smv',null,['id'=>'smv','class'=>'form-control','placeholder'=>'SMV' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('op_present') ? 'has-error' : '' }}">
                                                {{ Form::label('','OP Present : ') }}
                                                {{ Form::text('op_present',null,['id'=>'op_present','class'=>'form-control','placeholder'=>'OP Present' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('hp_present') ? 'has-error' : '' }}">
                                                {{ Form::label('','HP Present : ') }}
                                                {{ Form::text('hp_present',null,['id'=>'hp_present','class'=>'form-control','placeholder'=>'HP Present' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('total_mp') ? 'has-error' : '' }}">
                                                {{ Form::label('','Total MP : ') }}
                                                {{ Form::text('total_mp',null,['id'=>'total_mp','class'=>'form-control','placeholder'=>'Total MP','readonly' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('running_mc') ? 'has-error' : '' }}">
                                                {{ Form::label('','Running M/C : ') }}
                                                {{ Form::text('running_mc',null,['id'=>'running_mc','class'=>'form-control','placeholder'=>'Running M/C' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('prod_days') ? 'has-error' : '' }}">
                                                {{ Form::label('','Prod Days : ') }}
                                                {{ Form::text('prod_days',null,['id'=>'prod_days','class'=>'form-control','placeholder'=>'Prod Days' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
                                                {{ Form::label('','Qty : ') }}
                                                {{ Form::text('qty',null,['id'=>'qty','class'=>'form-control','placeholder'=>'Qty' ]) }}
                                            </div>
                                        </div>
                                         <div class="col-lg-3">
                                            <div class="form-group {{ $errors->has('alloc_qty') ? 'has-error' : '' }}">
                                                {{ Form::label('','Allocated Qty : ') }}
                                                {{ Form::text('alloc_qty',null,['id'=>'alloc_qty','class'=>'form-control','placeholder'=>'Allocated Qty' ]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Target & Output</h2>
                                        </div>
                                    <br>

                                    <div class="row" style="padding-bottom: 20px; ">
                                        <div class="col-lg-12 card" style="padding-top: 20px">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('present_target') ? 'has-error' : '' }}">
                                                        {{ Form::label('present_target','Target Output') }}
                                                        {{ Form::text('present_target',null,['class'=>'form-control','placeholder'=>'Target']) }}
                                                        @if($errors->has('present_target'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('present_target') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('present_target_hours') ? 'has-error' : '' }}">
                                                        {{ Form::label('present_target_hours','Target Hours') }}
                                                        {{ Form::text('present_target_hours',null,['class'=>'form-control','placeholder'=>'Target Hours']) }}
                                                        @if($errors->has('present_target_hours'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('present_target_hours') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('last_production_output') ? 'has-error' : '' }}">
                                                        {{-- .$last_production ? date('d-M',strtotime($last_production->reporting_date)) : '' --}}
                                                        {{ Form::label('last_production_output','Last Production Output') }}
                                                        {{ Form::text('last_production_output',0,['class'=>'form-control','placeholder'=>'Last Production Output','readonly']) }}
                                                        @if($errors->has('last_production_output'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_production_output') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- .$past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : ''. --}}
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('last_day_target') ? 'has-error' : '' }}">
                                                        {{ Form::label('last_day_target','Last Day Target') }}
                                                        {{ Form::text('last_day_target',null,['class'=>'form-control','placeholder'=>'Last Day Target','readonly']) }}
                                                        @if($errors->has('last_day_target'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_day_target') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- .$past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : ''. --}}
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('last_day_output') ? 'has-error' : '' }}">
                                                        {{ Form::label('last_day_output','Last Day Output') }}
                                                        {{ Form::text('last_day_output',null,['class'=>'form-control','placeholder'=>'Last Day Output']) }}
                                                        @if($errors->has('last_day_output'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_day_output') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- .$past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : ''. --}}
                                                <div class="col-lg-4">
                                                    <div class="form-group {{ $errors->has('last_day_hours') ? 'has-error' : '' }}">
                                                        {{ Form::label('last_day_hours','Last Day Hours') }}
                                                        {{ Form::text('last_day_hours',null,['class'=>'form-control','placeholder'=>'Last Day Hours']) }}
                                                        @if($errors->has('last_day_hours'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_day_hours') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                        <div class="head">
                                            <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Others</h2>
                                        </div>
                                    <br>
                                    <div class="row">
                                        @foreach(forecastOptions() as $key => $option)
                                            <div class="col-lg-3">
                                                <div class="form-group {{ $errors->has($key) ? 'has-error' : '' }}">
                                                    {{ Form::label($option) }}
                                                    {{ Form::text($key,null,['id'=>$key,'class'=>'form-control','placeholder'=>$option]) }}
                                                </div>
                                            </div>
                                        @endforeach
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
                                        <th colspan="7"></th>
                                        <th style="text-align: center;" colspan="5">Production Day{{-- {{ $past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : '' }} --}}</th>
                                        <th style="text-align: center;" colspan="2">Target</th>
                                        <th style="text-align: center;">Last Production{{-- {{ $last_production ? date('d-M',strtotime($last_production->reporting_date)) : '' }} --}}</th>
                                        <th style="text-align: center;" colspan="3">Last Day{{--  ({{ $past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : '' }}) --}}</th>
                                        <th colspan="16"></th>
                                        <th style="text-align: center;" colspan="2">{{ date('d-M',strtotime($date_today)) }}</th>
                                        <th style="text-align: center;" colspan="2">{{-- {{ $past_forcast ? date('d-M',strtotime($past_forcast->reporting_date)) : '' }} --}}</th>
                                        <th colspan="8"></th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <th>Floor</th>
                                        <th>Line No</th>
                                        <th>Buyer</th>
                                        <th>Item</th>
                                        <th>Style</th>
                                        <th>SMV</th>
                                        <th><span>OP Present</span></th>
                                        <th>HP Present</th>
                                        <th>Total MP</th>
                                        <th>Running M/C</th>
                                        <th>Prod Days</th>
                                        <th>Qty</th>
                                        <th>Allocated Qty</th>
                                        <th>({{ date('d-M',strtotime($date_today)) }})</th>
                                        <th>Hours</th>
                                        <th>Output</th>
                                        <th>Target</th>
                                        <th>Output</th>
                                        <th>Hours</th>
                                        @foreach(forecastOptions() as $forecast)
                                            <th>{{ $forecast }}</th>
                                        @endforeach
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
        var all_input_fields = ['floor','line','buyer_id','item_id','style_id','smv','op_present','hp_present','total_mp','running_mc','prod_days','qty','alloc_qty','present_target','present_target_hours','last_production_output','last_day_target','last_day_output','last_day_hours','varience','achieve','pcs_per_machine','wash_send','input_target','today_input','new_style_input','total_input','total_output','need_wip','avg_output','wip_line_balance','monthly_total_target','monthly_total_output','monthly_varience','monthly_achieve','efficiency','dhu','total_npt_min','npt_details','reason_for_less_production','remarks','style_cm','plan_cm','cm_erned','cm_short'];

        $( document ).ready(function() {
            document.getElementById("varience").readOnly = true;
            document.getElementById("achieve").readOnly = true;
            document.getElementById("pcs_per_machine").readOnly = true;
            document.getElementById("total_input").readOnly = true;
            document.getElementById("total_output").readOnly = true;
            document.getElementById("need_wip").readOnly = true;
            document.getElementById("avg_output").readOnly = true;
            document.getElementById("wip_line_balance").readOnly = true;
            document.getElementById("monthly_total_target").readOnly = true;
            document.getElementById("monthly_total_output").readOnly = true;
            document.getElementById("efficiency").readOnly = true;
            document.getElementById("monthly_varience").readOnly = true;
            document.getElementById("monthly_achieve").readOnly = true;
            document.getElementById("style_cm").readOnly = true;
            document.getElementById("plan_cm").readOnly = true;
            document.getElementById("cm_erned").readOnly = true;
            document.getElementById("cm_short").readOnly = true;

            document.getElementById("total_input").value = 0;
            document.getElementById("total_output").value = 0;
            document.getElementById("monthly_total_target").value = 0;
            document.getElementById("monthly_total_output").value = 0;
        });
        $( "#style_id" ).change(function() {
            getCM();
        });
        function getCM(){
            $.ajax({
              url: '{{ url('production/get-forecast-style') }}/'+$('#style_id').val(),
              type: 'GET',
              dataType: 'json',
          })
          .done(function(response) {
              var last_day_target = $('#last_day_target').val();
              var last_day_output = $('#last_day_output').val();

              var style_cm = parseFloat(response.cm).toFixed(2);
              var plan_cm = parseFloat(style_cm *last_day_target).toFixed(2)
              var cm_erned = parseFloat(style_cm *last_day_output).toFixed(2)
              var cm_short = parseFloat(plan_cm - cm_erned).toFixed(2);

              $('#style_cm').val(style_cm);
              $('#cm_erned').val(cm_erned);
              $('#plan_cm').val(plan_cm);
              $('#cm_short').val(cm_short);
          });
        }
        $("#op_present, #hp_present").keyup(function(){
            console.log(1)
            var hp_present = document.getElementById("hp_present").value;
            if(hp_present == ''){
                hp_present = 0;
            }
            var op_present = document.getElementById("op_present").value;
            if(op_present == ''){
                op_present = 0;
            }
            document.getElementById("total_mp").value = parseFloat(parseFloat(hp_present) + parseFloat(op_present));
        });
        function getForecast(){
            var factory_id = document.getElementById("factory_id").value;
            var floor = document.getElementById("floor").value;
            var line = document.getElementById("line").value;
            var buyer_id = document.getElementById("buyer_id").value;
            var item_id = document.getElementById("item_id").value;
            var style_id = document.getElementById("style_id").value;

            if(factory_id != '' && floor != '' && line != '' && buyer_id != '' && item_id != '' && style_id != ''){
                $.ajax({
                    url: '{{ url('production/get-forecast') }}/'+factory_id+'&'+floor+'&'+line+'&'+buyer_id+'&'+item_id+'&'+style_id,
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(response) {
                    if(response.success){
                        document.getElementById("last_production_output").value = response.last_production_output;
                        document.getElementById("total_input").value = response.total_input;
                        document.getElementById("total_output").value = response.total_output;
                        document.getElementById("monthly_total_target").value = response.monthly_total_target;
                        document.getElementById("monthly_total_output").value = response.monthly_total_output;
                        if(response.past_forcast != null){
                            document.getElementById("last_day_target").value = response.past_forcast.target;
                            
                        }else{
                            document.getElementById("last_day_target").value = 0;
                            
                        }
                        calculate();
                        getCM();
                    }
                });
            }
        }

        function calculate(){
            var varience = parseFloat(document.getElementById("last_day_output").value - document.getElementById("last_day_target").value);
            var achieve = 0;
            if(parseFloat(document.getElementById("last_day_target").value) > 0){
                achieve = (document.getElementById("last_day_output").value * 100)/document.getElementById("last_day_target").value;
            }
            var pcs_per_machine = 0;
            if(parseFloat(document.getElementById("last_day_hours").value) > 0 && parseFloat(document.getElementById("prod_days").value) > 0){
                pcs_per_machine = (document.getElementById("last_production_output").value/document.getElementById("last_day_hours").value)/document.getElementById("prod_days").value;
            }
            var avg_output = 0;
            if(parseFloat(document.getElementById("prod_days").value) > 0){
                avg_output = document.getElementById("total_output").value/document.getElementById("prod_days").value;
            }

            var need_wip = document.getElementById("last_day_target").value * 2.5;
            var wip_line_balance = document.getElementById("total_input").value - document.getElementById("total_output").value - 100;
            var monthly_varience = document.getElementById("total_output").value - document.getElementById("total_input").value;
            var monthly_achieve = 0;
            if(document.getElementById("total_input").value > 0){
                monthly_achieve = (document.getElementById("total_output").value*100)/document.getElementById("total_input").value;
            }
            var efficiency = 0;
            console.log(document.getElementById("last_day_hours").value)
            if(document.getElementById("total_mp").value > 0 && document.getElementById("last_day_hours").value > 0){
                efficiency = (document.getElementById("last_day_output").value * document.getElementById("smv").value * 100)/(document.getElementById("total_mp").value * document.getElementById("last_day_hours").value * 60);
            }
            
            // today_input = parseFloat(document.getElementById("today_input").value);
            // total_input = parseFloat(document.getElementById("total_input").value);
            // total_output = parseFloat(document.getElementById("total_output").value);

            document.getElementById("varience").value = parseFloat(varience).toFixed(2);
            document.getElementById("achieve").value = parseFloat(achieve).toFixed(2);
            document.getElementById("pcs_per_machine").value = parseFloat(pcs_per_machine).toFixed(2);
            document.getElementById("avg_output").value = parseFloat(avg_output).toFixed(2);
            document.getElementById("need_wip").value = parseFloat(need_wip).toFixed(2);
            document.getElementById("wip_line_balance").value = parseFloat(wip_line_balance).toFixed(2);
            document.getElementById("monthly_varience").value = parseFloat(monthly_varience).toFixed(2);
            document.getElementById("monthly_achieve").value = parseFloat(monthly_achieve).toFixed(2);
            document.getElementById("efficiency").value = parseFloat(efficiency).toFixed(2);
            // document.getElementById("total_input").value = parseFloat(today_input + total_input); 
            // document.getElementById("total_output").value = parseFloat(document.getElementById("last_day_output").value + total_input); 
        }

        $("#prod_days, #smv, #total_mp, #last_day_hours, #last_day_output").keyup(function(){
          calculate();
        });

        

        function addToList(e){
            var data = $("#form").serializeArray();
            var key = parseInt($('#key_value').val());
            
//            alert('add to list');
            //<i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;
            var row = '<tr id="forcast_'+(key+1)+'">' +
                '<td><i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>';
            var i =0;
            for(i = 0; i< all_input_fields.length; i++){
                if(i > 4){
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+'').val()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }else{
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+' option:selected').text()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }

                /* Reset All Fields*/
                $('#'+all_input_fields[i]).val('');
                

            }
            row += '</tr>';

            $("#table").append(row);

            //$('#form').trigger("reset");
            $('#key_value').val(key+1);
        }

        function removeRow(key){
            $('#forcast_'+key).remove();
        }

    </script>
@endsection