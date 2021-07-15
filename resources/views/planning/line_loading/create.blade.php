@extends('layouts.fixed')

@section('title','WELL-GROUP | Line Loading Plan')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Line Loading Plan</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Line Loading Plan</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Planning\LineLoadingPlanController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <div class="from-group">
                                        {{ Form::label('','Date') }}
                                        {{ Form::date('date',$date_today,['id'=>'date','class'=>'form-control','placeholder'=>'Date']) }}
                                        @if($errors->has('date'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Line Loading Plan</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                           <div class="form-group all_input_fields {{ $errors->has('factory_id') ? 'has-error' : '' }}">
                                                {{ Form::label('','Factory') }}
                                                {{ Form::select('factory_id',$factories,null,['id'=>'factory_id','class'=>'form-control','placeholder'=>'Select Factory']) }}
                                                {{-- {{ Form::text('factory_id',null,['id'=>'factory_id','class'=>'form-control','placeholder'=>'Buyer']) }} --}}
                                                @if($errors->has('factory_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('factory_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('floor') ? 'has-error' : '' }}">
                                                {{ Form::label('','Floor') }}
                                                {{ Form::text('floor',null,['id'=>'floor','class'=>'form-control','placeholder'=>'Floor']) }}
                                                @if($errors->has('floor'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('floor') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('line_no') ? 'has-error' : '' }}">
                                                {{ Form::label('','Line No') }}
                                                {{ Form::text('line_no',null,['id'=>'line_no','class'=>'form-control','placeholder'=>'Line No']) }}
                                                @if($errors->has('line_no'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('line_no') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('buyer_id') ? 'has-error' : '' }}">
                                                {{ Form::label('','Buyer') }}
                                                {{ Form::select('buyer_id',$buyers,null,['id'=>'buyer_id','class'=>'form-control','placeholder'=>'Select Buyer']) }}
                                                {{-- {{ Form::text('buyer_id',null,['id'=>'buyer_id','class'=>'form-control','placeholder'=>'Buyer']) }} --}}
                                                @if($errors->has('buyer_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('buyer_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('style_id') ? 'has-error' : '' }}">
                                                {{ Form::label('','Style') }}
                                                {{ Form::select('style_id',$styles,null,['id'=>'style_id','class'=>'form-control','placeholder'=>'Select Style']) }}
                                                @if($errors->has('style_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('style_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                                {{ Form::label('','Item') }}
                                                {{ Form::select('item_id',$items,null,['id'=>'item_id','class'=>'form-control','placeholder'=>'Select Item']) }}
                                                @if($errors->has('item_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('item_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                                {{ Form::label('','Order quantity') }}
                                                <input type="number" class="form-control" id="quantity" name="quantity" onkeyup="withPercent()" placeholder="Order quantity">
                                                @if($errors->has('quantity'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('quantity') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('with_percent') ? 'has-error' : '' }}">
                                                {{ Form::label('','With 2%') }}
                                                <input type="number" class="form-control" id="with_percent" name="with_percent" onkeyup="withPercent()" placeholder="With 2%" readonly>
                                                @if($errors->has('with_percent'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('with_percent') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('mc_use') ? 'has-error' : '' }}">
                                                {{ Form::label('','MC Use: ') }}
                                                <input type="number" class="form-control" id="mc_use" name="mc_use" placeholder="MC Use:">
                                                @if($errors->has('mc_use'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('mc_use') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('smv') ? 'has-error' : '' }}">
                                                {{ Form::label('','SMV') }}
                                                {{ Form::text('smv',null,['id'=>'smv','class'=>'form-control','placeholder'=>'SMV']) }}
                                                @if($errors->has('smv'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('smv') }}</strong>
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
                            <div id="line_loading_table" class="table-responsive p-0 col-lg-12">
                                
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
@section('plugin')
@endsection

@section('script')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        var all_input_fields = ['factory_id','floor','line_no','buyer_id','style_id','item_id','quantity','mc_use','smv','date'];

        var all_input_fields_row = ['factory_id','floor','line_no','buyer_id','style_id','item_id','quantity','with_percent','allot_qty','mc_use','manpower','smv','avg_prod','days_total','eff_avg','avl_min_1','avl_min_2','target_output','target_efficiency','date'];

        function withPercent(){
            var quantity = parseInt($('#quantity').val());
            if(quantity > 0){
                var with_percent = Math.round(quantity + (quantity*2)/100);
            }else{
                var with_percent = '';
            }
            $('#with_percent').val(with_percent);
        }

        function manPower(){
            var mc_use = parseInt($('#mc_use').val());
            if(mc_use > 0){
                var manpower = Math.round(mc_use * 1.25);
                $('#avl_min_1').val(Math.round(mc_use * 1.25*600));
                $('#avl_min_2').val(Math.round(mc_use * 1.25*480));

            }else{
                var manpower = '';
                $('#avl_min_1').val('');
                $('#avl_min_2').val('');
            }
            $('#manpower').val(manpower);
        }
        
        function addToList(e){

            var i =0;
            var fields = '';
            for(i = 0; i< all_input_fields.length; i++){
                fields += $('#'+all_input_fields[i]).val()+'&';
            }
            var item_id = $('#item_id').val();
            var quantity = parseFloat($('#quantity').val());
            var mc_use = parseFloat($('#mc_use').val());

            if(item_id > 0 && quantity > 0 && mc_use > 0){
                $.ajax({
                    url: '{{ url('line-loading-plan') }}/calculate/'+fields,
                    type: 'GET',
                })
                .done(function(response) {

                    $('#line_loading_table').html(response);
                    for(i = 0; i< all_input_fields.length; i++){
                        if(i != 0 && i != 3 && i != 4 && i != 5){
                            $('#'+all_input_fields[i]+'_row').html($('#'+all_input_fields[i]+'').val());
                        }else{
                            $('#'+all_input_fields[i]+'_row').html($('#'+all_input_fields[i]+' option:selected').text());
                        }
                    }
                    // var total = 0;
                    

                    // $.each(response.dates, function(index, val) {
                    //     total = parseInt(parseInt(total) + parseInt(response.day[index+1]));
                    //     $('#'+val+'-efficiency').html(response.individual_efficiency[index+1]+' %');
                    //     $('#'+val+'-output').html(response.day[index+1]);
                    //     $('#'+val+'-cumulative-output').html(total);
                    // });
                    // $('#with_percent_row').html(response.with_percent);
                    // $('#allot_qty_row').html(response.allot_qty);
                    // $('#manpower_row').html(response.manpower);
                    // $('#avg_prod_row').html(response.avg_prod);
                    // $('#days_total_row').html(response.days_total);
                    // $('#eff_avg_row').html(response.eff_avg + ' %');
                    // $('#avl_min_1_row').html(response.avl_min_1);
                    // $('#avl_min_2_row').html(response.avl_min_2);
                });
            }else{
              $.alert({
                title:"Whoops!",
                content:"<hr><strong class='text-danger'>You must provide Item Name, Quantity and MC Use!</strong><hr>",
                type:"red"
              });
            }

        }

        function removeRow(key){
            $('#line_loading_'+key).remove();
        }
        function editRow(key){
            var i =0;
            var data = '';
            for(i = 0; i< all_input_fields.length; i++){
                data += $('#'+all_input_fields[i]+'_'+key).val()+'&';
            }

            $.alert({
                 title: 'Edit Line Loading Plan',
                 content: "url:{{url('bookingPlan/edit/')}}/"+data,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        var i =0;
                        for(i = 0; i< all_input_fields.length; i++){
                            if(i != 1 && i != 2){
                                $('#'+all_input_fields[i]+'_row_'+key).html($('#'+all_input_fields[i]+'_edit').val());
                                $('#'+all_input_fields[i]+'_'+key).val($('#'+all_input_fields[i]+'_edit').val());
                            }else{
                                $('#'+all_input_fields[i]+'_'+key).val($('#'+all_input_fields[i]+'_edit').val());
                                $('#'+all_input_fields[i]+'_row_'+key).html($('#'+all_input_fields[i]+'_edit option:selected').text());
                            }
                        }
                        //return false;

                     }

                   },
                   close: {
                     text: 'Close',
                     btnClass: 'btn-default',
                   },
               }
           });
        }

    </script>
@endsection