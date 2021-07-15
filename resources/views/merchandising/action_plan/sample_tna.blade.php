@extends('layouts.fixed')

@section('title','WELL-GROUP | Sample T&A')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Sample T&A</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Sample T&A</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Merchandise\ActionPlanController@sample_tna_store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
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
                                        {{-- {{ Form::select('order_style',$order_summary_nos->id,null, ['class'=>'form-control ','placeholder'=>'Select Order Summary:', 'required']) }} --}}
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
                                <h2 style="color: white;text-align: center;background-color: #138496;padding: 4px">Sample T&A</h2>
                            </div>
                            <br>
                            <div class="row" style="padding-bottom: 20px; ">
                                <div class="col-lg-12 card" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-3">
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
                                                $sampla_tnas = SampleTNAs();

                                            @endphp
                                            @foreach($sampla_tnas as $sampleKey => $tna)
                                            <tr>
                                                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                                                <td style="padding: 3px !important" class="text-center">
                                                    <input type="date" class="form-control" name="{{ $sampleKey }}" id="{{ $sampleKey }}">
                                                </td>
                                                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $sampleKey }}" id="actual_{{ $sampleKey }}"></td>
                                            </tr>
                                            @endforeach
                                        </table>
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
                                        <th colspan="2">1ST FIT SUBMISSION DATE</th>
                                        <th colspan="2">2ND FIT SUBMISSION DATE</th>
                                        <th colspan="2">3RD FIT SUBMISSION DATE</th>
                                        <th colspan="2">FIT APPROVED COMMENTS RECEIVE DATE</th>
                                        <th colspan="2">1ST WASH SUBMISSION DATE</th>
                                        <th colspan="2">2ND WASH SUBMISSION DATE</th>
                                        <th colspan="2">3RD WASH SUBMISSION DATE</th>
                                        <th colspan="2">WASH APPROVED COMMENTS RECEIVE DATE</th>
                                        <th colspan="2">SIZE SET SUBMISSION DATE</th>
                                        <th colspan="2">SIZE SET APPROVED COMMENTS RECEIVE DATE</th>
                                        <th colspan="2">1ST P.P SUBMISSION DATE</th>
                                        <th colspan="2">2ND P.P SUBMISSION DATE </th>
                                        <th colspan="2">3RD P.P SUBMISSION DATE </th>
                                        <th colspan="2">PP APPROVED COMMENTS RECEIVE DATE</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        @for($i = 0; $i < 14; $i++)
                                        <th>Plan</th>
                                        <th>Actual</th>
                                        @endfor
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

        function addToList(e){
            //e.preventDefault();
            //$("#form").submit();
            var data = $("#form").serializeArray();
            //console.log(data);
            var key = parseInt($('#tna_value').val());
            console.log(key);
//            alert('add to list');
            var row = '<tr id="sample_tna_'+(key+1)+'">' +
                '<td><i title="Edit" style="cursor:pointer" onclick="editRow('+(key+1)+')" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" style="cursor:pointer;" onclick="removeRow('+(key+1)+')" class="fa fa-trash"></i></td>' +

                '<td><span id="color_name_row_'+(key+1)+'">'+$('input[name=color_name]').val()+'</span><input type="hidden" id="color_name_'+(key+1)+'" name="color_name[]" value="'+$('input[name=color_name]').val()+'"></td>' +

                '<td><span id="first_fit_submission_row_'+(key+1)+'">'+$('input[name=first_fit_submission]').val()+'</span><input type="hidden" name="first_fit_submission[]" id="first_fit_submission_'+(key+1)+'" value="'+$('input[name=first_fit_submission]').val()+'"></td>' +

                '<td><span id="actual_first_fit_submission_row_'+(key+1)+'">'+$('input[name=actual_first_fit_submission]').val()+'</span><input type="hidden" name="actual_first_fit_submission[]" id="actual_first_fit_submission_'+(key+1)+'" value="'+$('input[name=actual_first_fit_submission]').val()+'"></td>' +


                '<td><span id="second_fit_submission_row_'+(key+1)+'">'+$('input[name=second_fit_submission]').val()+'</span><input type="hidden" name="second_fit_submission[]" id="second_fit_submission_'+(key+1)+'" value="'+$('input[name=second_fit_submission]').val()+'"></td>' +

                '<td><span id="actual_second_fit_submission_row_'+(key+1)+'">'+$('input[name=actual_second_fit_submission]').val()+'</span><input type="hidden" name="actual_second_fit_submission[]" id="actual_second_fit_submission_'+(key+1)+'" value="'+$('input[name=actual_second_fit_submission]').val()+'"></td>' +

                '<td><span id="third_fit_submission_row_'+(key+1)+'">'+$('input[name=third_fit_submission]').val()+'</span><input type="hidden" name="third_fit_submission[]" id="third_fit_submission_'+(key+1)+'" value="'+$('input[name=third_fit_submission]').val()+'"></td>' +

                '<td><span id="actual_third_fit_submission_row_'+(key+1)+'">'+$('input[name=actual_third_fit_submission]').val()+'</span><input type="hidden" name="actual_third_fit_submission[]" id="actual_third_fit_submission_'+(key+1)+'" value="'+$('input[name=actual_third_fit_submission]').val()+'"></td>' +

                '<td><span id="fit_approved_date_row_'+(key+1)+'">'+$('input[name=fit_approved_date]').val()+'</span><input type="hidden" name="fit_approved_date[]" id="fit_approved_date_'+(key+1)+'" value="'+$('input[name=fit_approved_date]').val()+'"></td>' +

                '<td><span id="actual_fit_approved_date_row_'+(key+1)+'">'+$('input[name=actual_fit_approved_date]').val()+'</span><input type="hidden" name="actual_fit_approved_date[]" id="actual_fit_approved_date_'+(key+1)+'" value="'+$('input[name=actual_fit_approved_date]').val()+'"></td>' +

                '<td><span id="first_wash_sub_date_row_'+(key+1)+'">'+$('input[name=first_wash_sub_date]').val()+'</span><input type="hidden" name="first_wash_sub_date[]" id="first_wash_sub_date_'+(key+1)+'" value="'+$('input[name=first_wash_sub_date]').val()+'"></td>' +

                '<td><span id="actual_first_wash_sub_date_row_'+(key+1)+'">'+$('input[name=actual_first_wash_sub_date]').val()+'</span><input type="hidden" name="actual_first_wash_sub_date[]" id="actual_first_wash_sub_date_'+(key+1)+'" value="'+$('input[name=actual_first_wash_sub_date]').val()+'"></td>' +

                '<td><span id="second_wash_sub_date_row_'+(key+1)+'">'+$('input[name=second_wash_sub_date]').val()+'</span><input type="hidden" name="second_wash_sub_date[]" id="second_wash_sub_date_'+(key+1)+'" value="'+$('input[name=second_wash_sub_date]').val()+'"></td>' +

                '<td><span id="actual_second_wash_sub_date_row_'+(key+1)+'">'+$('input[name=actual_second_wash_sub_date]').val()+'</span><input type="hidden" name="actual_second_wash_sub_date[]" id="actual_second_wash_sub_date_'+(key+1)+'" value="'+$('input[name=actual_second_wash_sub_date]').val()+'"></td>' +

                '<td><span id="third_wash_sub_date_row_'+(key+1)+'">'+$('input[name=third_wash_sub_date]').val()+'</span><input type="hidden" name="third_wash_sub_date[]" id="third_wash_sub_date_'+(key+1)+'" value="'+$('input[name=third_wash_sub_date]').val()+'"></td>' +

                '<td><span id="actual_third_wash_sub_date_row_'+(key+1)+'">'+$('input[name=actual_third_wash_sub_date]').val()+'</span><input type="hidden" name="actual_third_wash_sub_date[]" id="actual_third_wash_sub_date_'+(key+1)+'" value="'+$('input[name=actual_third_wash_sub_date]').val()+'"></td>' +

                '<td><span id="wash_app_comm_rcv_date_row_'+(key+1)+'">'+$('input[name=wash_app_comm_rcv_date]').val()+'</span><input type="hidden" name="wash_app_comm_rcv_date[]" id="wash_app_comm_rcv_date_'+(key+1)+'" value="'+$('input[name=wash_app_comm_rcv_date]').val()+'"></td>' +

                '<td><span id="actual_wash_app_comm_rcv_date_row_'+(key+1)+'">'+$('input[name=actual_wash_app_comm_rcv_date]').val()+'</span><input type="hidden" name="actual_wash_app_comm_rcv_date[]" id="actual_wash_app_comm_rcv_date_'+(key+1)+'" value="'+$('input[name=actual_wash_app_comm_rcv_date]').val()+'"></td>' +

                '<td><span id="size_set_sub_date_row_'+(key+1)+'">'+$('input[name=size_set_sub_date]').val()+'</span><input type="hidden" name="size_set_sub_date[]" id="size_set_sub_date_'+(key+1)+'" value="'+$('input[name=size_set_sub_date]').val()+'"></td>' +

                '<td><span id="actual_size_set_sub_date_row_'+(key+1)+'">'+$('input[name=actual_size_set_sub_date]').val()+'</span><input type="hidden" name="actual_size_set_sub_date[]" id="actual_size_set_sub_date_'+(key+1)+'" value="'+$('input[name=actual_size_set_sub_date]').val()+'"></td>' +

                '<td><span id="size_set_rcv_date_row_'+(key+1)+'">'+$('input[name=size_set_rcv_date]').val()+'</span><input type="hidden" name="size_set_rcv_date[]" id="size_set_rcv_date_'+(key+1)+'" value="'+$('input[name=size_set_rcv_date]').val()+'"></td>' +

                '<td><span id="actual_size_set_rcv_date_row_'+(key+1)+'">'+$('input[name=actual_size_set_rcv_date]').val()+'</span><input type="hidden" name="actual_size_set_rcv_date[]" id="actual_size_set_rcv_date_'+(key+1)+'" value="'+$('input[name=actual_size_set_rcv_date]').val()+'"></td>' +

                '<td><span id="first_pp_sub_date_row_'+(key+1)+'">'+$('input[name=first_pp_sub_date]').val()+'</span><input type="hidden" name="first_pp_sub_date[]" id="first_pp_sub_date_'+(key+1)+'" value="'+$('input[name=first_pp_sub_date]').val()+'"></td>' +

                '<td><span id="actual_first_pp_sub_date_row_'+(key+1)+'">'+$('input[name=actual_first_pp_sub_date]').val()+'</span><input type="hidden" name="actual_first_pp_sub_date[]" id="actual_first_pp_sub_date_'+(key+1)+'" value="'+$('input[name=actual_first_pp_sub_date]').val()+'"></td>' +

                '<td><span id="second_pp_sub_date_row_'+(key+1)+'">'+$('input[name=second_pp_sub_date]').val()+'</span><input type="hidden" name="second_pp_sub_date[]" id="second_pp_sub_date_'+(key+1)+'" value="'+$('input[name=second_pp_sub_date]').val()+'"></td>' +

                '<td><span id="actual_second_pp_sub_date_row_'+(key+1)+'">'+$('input[name=actual_second_pp_sub_date]').val()+'</span><input type="hidden" name="actual_second_pp_sub_date[]" id="actual_second_pp_sub_date_'+(key+1)+'" value="'+$('input[name=actual_second_pp_sub_date]').val()+'"></td>' +

                '<td><span id="third_pp_sub_date_row_'+(key+1)+'">'+$('input[name=third_pp_sub_date]').val()+'</span><input type="hidden" name="third_pp_sub_date[]" id="third_pp_sub_date_'+(key+1)+'" value="'+$('input[name=third_pp_sub_date]').val()+'"></td>' +

                '<td><span id="actual_third_pp_sub_date_row_'+(key+1)+'">'+$('input[name=actual_third_pp_sub_date]').val()+'</span><input type="hidden" name="actual_third_pp_sub_date[]" id="actual_third_pp_sub_date_'+(key+1)+'" value="'+$('input[name=actual_third_pp_sub_date]').val()+'"></td>' +

                '<td><span id="pp_approved_date_row_'+(key+1)+'">'+$('input[name=pp_approved_date]').val()+'</span><input type="hidden" name="pp_approved_date[]" id="pp_approved_date_'+(key+1)+'" value="'+$('input[name=pp_approved_date]').val()+'"></td>' +

                '<td><span id="actual_pp_approved_date_row_'+(key+1)+'">'+$('input[name=actual_pp_approved_date]').val()+'</span><input type="hidden" name="actual_pp_approved_date[]" id="actual_pp_approved_date_'+(key+1)+'" value="'+$('input[name=actual_pp_approved_date]').val()+'"></td>' +
                '</tr>';
            $("#table").append(row);
            $('#form').trigger("reset");
            $('#tna_value').val(key+1);
        }

        function removeRow(key){
            $('#sample_tna_'+key).remove();
        }
        function editRow(key){
            var color_name = $('#color_name_'+key).val();
            var first_fit_submission = $('#first_fit_submission_'+key).val();
            var second_fit_submission = $('#second_fit_submission_'+key).val();
            var third_fit_submission = $('#third_fit_submission_'+key).val();
            var fit_approved_date = $('#fit_approved_date_'+key).val();
            var first_wash_sub_date = $('#first_wash_sub_date_'+key).val();
            var second_wash_sub_date = $('#second_wash_sub_date_'+key).val();
            var third_wash_sub_date = $('#third_wash_sub_date_'+key).val();
            var wash_app_comm_rcv_date = $('#wash_app_comm_rcv_date_'+key).val();
            var size_set_sub_date = $('#size_set_sub_date_'+key).val();
            var size_set_rcv_date = $('#size_set_rcv_date_'+key).val();
            var first_pp_sub_date = $('#first_pp_sub_date_'+key).val();
            var second_pp_sub_date = $('#second_pp_sub_date_'+key).val();
            var third_pp_sub_date = $('#third_pp_sub_date_'+key).val();
            var pp_approved_date = $('#pp_approved_date_'+key).val();

            var actual_first_fit_submission = $('#actual_first_fit_submission_'+key).val();
            var actual_second_fit_submission = $('#actual_second_fit_submission_'+key).val();
            var actual_third_fit_submission = $('#actual_third_fit_submission_'+key).val();
            var actual_fit_approved_date = $('#actual_fit_approved_date_'+key).val();
            var actual_first_wash_sub_date = $('#actual_first_wash_sub_date_'+key).val();
            var actual_second_wash_sub_date = $('#actual_second_wash_sub_date_'+key).val();
            var actual_third_wash_sub_date = $('#actual_third_wash_sub_date_'+key).val();
            var actual_wash_app_comm_rcv_date = $('#actual_wash_app_comm_rcv_date_'+key).val();
            var actual_size_set_sub_date = $('#actual_size_set_sub_date_'+key).val();
            var actual_size_set_rcv_date = $('#actual_size_set_rcv_date_'+key).val();
            var actual_first_pp_sub_date = $('#actual_first_pp_sub_date_'+key).val();
            var actual_second_pp_sub_date = $('#actual_second_pp_sub_date_'+key).val();
            var actual_third_pp_sub_date = $('#actual_third_pp_sub_date_'+key).val();
            var actual_pp_approved_date = $('#actual_pp_approved_date_'+key).val();
            
            $.alert({
                 title: 'Edit Sample T&A',
                 content: "url:{{url('actionPlan/sample_tna/edit/')}}/"+color_name +'&'+first_fit_submission +'&'+second_fit_submission +'&'+third_fit_submission +'&'+fit_approved_date +'&'+first_wash_sub_date +'&'+second_wash_sub_date +'&'+third_wash_sub_date +'&'+wash_app_comm_rcv_date +'&'+size_set_sub_date +'&'+size_set_rcv_date +'&'+first_pp_sub_date +'&'+second_pp_sub_date +'&'+third_pp_sub_date +'&'+pp_approved_date+'&'+actual_first_fit_submission +'&'+actual_second_fit_submission +'&'+actual_third_fit_submission +'&'+actual_fit_approved_date +'&'+actual_first_wash_sub_date +'&'+actual_second_wash_sub_date +'&'+actual_third_wash_sub_date +'&'+actual_wash_app_comm_rcv_date +'&'+actual_size_set_sub_date +'&'+actual_size_set_rcv_date +'&'+actual_first_pp_sub_date +'&'+actual_second_pp_sub_date +'&'+actual_third_pp_sub_date +'&'+actual_pp_approved_date,
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-10 col-md-offset-1",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        console.log($('#wash_app_comm_rcv_date_edit').val());
                         $('#color_name_row_'+key).html($('#color_name_edit').val());
                         $('#first_fit_submission_row_'+key).html($('#first_fit_submission_edit').val());
                         $('#second_fit_submission_row_'+key).html($('#second_fit_submission_edit').val());
                         $('#third_fit_submission_row_'+key).html($('#third_fit_submission_edit').val());
                         $('#fit_approved_date_row_'+key).html($('#fit_approved_date_edit').val());
                         $('#first_wash_sub_date_row_'+key).html($('#first_wash_sub_date_edit').val());
                         $('#second_wash_sub_date_row_'+key).html($('#second_wash_sub_date_edit').val());
                         $('#third_wash_sub_date_row_'+key).html($('#third_wash_sub_date_edit').val());
                         $('#wash_app_comm_rcv_date_row_'+key).html($('#wash_app_comm_rcv_date_edit').val());
                         $('#size_set_sub_date_row_'+key).html($('#size_set_sub_date_edit').val());
                         $('#size_set_rcv_date_row_'+key).html($('#size_set_rcv_date_edit').val());
                         $('#first_pp_sub_date_row_'+key).html($('#first_pp_sub_date_edit').val());
                         $('#second_pp_sub_date_row_'+key).html($('#second_pp_sub_date_edit').val());
                         $('#third_pp_sub_date_row_'+key).html($('#third_pp_sub_date_edit').val());
                         $('#pp_approved_date_row_'+key).html($('#pp_approved_date_edit').val());

                         $('#color_name_'+key).val($('#color_name_edit').val());
                         $('#first_fit_submission_'+key).val($('#first_fit_submission_edit').val());
                         $('#second_fit_submission_'+key).val($('#second_fit_submission_edit').val());
                         $('#third_fit_submission_'+key).val($('#third_fit_submission_edit').val());
                         $('#fit_approved_date_'+key).val($('#fit_approved_date_edit').val());
                         $('#first_wash_sub_date_'+key).val($('#first_wash_sub_date_edit').val());
                         $('#second_wash_sub_date_'+key).val($('#second_wash_sub_date_edit').val());
                         $('#third_wash_sub_date_'+key).val($('#third_wash_sub_date_edit').val());
                         $('#wash_app_comm_rcv_date_'+key).val($('#wash_app_comm_rcv_date_edit').val());
                         $('#size_set_sub_date_'+key).val($('#size_set_sub_date_edit').val());
                         $('#size_set_rcv_date_'+key).val($('#size_set_rcv_date_edit').val());
                         $('#first_pp_sub_date_'+key).val($('#first_pp_sub_date_edit').val());
                         $('#second_pp_sub_date_'+key).val($('#second_pp_sub_date_edit').val());
                         $('#third_pp_sub_date_'+key).val($('#third_pp_sub_date_edit').val());
                         $('#pp_approved_date_'+key).val($('#pp_approved_date_edit').val());


                         $('#actual_first_fit_submission_row_'+key).html($('#actual_first_fit_submission_edit').val());
                         $('#actual_second_fit_submission_row_'+key).html($('#actual_second_fit_submission_edit').val());
                         $('#actual_third_fit_submission_row_'+key).html($('#actual_third_fit_submission_edit').val());
                         $('#actual_fit_approved_date_row_'+key).html($('#actual_fit_approved_date_edit').val());
                         $('#actual_first_wash_sub_date_row_'+key).html($('#actual_first_wash_sub_date_edit').val());
                         $('#actual_second_wash_sub_date_row_'+key).html($('#actual_second_wash_sub_date_edit').val());
                         $('#actual_third_wash_sub_date_row_'+key).html($('#actual_third_wash_sub_date_edit').val());
                         $('#actual_wash_app_comm_rcv_date_row_'+key).html($('#actual_wash_app_comm_rcv_date_edit').val());
                         $('#actual_size_set_sub_date_row_'+key).html($('#actual_size_set_sub_date_edit').val());
                         $('#actual_size_set_rcv_date_row_'+key).html($('#actual_size_set_rcv_date_edit').val());
                         $('#actual_first_pp_sub_date_row_'+key).html($('#actual_first_pp_sub_date_edit').val());
                         $('#actual_second_pp_sub_date_row_'+key).html($('#actual_second_pp_sub_date_edit').val());
                         $('#actual_third_pp_sub_date_row_'+key).html($('#actual_third_pp_sub_date_edit').val());
                         $('#actual_pp_approved_date_row_'+key).html($('#actual_pp_approved_date_edit').val());

                         $('#actual_first_fit_submission_'+key).val($('#actual_first_fit_submission_edit').val());
                         $('#actual_second_fit_submission_'+key).val($('#actual_second_fit_submission_edit').val());
                         $('#actual_third_fit_submission_'+key).val($('#actual_third_fit_submission_edit').val());
                         $('#actual_fit_approved_date_'+key).val($('#actual_fit_approved_date_edit').val());
                         $('#actual_first_wash_sub_date_'+key).val($('#actual_first_wash_sub_date_edit').val());
                         $('#actual_second_wash_sub_date_'+key).val($('#actual_second_wash_sub_date_edit').val());
                         $('#actual_third_wash_sub_date_'+key).val($('#actual_third_wash_sub_date_edit').val());
                         $('#actual_wash_app_comm_rcv_date_'+key).val($('#actual_wash_app_comm_rcv_date_edit').val());
                         $('#actual_size_set_sub_date_'+key).val($('#actual_size_set_sub_date_edit').val());
                         $('#actual_size_set_rcv_date_'+key).val($('#actual_size_set_rcv_date_edit').val());
                         $('#actual_first_pp_sub_date_'+key).val($('#actual_first_pp_sub_date_edit').val());
                         $('#actual_second_pp_sub_date_'+key).val($('#actual_second_pp_sub_date_edit').val());
                         $('#actual_third_pp_sub_date_'+key).val($('#actual_third_pp_sub_date_edit').val());
                         $('#actual_pp_approved_date_'+key).val($('#actual_pp_approved_date_edit').val());

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