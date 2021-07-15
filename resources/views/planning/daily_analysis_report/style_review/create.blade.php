@extends('layouts.fixed')

@section('title','WELL-GROUP | Style Review')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Style Review</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Style Review</b></li>
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
                            {{-- <div class="row">
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
                            <br> --}}
                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Style Review</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
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
                                            <div class="form-group all_input_fields {{ $errors->has('po_no') ? 'has-error' : '' }}">
                                                {{ Form::label('','PO No') }}
                                                {{ Form::text('po_no',null,['id'=>'po_no','class'=>'form-control','placeholder'=>'PO No']) }}
                                                @if($errors->has('po_no'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('po_no') }}</strong>
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
                                            <div class="form-group all_input_fields {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                                {{ Form::label('','Order quantity') }}
                                                <input type="text" class="form-control" id="quantity" name="quantity" onkeyup="withPercent()" placeholder="Order quantity">
                                                {{-- {{ Form::text('quantity',null,['id'=>'quantity','class'=>'form-control','placeholder'=>'Order quantity']) }} --}}
                                                @if($errors->has('quantity'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('quantity') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('with_percent') ? 'has-error' : '' }}">
                                                {{ Form::label('','With 2 %') }}
                                                {{ Form::text('with_percent',null,['id'=>'with_percent','class'=>'form-control','placeholder'=>'With 2 %','readonly']) }}
                                                @if($errors->has('with_percent'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('with_percent') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('delivery_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Deli Date') }}
                                                {{ Form::date('delivery_date',null,['id'=>'delivery_date','class'=>'form-control','placeholder'=>'Deli Date']) }}
                                                @if($errors->has('delivery_date'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('delivery_date') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Sewing</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sewing_com_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Complete Date') }}
                                                {{ Form::text('sewing_com_date',null,['id'=>'sewing_com_date','class'=>'form-control','placeholder'=>'Complete Date']) }}
                                                @if($errors->has('sewing_com_date'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('sewing_com_date') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sewing_total_complete') ? 'has-error' : '' }}">
                                                {{ Form::label('','Total Complete') }}
                                                {{ Form::text('sewing_total_complete',null,['id'=>'sewing_total_complete','class'=>'form-control','placeholder'=>'Total Complete']) }}
                                                @if($errors->has('sewing_total_complete'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('sewing_total_complete') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sewing_balance') ? 'has-error' : '' }}">
                                                {{ Form::label('','Balance') }}
                                                <input type="text" class="form-control" id="sewing_balance" name="sewing_balance"  placeholder="Balance">
                                                {{-- {{ Form::text('sewing_balance',null,['id'=>'sewing_balance','class'=>'form-control','placeholder'=>'Order sewing_balance']) }} --}}
                                                @if($errors->has('sewing_balance'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('sewing_balance') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sewing_day_remaining') ? 'has-error' : '' }}">
                                                {{ Form::label('','Day Remaining') }}
                                                {{ Form::text('sewing_day_remaining',null,['id'=>'sewing_day_remaining','class'=>'form-control','placeholder'=>'Day Remaining']) }}
                                                @if($errors->has('sewing_day_remaining'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('sewing_day_remaining') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('sewing_need_per_day') ? 'has-error' : '' }}">
                                                {{ Form::label('','Need Per Day') }}
                                                {{ Form::date('sewing_need_per_day',null,['id'=>'sewing_need_per_day','class'=>'form-control','placeholder'=>'Need Per Day']) }}
                                                @if($errors->has('sewing_need_per_day'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('sewing_need_per_day') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>


                             <div class="head">
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Finishing</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('finishing_com_date') ? 'has-error' : '' }}">
                                                {{ Form::label('','Complete Date') }}
                                                {{ Form::text('finishing_com_date',null,['id'=>'finishing_com_date','class'=>'form-control','placeholder'=>'Complete Date']) }}
                                                @if($errors->has('finishing_com_date'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('finishing_com_date') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('finishing_total_complete') ? 'has-error' : '' }}">
                                                {{ Form::label('','Total Complete') }}
                                                {{ Form::text('finishing_total_complete',null,['id'=>'finishing_total_complete','class'=>'form-control','placeholder'=>'Total Complete']) }}
                                                @if($errors->has('finishing_total_complete'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('finishing_total_complete') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('finishing_balance') ? 'has-error' : '' }}">
                                                {{ Form::label('','Balance') }}
                                                <input type="text" class="form-control" id="finishing_balance" name="finishing_balance"  placeholder="Balance">
                                                {{-- {{ Form::text('finishing_balance',null,['id'=>'finishing_balance','class'=>'form-control','placeholder'=>'Order finishing_balance']) }} --}}
                                                @if($errors->has('finishing_balance'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('finishing_balance') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('finishing_day_remaining') ? 'has-error' : '' }}">
                                                {{ Form::label('','Day Remaining') }}
                                                {{ Form::text('finishing_day_remaining',null,['id'=>'finishing_day_remaining','class'=>'form-control','placeholder'=>'Day Remaining']) }}
                                                @if($errors->has('finishing_day_remaining'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('finishing_day_remaining') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group all_input_fields {{ $errors->has('finishing_need_per_day') ? 'has-error' : '' }}">
                                                {{ Form::label('','Need Per Day') }}
                                                {{ Form::date('finishing_need_per_day',null,['id'=>'finishing_need_per_day','class'=>'form-control','placeholder'=>'Need Per Day']) }}
                                                @if($errors->has('finishing_need_per_day'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('finishing_need_per_day') }}</strong>
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
                                        <th colspan="8"></th>
                                        <th class="text-center" colspan="5">Sewing</th>
                                        <th class="text-center" colspan="5">Finishing</th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        @php 
                                            $styleReviews = styleReviews();
                                        @endphp
                                        @foreach($styleReviews as $value)
                                        <th>{{ $value }}</th>
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
{{-- <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        var all_input_fields = ['buyer_id','style_id','po_no','item','quantity','with_percent','delivery_date','sewing_com_date','sewing_total_complete','sewing_balance','sewing_day_remaining','sewing_need_per_day','finishing_com_date','finishing_total_complete','finishing_balance' ,'finishing_day_remaining','finishing_need_per_day'];

        function withPercent(){
            var quantity = parseInt($('#quantity').val());
            if(quantity > 0){
                var with_percent = Math.round(quantity + (quantity*2)/100);
            }else{
                var with_percent = '';
            }
            $('#with_percent').val(with_percent);
        }


        function addToList(e){
            var data = $("#form").serializeArray();
            var key = parseInt($('#tna_value').val());
            
//            alert('add to list');
            var row = '<tr id="style_review_'+(key+1)+'">' +
                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>';
            var i =0;
            for(i = 0; i< all_input_fields.length; i++){
                if(i != 0 && i != 1){
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
            $('#style_review_'+key).remove();
        }
        function editRow(key){
            var i =0;
            var data = '';
            for(i = 0; i< all_input_fields.length; i++){
                data += $('#'+all_input_fields[i]+'_'+key).val()+'&';
            }

            $.alert({
                 title: 'Edit Style Review',
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