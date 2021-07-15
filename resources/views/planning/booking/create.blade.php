@extends('layouts.fixed')

@section('title','WELL-GROUP | Capacity Booking Plan')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Capacity Booking Plan</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Capacity Booking Plan</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Planning\BookingPlanController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                                        {{ Form::label('booking_plan_no','Select Booking Plan : ') }}
                                        <select onchange="selectBooking()" class="form-control" name="booking_plan_no" id="booking_plan_no">
                                            <option value="">Select Booking Plan</option>
                                            @if(isset($booking_plan[0]->id))
                                                @foreach($booking_plan as $plan)
                                                    <option value="{{ $plan->id }}">{{ $plan->id }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Capacity Booking Plan</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('lc_factory') ? 'has-error' : '' }}">
                                                {{ Form::label('','LC Factory : ') }}
                                                <input type="text" id="lc_factory" name="lc_factory" class="form-control" placeholder="LC Factory">
                                                @if($errors->has('lc_factory'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('lc_factory') }}</strong>
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
                                            <div class="form-group all_input_fields {{ $errors->has('item') ? 'has-error' : '' }}">
                                                {{ Form::label('','Item') }}
                                                {{ Form::text('item',null,['id'=>'item','class'=>'form-control','placeholder'=>'Item']) }}
                                                @if($errors->has('item'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('item') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('merchandiser') ? 'has-error' : '' }}">
                                                {{ Form::label('','Responsible Merchandiser') }}
                                                {{ Form::text('merchandiser',null,['id'=>'merchandiser','class'=>'form-control','placeholder'=>'Merchandiser']) }}
                                                @if($errors->has('merchandiser'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('merchandiser') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('merchandiser_head') ? 'has-error' : '' }}">
                                                {{ Form::label('','Responsible Marchandiser Head') }}
                                                {{ Form::text('merchandiser_head',null,['id'=>'merchandiser_head','class'=>'form-control','placeholder'=>'Marchandiser Head']) }}
                                                @if($errors->has('merchandiser_head'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('merchandiser_head') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sketch_or_sample') ? 'has-error' : '' }}">
                                                {{ Form::label('','Sketch/Sample (Rcvd. or Not)') }}
                                                {{ Form::text('sketch_or_sample',null,['id'=>'sketch_or_sample','class'=>'form-control','placeholder'=>'Yes/No']) }}
                                                @if($errors->has('sketch_or_sample'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('sketch_or_sample') }}</strong>
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
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                                {{ Form::label('','Order Qty') }}
                                                {{ Form::text('quantity',null,['id'=>'quantity','class'=>'form-control','placeholder'=>'Order Qty']) }}
                                                @if($errors->has('quantity'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('quantity') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('order_season') ? 'has-error' : '' }}">
                                                {{ Form::label('','Order Season') }}
                                                {{ Form::text('order_season',null,['id'=>'order_season','class'=>'form-control','placeholder'=>'Order Season']) }}
                                                @if($errors->has('order_season'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('order_season') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('input_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Input Date (App.)') }}
                                                {{ Form::date('input_date',null,['id'=>'input_date','class'=>'form-control','placeholder'=>'Input Date']) }}
                                                @if($errors->has('input_date'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('input_date') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('ex_factory') ? 'has-error' : '' }}">
                                                {{ Form::label('','Ex Factory (App.)') }}
                                                {{ Form::text('ex_factory',null,['id'=>'ex_factory','class'=>'form-control','placeholder'=>'Ex Factory (App.)']) }}
                                                @if($errors->has('ex_factory'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ex_factory') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('wash') ? 'has-error' : '' }}">
                                                {{ Form::label('','Wash/ Non Wash') }}
                                                {{ Form::text('wash',null,['id'=>'wash','class'=>'form-control','placeholder'=>'Wash/ Non Wash']) }}
                                                @if($errors->has('wash'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('wash') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('emblishment') ? 'has-error' : '' }}">
                                                {{ Form::label('','Emblishment (Print/Emb)') }}
                                                {{ Form::text('emblishment',null,['id'=>'emblishment','class'=>'form-control','placeholder'=>'Emblishment (Print/Emb)']) }}
                                                @if($errors->has('emblishment'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('emblishment') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                                {{ Form::label('','Remarks') }}
                                                {{ Form::text('remarks',null,['id'=>'remarks','class'=>'form-control','placeholder'=>'Remarks']) }}
                                                @if($errors->has('remarks'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('remarks') }}</strong>
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
                            <div class="table-responsive p-0 col-lg-12">
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th>Action</th>
                                        <th>LC Factory</th>
                                        <th>Buyer</th>
                                        <th>Style</th>
                                        <th>Item</th>
                                        <th>Merchandiser</th>
                                        <th>Merchandiser Head</th>
                                        <th>Sketch/Sample</th>
                                        <th>SMV</th>
                                        <th>Order Qty</th>
                                        <th>Order Season</th>
                                        <th>Input DATE</th>
                                        <th>Ex Factory</th>
                                        <th>Wash/Not Wash</th>
                                        <th>Emblishment</th>
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
{{-- <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        var all_input_fields = ['lc_factory','buyer_id','style_id','item','merchandiser','merchandiser_head','sketch_or_sample','smv','quantity','order_season','input_date','ex_factory','wash','emblishment','remarks',];

        function selectBooking(){
            var booking_plan_id = $('#booking_plan_no').val();
            if(booking_plan_id > 0){
                $.ajax({
                    url: '{{ url('bookingPlan/select/') }}/'+booking_plan_id,
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(response) {
                    if(response.success){
                        $('#lc_factory').val(response.booking_plan.lc_factory);
                        $('#buyer_id').val(response.booking_plan.buyer_id);
                        $('#style_id').val(response.booking_plan.style_id);
                        $('#item').val(response.booking_plan.item);
                        $('#merchandiser').val(response.booking_plan.merchandiser);
                        $('#merchandiser_head').val(response.booking_plan.merchandiser_head);
                        $('#sketch_or_sample').val(response.booking_plan.sketch_or_sample);
                        $('#smv').val(response.booking_plan.smv);
                        $('#quantity').val(response.booking_plan.quantity);
                        $('#order_qty').val(response.booking_plan.order_qty);
                        $('#input_date').val(response.booking_plan.input_date);
                        $('#ex_factory').val(response.booking_plan.ex_factory);
                        $('#wash').val(response.booking_plan.wash);
                        $('#emblishment').val(response.booking_plan.emblishment);
                        $('#remarks').val(response.booking_plan.remarks);
                    }
                });
            }else{
                $('#form').trigger("reset");
            }
            
        }
        function addToList(e){
            var data = $("#form").serializeArray();
            var key = parseInt($('#tna_value').val());
            
//            alert('add to list');
            var row = '<tr id="sample_tna_'+(key+1)+'">' +
                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>';
            var i =0;
            for(i = 0; i< all_input_fields.length; i++){
                if(i != 1 && i != 2){
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+'').val()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }else{
                    row += '<td><span id="'+all_input_fields[i]+'_row_'+(key+1)+'">'+$('#'+all_input_fields[i]+' option:selected').text()+'</span><input type="hidden" id="'+all_input_fields[i]+'_'+(key+1)+'" name="'+all_input_fields[i]+'[]" value="'+$('#'+all_input_fields[i]+'').val()+'"></td>';
                }
                

            }
            row += '</tr>';

            $("#table").append(row);
            $('#form').trigger("reset");
            $('#tna_value').val(key+1);
        }

        function removeRow(key){
            $('#sample_tna_'+key).remove();
        }
        function editRow(key){
            var i =0;
            var data = '';
            for(i = 0; i< all_input_fields.length; i++){
                data += $('#'+all_input_fields[i]+'_'+key).val()+'&';
            }

            $.alert({
                 title: 'Edit Capacity Booking Plan',
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