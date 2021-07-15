@extends('layouts.fixed')

@section('title','WELL-GROUP | PRE PRODUCTION PLAN')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>PRE PRODUCTION ACTIVITIES T&A</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>PRE PRODUCTION ACTIVITIES T&A</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Merchandise\ActionPlanController@pre_production_store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">PRE PRODUCTION ACTIVITIES T&A (RESPONSIBLE BY PLANNING)</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group {{ $errors->has('color_name') ? 'has-error' : '' }}">
                                                    {{ Form::label('','Garments Color Name : ') }}
                                                    {{ Form::text('color_name',null,['id'=>'color_name','class'=>'form-control','placeholder'=>'Enter Color Name:']) }}
                                                    @if($errors->has('color_name'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('color_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center" colspan="2">Options</th>
                                                <th class="text-center">Plan Date</th>
                                                <th class="text-center">Actual Date</th>
                                            </tr>
                                            @php 
                                                $pre_production_tnas = preProductionTNAs();

                                            @endphp
                                            @foreach($pre_production_tnas as $productionKey => $tna)
                                            <tr>
                                                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                                                <td style="padding: 3px !important" class="text-center">
                                                    <input type="date" class="form-control" name="{{ $productionKey }}" id="{{ $productionKey }}">
                                                </td>
                                                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $productionKey }}" id="actual_{{ $productionKey }}"></td>
                                            </tr>
                                            @endforeach
                                        </table>
                                         <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                                    {{ Form::label('','Remarks : ') }}
                                                    {{ Form::text('remarks',null,['id'=>'remarks','class'=>'form-control','placeholder'=>'Remarks:']) }}
                                                    @if($errors->has('remarks'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('remarks') }}</strong>
                                                    </span>
                                                    @endif
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
                                        <th>COLOR</th>
                                        <th colspan="2">PRO. SIZE SET READY Date</th>
                                        <th colspan="2">P.P MEETING Date</th>
                                        <th colspan="2">BULK CUTTING</th>
                                        <th colspan="2">SEWING START</th>
                                        <th colspan="2">SEWING FINISH</th>
                                        <th colspan="2">WASHING</th>
                                        <th colspan="2">FINISHING & PACKING</th>
                                        <th colspan="2">FINAL INSPECTION DATE</th>
                                        <th colspan="2">EX FACTORY</th>
                                        <th>REMARKS</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        @for($i = 0; $i < 9; $i++)
                                        <th>Plan</th>
                                        <th>Actual</th>
                                        @endfor
                                        <th></th>
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
            var row = '<tr id="pre_production_'+(key+1)+'">' +

                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>' +

                '<td><span id="color_name_row_'+(key+1)+'">'+$('input[name=color_name]').val()+'</span><input type="hidden" name="color_name[]"  id="color_name_'+(key+1)+'" value="'+$('input[name=color_name]').val()+'"></td>' +

                '<td><span id="size_ready_date_row_'+(key+1)+'">'+$('input[name=size_ready_date]').val()+'</span><input type="hidden" name="size_ready_date[]" id="size_ready_date_'+(key+1)+'" value="'+$('input[name=size_ready_date]').val()+'"></td>' +

                '<td><span id="actual_size_ready_date_row_'+(key+1)+'">'+$('input[name=actual_size_ready_date]').val()+'</span><input type="hidden" name="actual_size_ready_date[]" id="actual_size_ready_date_'+(key+1)+'" value="'+$('input[name=actual_size_ready_date]').val()+'"></td>' +

                '<td><span id="pp_meeting_date_row_'+(key+1)+'">'+$('input[name=pp_meeting_date]').val()+'</span><input type="hidden" name="pp_meeting_date[]" id="pp_meeting_date_'+(key+1)+'" value="'+$('input[name=pp_meeting_date]').val()+'"></td>' +

                 '<td><span id="actual_pp_meeting_date_row_'+(key+1)+'">'+$('input[name=actual_pp_meeting_date]').val()+'</span><input type="hidden" name="actual_pp_meeting_date[]" id="actual_pp_meeting_date_'+(key+1)+'" value="'+$('input[name=actual_pp_meeting_date]').val()+'"></td>' +

                '<td><span id="bulk_cut_date_row_'+(key+1)+'">'+$('input[name=bulk_cut_date]').val()+'</span><input type="hidden" name="bulk_cut_date[]" id="bulk_cut_date_'+(key+1)+'" value="'+$('input[name=bulk_cut_date]').val()+'"></td>' +

                '<td><span id="actual_bulk_cut_date_row_'+(key+1)+'">'+$('input[name=actual_bulk_cut_date]').val()+'</span><input type="hidden" name="actual_bulk_cut_date[]" id="actual_bulk_cut_date_'+(key+1)+'" value="'+$('input[name=actual_bulk_cut_date]').val()+'"></td>' +

                '<td><span id="sewing_start_row_'+(key+1)+'">'+$('input[name=sewing_start]').val()+'</span><input type="hidden" name="sewing_start[]" id="sewing_start_'+(key+1)+'" value="'+$('input[name=sewing_start]').val()+'"></td>' +


                 '<td><span id="actual_sewing_start_row_'+(key+1)+'">'+$('input[name=actual_sewing_start]').val()+'</span><input type="hidden" name="actual_sewing_start[]" id="actual_sewing_start_'+(key+1)+'" value="'+$('input[name=actual_sewing_start]').val()+'"></td>' +

                '<td><span id="sewing_finish_row_'+(key+1)+'">'+$('input[name=sewing_finish]').val()+'</span><input type="hidden" name="sewing_finish[]" id="sewing_finish_'+(key+1)+'" value="'+$('input[name=sewing_finish]').val()+'"></td>' +

                '<td><span id="actual_sewing_finish_row_'+(key+1)+'">'+$('input[name=actual_sewing_finish]').val()+'</span><input type="hidden" name="actual_sewing_finish[]" id="actual_sewing_finish_'+(key+1)+'" value="'+$('input[name=actual_sewing_finish]').val()+'"></td>' +

                '<td><span id="washing_date_row_'+(key+1)+'">'+$('input[name=washing_date]').val()+'</span><input type="hidden" name="washing_date[]" id="washing_date_'+(key+1)+'" value="'+$('input[name=washing_date]').val()+'"></td>' +

                '<td><span id="actual_washing_date_row_'+(key+1)+'">'+$('input[name=actual_washing_date]').val()+'</span><input type="hidden" name="actual_washing_date[]" id="actual_washing_date_'+(key+1)+'" value="'+$('input[name=actual_washing_date]').val()+'"></td>' +

                '<td><span id="finishing_packing_row_'+(key+1)+'">'+$('input[name=finishing_packing]').val()+'</span><input type="hidden" name="finishing_packing[]" id="finishing_packing_'+(key+1)+'" value="'+$('input[name=finishing_packing]').val()+'"></td>' +

                '<td><span id="actual_finishing_packing_row_'+(key+1)+'">'+$('input[name=actual_finishing_packing]').val()+'</span><input type="hidden" name="actual_finishing_packing[]" id="actual_finishing_packing_'+(key+1)+'" value="'+$('input[name=actual_finishing_packing]').val()+'"></td>' +

                '<td><span id="final_inspection_row_'+(key+1)+'">'+$('input[name=final_inspection]').val()+'</span><input type="hidden" name="final_inspection[]" id="final_inspection_'+(key+1)+'" value="'+$('input[name=final_inspection]').val()+'"></td>' +

                 '<td><span id="actual_final_inspection_row_'+(key+1)+'">'+$('input[name=actual_final_inspection]').val()+'</span><input type="hidden" name="actual_final_inspection[]" id="actual_final_inspection_'+(key+1)+'" value="'+$('input[name=actual_final_inspection]').val()+'"></td>' +

                '<td><span id="ex_factory_row_'+(key+1)+'">'+$('input[name=ex_factory]').val()+'</span><input type="hidden" name="ex_factory[]" id="ex_factory_'+(key+1)+'" value="'+$('input[name=ex_factory]').val()+'"></td>' +

                 '<td><span id="actual_ex_factory_row_'+(key+1)+'">'+$('input[name=actual_ex_factory]').val()+'</span><input type="hidden" name="actual_ex_factory[]" id="actual_ex_factory_'+(key+1)+'" value="'+$('input[name=actual_ex_factory]').val()+'"></td>' +

                '<td><span id="remarks_row_'+(key+1)+'">'+$('input[name=remarks]').val()+'</span><input type="hidden" name="remarks[]" id="remarks_'+(key+1)+'" value="'+$('input[name=remarks]').val()+'"></td>' +
                '</tr>';
            $("#table").append(row);
            $('#form').trigger("reset");
        }

        function removeRow(key){
            $('#pre_production_'+key).remove();
        }
        function editRow(key){
            var color_name = $('#color_name_'+key).val();
            var size_ready_date = $('#size_ready_date_'+key).val();
            var pp_meeting_date = $('#pp_meeting_date_'+key).val();
            var bulk_cut_date = $('#bulk_cut_date_'+key).val();
            var sewing_start = $('#sewing_start_'+key).val();
            var sewing_finish = $('#sewing_finish_'+key).val();
            var washing_date = $('#washing_date_'+key).val();
            var finishing_packing = $('#finishing_packing_'+key).val();
            var final_inspection = $('#final_inspection_'+key).val();
            var ex_factory = $('#ex_factory_'+key).val();

            var actual_size_ready_date = $('#actual_size_ready_date_'+key).val();
            var actual_pp_meeting_date = $('#actual_pp_meeting_date_'+key).val();
            var actual_bulk_cut_date = $('#actual_bulk_cut_date_'+key).val();
            var actual_sewing_start = $('#actual_sewing_start_'+key).val();
            var actual_sewing_finish = $('#actual_sewing_finish_'+key).val();
            var actual_washing_date = $('#actual_washing_date_'+key).val();
            var actual_finishing_packing = $('#actual_finishing_packing_'+key).val();
            var actual_final_inspection = $('#actual_final_inspection_'+key).val();
            var actual_ex_factory = $('#actual_ex_factory_'+key).val();

            var remarks = $('#remarks_'+key).val();
            
            $.alert({
                 title: 'Edit ACC T&A',
                 content: "url:{{url('actionPlan/pre_production/edit/')}}/"+color_name +'&'+size_ready_date +'&'+pp_meeting_date +'&'+bulk_cut_date +'&'+sewing_start+'&'+sewing_finish +'&'+washing_date +'&'+finishing_packing +'&'+final_inspection +'&'+ex_factory  +'&'+actual_size_ready_date +'&'+actual_pp_meeting_date +'&'+actual_bulk_cut_date +'&'+actual_sewing_start+'&'+actual_sewing_finish +'&'+actual_washing_date +'&'+actual_finishing_packing +'&'+actual_final_inspection +'&'+actual_ex_factory+'&'+remarks,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                         //all plan dates
                         $('#color_name_row_'+key).html($('#color_name_edit').val());
                         $('#size_ready_date_row_'+key).html($('#size_ready_date_edit').val());
                         $('#pp_meeting_date_row_'+key).html($('#pp_meeting_date_edit').val());
                         $('#bulk_cut_date_row_'+key).html($('#bulk_cut_date_edit').val());
                         $('#sewing_start_row_'+key).html($('#sewing_start_edit').val());
                         $('#sewing_finish_row_'+key).html($('#sewing_finish_edit').val());
                         $('#washing_date_row_'+key).html($('#washing_date_edit').val());
                         $('#finishing_packing_row_'+key).html($('#finishing_packing_edit').val());
                         $('#final_inspection_row_'+key).html($('#final_inspection_edit').val());
                         $('#ex_factory_row_'+key).html($('#ex_factory_edit').val());
                         $('#remarks_row_'+key).html($('#remarks_edit').val());

                         
                         $('#color_name_'+key).val($('#color_name_edit').val());
                         $('#size_ready_date_'+key).val($('#size_ready_date_edit').val());
                         $('#pp_meeting_date_'+key).val($('#pp_meeting_date_edit').val());
                         $('#bulk_cut_date_'+key).val($('#bulk_cut_date_edit').val());
                         $('#sewing_start_'+key).val($('#sewing_start_edit').val());
                         $('#sewing_finish_'+key).val($('#sewing_finish_edit').val());
                         $('#washing_date_'+key).val($('#washing_date_edit').val());
                         $('#finishing_packing_'+key).val($('#finishing_packing_edit').val());
                         $('#final_inspection_'+key).val($('#final_inspection_edit').val());
                         $('#ex_factory_'+key).val($('#ex_factory_edit').val());
                         $('#remarks_'+key).val($('#remarks_edit').val());


                         //all actual dates
                         $('#actual_size_ready_date_row_'+key).html($('#actual_size_ready_date_edit').val());
                         $('#actual_pp_meeting_date_row_'+key).html($('#actual_pp_meeting_date_edit').val());
                         $('#actual_bulk_cut_date_row_'+key).html($('#actual_bulk_cut_date_edit').val());
                         $('#actual_sewing_start_row_'+key).html($('#actual_sewing_start_edit').val());
                         $('#actual_sewing_finish_row_'+key).html($('#actual_sewing_finish_edit').val());
                         $('#actual_washing_date_row_'+key).html($('#actual_washing_date_edit').val());
                         $('#actual_finishing_packing_row_'+key).html($('#actual_finishing_packing_edit').val());
                         $('#actual_final_inspection_row_'+key).html($('#actual_final_inspection_edit').val());
                         $('#actual_ex_factory_row_'+key).html($('#actual_ex_factory_edit').val());

                         
                         $('#actual_color_name_'+key).val($('#actual_color_name_edit').val());
                         $('#actual_size_ready_date_'+key).val($('#actual_size_ready_date_edit').val());
                         $('#actual_pp_meeting_date_'+key).val($('#actual_pp_meeting_date_edit').val());
                         $('#actual_bulk_cut_date_'+key).val($('#actual_bulk_cut_date_edit').val());
                         $('#actual_sewing_start_'+key).val($('#actual_sewing_start_edit').val());
                         $('#actual_sewing_finish_'+key).val($('#actual_sewing_finish_edit').val());
                         $('#actual_washing_date_'+key).val($('#actual_washing_date_edit').val());
                         $('#actual_finishing_packing_'+key).val($('#actual_finishing_packing_edit').val());
                         $('#actual_final_inspection_'+key).val($('#actual_final_inspection_edit').val());
                         $('#actual_ex_factory_'+key).val($('#actual_ex_factory_edit').val());

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