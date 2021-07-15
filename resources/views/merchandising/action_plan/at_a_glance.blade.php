@extends('layouts.fixed')
{{--costing chart bill for product cost sheet--}}
@section('title','At A Glance')
<style>
    .sig-hr{
        font-size: 6px;
        font-weight: 600;
        padding: 5px;
        width: 280px;
        border-top: 2px dotted #01005b;
    }

    table, tr, td{
        padding: 1px !important;
    }
    table, tr, th{
        padding: 1px !important;
    }

    @media print {
        @page {
            size: A4 landscape;
            padding: 0 !important;
            margin: 0 !important;
        }
        body {
            background-color: white !important;
        }
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header no-print">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-center">
                    {{--<h3>Section Wise Attendance Report</h3>--}}
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Costing Chart Bill</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    {{--start search --}}
    <section class="content no-print">
        <div class="container-fluid">
            {{--start --}}
            <div class="col-lg-12 col-sm-8 col-md-6 col-xs-12">
                @if($errors->any())
                    <div class="col-md-12 alert alert-danger emptyMsg">
                        <h6>{{$errors->first(1)}}</h6>
                    </div>
                @endif
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="form-row">
                            <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                                <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                                <button id="cmd" class="btn btn-primary" data-toggle="tab">Pdf</button>
                                <a href="https://www.gmail.com" target="_blank" class="btn btn-warning">E-mail</a>
                                <button onclick="exportTableToExcel('datatable_buttons')" class="btn btn-secondary">Excel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>{{--end --}}
    </section>
    <!-- /.content -->
    {{--end search --}}

    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                {{--<h2>Hello</h2>--}}
                <div class="card-body">
                    <div class="row ">
                            {{-- <div class="col-md-4 text-left">

                            </div>
                            <div class="col-md-4 text-center">
                                
                            </div>
                            <br>
                            <br> --}}
                           {{--  <div class="col-md-4 text-right" style="margin: 14px -10px;">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->front_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->back_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                            </div> --}}
                        @if(isset($order_summary->id))
                        <div class="col-lg-12 header" style="border-top: 2px solid #636363">

                            <table  style="font-size: 9px !important"  id="datatable_buttons" class="table table-hover table-bordered dt-responsive nowrap">
                                <tr>
                                    <th colspan="8" class="text-center"> <h5>PRODUCT TIME AND ACTION PLAN</h5> </th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">Input Date</th>
                                    <th colspan="5" class="text-center">{{ $order_summary->input_date }}</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">Merchant Date</th>
                                    <th colspan="5" class="text-center">{{ $order_summary->merchant_team }}</th>
                                </tr>
                                {{-- <tr>
                                    <td colspan="2" class="text-center"> {{ $order_summary->id }}
                                    </td>
                                    <td colspan="3" class="text-center">{{ $order_summary->input_date }}</td>
                                    <td colspan="3" class="text-center">{{ $order_summary->merchant_team }}</td>
                                </tr> --}}
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}
                                <tr>
                                    <th style="background-color: yellow" colspan="8" class="text-center">Order Summary</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Buyer Name </th>
                                    <td colspan="5" class="text-center"> {{ optional($order_summary->buyer)->name }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Factory </th>
                                    <td colspan="5" class="text-center"> {{ optional($order_summary->unit)->name }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Buyer Payment Terms </th>
                                    <td colspan="5" class="text-center"> {{ optional($order_summary->payment)->name }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Product Picture </th>
                                    <td colspan="5" class="text-center"> </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Item Name </th>
                                    <td colspan="5" class="text-center"> {{ $order_summary->item }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Style Name </th>
                                    <td colspan="5" class="text-center"> {{ optional($order_summary->style)->style }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Spec Group </th>
                                    <td colspan="5" class="text-center"> {{ $order_summary->spec_group }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Size Range </th>
                                    <td colspan="5" class="text-center"> {{ $order_summary->size_range }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Order Confirmation Date </th>
                                    <td colspan="5" class="text-center"> {{ $order_summary->confirmation_date }} </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> PO Issue Date </th>
                                    <td colspan="5" class="text-center"> {{ $order_summary->po_issue_date }} </td>
                                </tr><tr>
                                    <th colspan="3" class="text-center">LC/Sales Contract Received Date </th>
                                    <td colspan="5" class="text-center">{{ $order_summary->lc_contract_rcv_date }}</td>
                                </tr>
                                
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}
                                <tr>
                                </tr>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center"> Garmets Color Name </th>
                                    <th colspan="2" class="text-center"> Budget Approved FOB Price (Pcs) </th>
                                    <th class="text-center"> Budget Approved CM Price  (Pcs) </th>
                                    <th class="text-center"> Quantity (Pcs) </th>
                                    <th colspan="2" class="text-center"> Garments Ship Date (Ex. Factory) </th>
                                </tr>
                                @if(isset($order_summary->details[0]->id))
                                @foreach($order_summary->details as $detailKey => $detail)
                                <tr>
                                    <td class="text-center"> {{ $detailKey + 1 }} </td>
                                    <td class="text-center"> {{ $detail->color_name }} </td>
                                    <td colspan="2" class="text-center"> {{ $detail->fob_price_pcs }} </td>
                                    <td class="text-center"> {{ $detail->cm_price_pcs }} </td>
                                    <td class="text-center"> {{ $detail->quantity_pcs }}</td>
                                    <td colspan="2" class="text-center"> {{ $detail->ship_date }} </td>
                                </tr>
                                @endforeach
                                @endif
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}
                                <tr>
                                    <th style="background-color: yellow" colspan="8" class="text-center">Sample T&A</th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-center"> Color Name </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->color_name }} 
                                        @endif
                                    </td>
                                    @endfor
                                    
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 1St Fit Submission Date  </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->first_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_first_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">2nd Fit Submission Date  </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->second_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_second_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 3rd Fit Submission Date  </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->third_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_third_fit_submission }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Fit Approved Comments Received Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->fit_approved_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_fit_approved_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">  1st Wash Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->first_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_first_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 2nd Wash Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->second_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_second_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 3rd Wash Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->third_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_third_wash_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">  Wash Approved Comments Received Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->wash_app_comm_rcv_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_wash_app_comm_rcv_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr><tr>
                                    <th rowspan="2" colspan="2" class="text-center">  Size set Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->size_set_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_size_set_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Size set Approved Comments Received Date</th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->size_set_rcv_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_size_set_rcv_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 1st P.P Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->first_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_first_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 2nd P.P Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->second_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_second_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> 3rd P.P Submission Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->third_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_third_pp_sub_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> P.P Approved Comments Received Date </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->pp_approved_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->sample_tna[$i]->id)) 
                                            {{ $order_summary->sample_tna[$i]->actual_pp_approved_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                
                                
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}
                                {{-- dynamic --}}
                                <tr>
                                    <th style="background-color: yellow" colspan="8" class="text-center">Fabric T&A</th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-center"> Color Name </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->color_name }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Shell Febric </th>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"> </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Booking Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->shell_booking_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Plan Inhouse Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->shell_plan_inhouse_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Actual Inhouse Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->shell_actual_inhouse_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Country Origin </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->shell_origin_country }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Approved Supplier Name </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->shell_app_supplier_name }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Trims Fabric </th>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"> </td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"> </td>
                                </tr>
                               <tr>
                                    <th colspan="3" class="text-center"> Booking Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->trims_booking_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Plan Inhouse Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->trims_plan_inhouse_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Actual Inhouse Date </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->trims_actual_inhouse_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Country Origin </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->trims_origin_country }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Approved Supplier Name </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->fabrics_tna[$i]->id)) 
                                            {{ $order_summary->fabrics_tna[$i]->trims_app_supplier_name }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}
                                <tr>
                                    <th style="background-color: yellow" colspan="8" class="text-center">All Accessories T&A</th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-center">Item Name</th>
                                    <td  class="text-center"> Booking Date </td>
                                    <td  class="text-center"> Plan Inhouse </td>
                                    <td  class="text-center"> Actual Inhouse Date </td>
                                    <td  class="text-center"> Country Origin </td>
                                    <td  class="text-center"> Approved Supplier Name</td>
                                </tr>
                                @php 
                                $items = itemNames();
                                @endphp
                                @if(isset($order_summary->all_acc_tna[0]->id))
                                @foreach($order_summary->all_acc_tna as $item)
                                <tr>
                                    <th colspan="3" class="text-center"> {{ $item->item_name }} </th>
                                    <td  class="text-center"> {{ $item->booking_date }}</td>
                                    <td  class="text-center"> {{ $item->plan_inhouse_date }}</td>
                                    <td  class="text-center"> {{ $item->actual_inhouse_date }}</td>
                                    <td  class="text-center"> {{ $item->org_country }}</td>
                                    <td  class="text-center"> {{ $item->supplier_name }}</td>
                                </tr>
                                @endforeach
                                @endif
                               {{--  <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr> --}}

                                <tr>
                                    <th style="background-color: yellow" colspan="8" class="text-center">Pre Production Activities</th>
                                </tr>

                                 <tr>
                                    <th colspan="3" class="text-center"> Color Name </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->color_name }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Production Size Set Ready Date  </th>
                                    <td  class="text-center"> Plan  </td>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->size_ready_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_size_ready_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">P.P Meeting Date  </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->pp_meeting_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_pp_meeting_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Bulk Cutting Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->bulk_cut_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_bulk_cut_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Sewing Start Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->sewing_start }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_sewing_start }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">  Sewing Finish Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->sewing_finish }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_sewing_finish }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Wash Complete Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->washing_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_washing_date }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center"> Finishing & Packing Complete Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->finishing_packing }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_finishing_packing }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th rowspan="2" colspan="2" class="text-center">  Final Inspection Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->final_inspection }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_final_inspection }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr><tr>
                                    <th rowspan="2" colspan="2" class="text-center">  Ex. Factory Date </th>
                                    <td  class="text-center"> Plan  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->ex_factory }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td  class="text-center"> Actual  </td>
                                     @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->actual_ex_factory }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th  colspan="3" class="text-center"> Remarks </th>
                                    @for($i = 0; $i< 5; $i++)
                                    <td  class="text-center"> 
                                        @if(isset($order_summary->pre_production[$i]->id)) 
                                            {{ $order_summary->pre_production[$i]->remarks }} 
                                        @endif
                                    </td>
                                    @endfor
                                </tr>
                                    
                            </table>
                        </div>
                        @else
                        <h1>Sorry, you have no orders !</h1>
                        @endif

                    </div>
                    <div class="row" style="margin-top: 25px">
                        <div class="col-md-6">
                            <div class="sig-hr">
                                <p>Signed & Confirmed <span></span></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="sig-hr">
                                <p style="text-align:center;">Date</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{--<table id="datatable-buttons" class="table table-border">--}}
                            {{--<thead>--}}

                            {{--</thead>--}}
                        {{--</table>--}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <!-- page script -->
    {{--for pdf starts here--}}
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/jspdf.debug.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/mitubachi-normal.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/faker.min.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/examples.js"></script>
    {{--for pdf ends here--}}


    {{--for xl strats here--}}
    <script src="{{ asset('dist/js/xlsx.full.min.js') }}"></script>
    {{--<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.0/xlsx.full.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.1/xlsx.min.js"></script>--}}
    {{--for xl ends here--}}

    <script type="text/javascript">
        $(document).ready(function() {

            $('#cmd').click(function () {
                var doc = new jsPDF();
                var date = new Date();
                doc.text(90, 10, 'Cost Breakdown');
                doc.autoTable({html: '#datatable_buttons',
                    theme : 'striped',
                    styles: {fontSize: 7}
                });
                doc.save('.Cost_Breakdown');
            });
        });
    </script>

    {{--<script>--}}

        {{--$(document).ready(function() {--}}
{{--//            var wb =XLSX.utils.book_new();--}}
{{--//            wb.SheetNames.push("Test Sheet");--}}
{{--//            var ws_data = [['Hello' , 'World']];--}}
{{--//            var ws = XLSX.utils.aoa_to_sheet(ws_data);--}}
{{--//            wb.Sheets["Test Sheet"] = ws;--}}

            {{--var ws2 =XLSX.utils.table_to_sheet(document.getElementById('datatable-buttons'));--}}
{{--//            wb.SheetNames.push("Test Sheet2");--}}
{{--//            wb.Sheets["Test Sheet2"] = ws2;--}}

            {{--var wbout = XLSX.write(ws2,{booktype:'xlsx',bookSST:true,type:'binary'});--}}

            {{--function s2ab(s){--}}
                {{--var buf = new ArrayBuffer(s.length);--}}
                {{--var view = new Uint8Array(buf);--}}
                {{--for (var i=0;i<s.length;i++) view[i] = s.charCodeAt(i) & 0xFF;--}}
                {{--return buf;--}}
            {{--}--}}

            {{--$("#xl").click(function(){--}}
                {{--saveAs(new Bolb([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');--}}
            {{--});--}}
        {{--});--}}

    {{--</script>--}}
    <script>
        function exportTableToExcel(datatable_buttons,test){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(datatable_buttons);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
            test1 = test?test+'.xls':'Cost_Breakdown.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, test1);
        }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = test1;

        //triggering the function
        downloadLink.click();
        }
        }
    </script>
@stop

