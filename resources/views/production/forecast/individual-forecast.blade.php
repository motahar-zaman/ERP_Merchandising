@extends('report.index')

@section('title')
Forcast Report
@endsection

@section('report_title')
Forcast Report
@endsection

@section('by')
Who prepared this
@endsection

@section('content')
<style type="text/css">
  .invoice {
    border-right: 1px solid #2e2d2d;
    border-bottom: 1px solid #2e2d2d;
    padding: 3px;
  }
  .th{
      border-bottom: 1px solid #2e2d2d;border-right: 1px solid #2e2d2d;
  }
</style>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
    <div id="logo" style="float:left;">
      <img src="{{ asset('logo.png') }}" alt="Well Group" height="40" style="border-style: none;">
    </div>
    <div style="margin-left: -20%;float: center !important">
      <center>
        <span style="font-size: 30px"><strong>{{ $factories[$forecast->factory_id] }}</strong></span>
        <br>
        <span style="font-size: 15px">Daily Production Report</span>
        {{-- <h1 style="margin-left: 10%">{{ unit_name() ?? app_info()->company_name }}</h1>
        <h2>Purchase Requistion Form</h2> --}}
      </center>
    </div>
    <br>
    {{-- <div style="margin-bottom: 5px;font-size: 16px;float: left">
      <strong>
          Requisition No : {{ $requisition->requisition_id }}
      </strong>
    </div>
    <div style="margin-bottom: 5px;font-size: 16px;float: right">
      <strong>
          Requisition Date : {{ dateFormat($requisition->created_at) }}
      </strong>
    </div> --}}
<table class="table" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">

    <thead>
        <tr style="font-size: 8px;height: 30px; background-color: #e3e1dc;" class="text-center">
            <th class="td" colspan="6"></th>
            <th class="td" style="text-align: center;" colspan="4">{{ $forecast ? date('d-M',strtotime($forecast->production_date)) : '' }}</th>
            <th class="td"></th>
            <th class="td" style="text-align: center;" colspan="2">Target</th>
            <th class="td" style="text-align: center;">{{ $past_forcast ? date('d-M',strtotime($past_forcast->production_date)) : '' }}</th>
            <th class="td" style="text-align: center;" colspan="3">Last Day{{--  ({{ $forecast ? date('d-M',strtotime($forecast->production_date)) : '' }}) --}}</th>
            <th class="td" colspan="14"></th>
            <th class="td" style="text-align: center;" colspan="2">{{ date('d-M',strtotime($forecast->production_date)) }}</th>
            <th class="td" style="text-align: center;" colspan="2">{{ $forecast ? date('d-M',strtotime($forecast->production_date)) : '' }}</th>
            <th class="td" colspan="2"></th>
        </tr>
        <tr style="font-size: 8px;height: 30px; background-color: #e3e1dc;" class="text-center">
            <th class="td">Floor</th>
            <th class="td">Line No</th>
            <th class="td">Buyer</th>
            <th class="td">Item</th>
            <th class="td">Style</th>
            <th class="td">SMV</th>
            <th class="td"><span>OP Present</span></th>
            <th class="td">HP Present</th>
            <th class="td">Total MP</th>
            <th class="td">Running M/C</th>
            <th class="td">Prod Days</th>
            <th class="td">({{ date('d-M',strtotime($forecast->target_date)) }})</th>
            <th class="td">Hours</th>
            <th class="td">Output</th>
            <th class="td">Target</th>
            <th class="td">Output</th>
            <th class="td">Hours</th>
            @foreach(forecastOptions() as $forcastKey => $forecast_option)
                @if(!in_array($forcastKey, ['qty','alloc_qty','npt_details','reason_for_less_production','style_cm','plan_cm','cm_erned','cm_short']))
                <th class="td">{{ $forecast_option }}</th>
                @endif
            @endforeach
      </tr>
    </thead>
    <tbody style="font-size: 8px">
        @php
            $total_forecast = count($forecast->details);
            $overall_op_present = 0;
            $overall_hp_present = 0;
            $overall_total_mp = 0;
            $overall_running_mc = 0;
            $overall_prod = 0;
            $overall_target = 0;
            $overall_output = 0;
            $overall_last_day_target = 0;
            $overall_last_day_hours = 0;
            $overall_last_day_output = 0;
            $overall_varience = 0;
            $overall_achieve = 0;
            $overall_pcs_per_machine = 0;
            $overall_wash_send= 0;
            $overall_input_target = 0;
            $overall_today_input = 0;
            $overall_new_style_input = 0;
            $overall_total_input = 0;
            $overall_total_output = 0;
            $overall_need_wip = 0;
            $overall_avg_output = 0;
            $overall_wip_line_balance = 0;
            $overall_monthly_total_target = 0;
            $overall_monthly_total_output = 0;
            $overall_monthly_varience = 0;
            $overall_monthly_achieve = 0;
            $overall_efficiency = 0;
            $overall_dhu = 0;
            $overall_total_npt_min = 0;

            $cutting_finishing = array();
        @endphp
        @foreach($forecast->details as $detail)
            @if(!in_array($detail->line_no, ['cutting','finishing']))
            @php
                $last_production = last_production($detail);
                $past_forcast = past_forcast($detail);
                $last_day = last_day($detail);

                $last_production_output = $past_forcast ? $past_forcast->output : 0;
                $last_day_target = $last_day ? $last_day->target : 0;
                $last_day_hours = $detail->hours;

                // $varience = $last_production_output - $last_day_target;
                $varience = $detail->output - $last_day_target;
                $achieve = $last_day_target > 0 ? ($detail->output*100)/$last_day_target : 0;

                $total_output = total_output($detail);
                $total_input = total_input($detail);
                $monthly_total_target = monthly_total_target($detail);
                $monthly_total_output = monthly_total_output($detail);

                $pcs_per_machine = 0;
                if($last_day_hours > 0 && $detail->prod_days > 0){
                    $pcs_per_machine = ($last_production_output/$last_day_hours)/$detail->prod_days;
                }

                $avg_output = 0;
                if($detail->prod_days > 0){
                    $avg_output = $total_output/$detail->prod_days;
                }

                $need_wip = $last_day_target*2.5;
                $wip_line_balance = $total_input - $total_output - 100;
                $monthly_varience = $total_output - $total_input;
                $monthly_achieve = 0;
                if($total_input > 0){
                    $monthly_achieve = ($total_output*100)/$total_input;
                }

                $efficiency = 0;
                if($detail->total_mp > 0 && $last_day_hours > 0){
                    $efficiency = ($detail->output * $detail->smv *100)/($detail->total_mp * $last_day_hours * 60);
                }
            @endphp 
            <tr>
                
                <td class="td">{{ floors()[$detail->floor] }}</th>
                <td class="td">{{ lines()[$detail->line_no] }}</th>
                <td class="td">{{ optional($detail->buyer)->name }}</th>
                <td class="td">{{ optional($detail->item)->name }}</th>
                <td class="td">{{ strtoupper(optional($detail->style)->style) }}</th>
                <td class="td">{{ $detail->smv }}</th>
                <td class="td"><span>{{ $detail->op_present }}</span></th>
                <td class="td">{{ $detail->hp_present }}</th>
                <td class="td">{{ $detail->total_mp }}</th>
                <td class="td">{{ $detail->running_mc }}</th>
                <td class="td">{{ $detail->prod_days }}</th>
                <td class="td">{{ $detail->target }}</th>
                <td class="td">{{ $detail->target_hours }}</th>
                <td class="td">{{ $last_production_output }}</th>
                <td class="td">{{ $last_day_target }}</th>
                <td class="td">{{ $detail->output }}</th>
                <td class="td">{{ $last_day_hours }}</th>
                <td class="td">{{ $varience }}</td>
                <td class="td">{{ number_format($achieve, 2) }}</td>
                <td class="td">{{ number_format($pcs_per_machine,2) }}</td>
                <td class="td">{{ $detail->wash_send }}</td>
                <td class="td">{{ $detail->input_target }}</td>
                <td class="td">{{ $detail->today_input }}</td>
                <td class="td">{{ $detail->new_style_input }}</td>
                <td class="td">{{ $total_input }}</td>
                <td class="td">{{ $total_output }}</td>
                <td class="td">{{ $need_wip }}</td>
                <td class="td">{{ number_format($avg_output,2) }}</td>
                <td class="td">{{ $wip_line_balance }}</td>
                <td class="td">{{ $monthly_total_target }}</td>
                <td class="td">{{ $monthly_total_output }}</td>
                <td class="td">{{ $monthly_varience }}</td>
                <td class="td">{{ number_format($monthly_achieve, 2) }}</td>
                <td class="td">{{ number_format($efficiency, 2) }}</td>
                <td class="td">{{ $detail->dhu }}</td>
                <td class="td">{{ $detail->total_npt_min }}</td>
                <td class="td">{{ $detail->remarks }}</td>
            </tr>
            @php
                $overall_op_present += $detail->op_present;
                $overall_hp_present += $detail->hp_present;
                $overall_total_mp += $detail->total_mp;
                $overall_running_mc += $detail->running_mc;
                $overall_target += $detail->target;
                $overall_output += $last_production_output;
                $overall_last_day_target += $last_day_target;
                $overall_last_day_hours += $last_day_hours;
                $overall_last_day_output += $detail->output;
                $overall_varience += $varience;
                $overall_achieve += $achieve;
                $overall_pcs_per_machine += $pcs_per_machine;
                $overall_wash_send= $detail->wash_send;
                $overall_input_target += $detail->input_target;
                $overall_today_input += $detail->today_input;
                $overall_new_style_input += $detail->new_style_input;
                $overall_total_input += $total_input;
                $overall_total_output += $total_output;
                $overall_need_wip += $need_wip;
                $overall_avg_output += $avg_output;
                $overall_wip_line_balance += $wip_line_balance;
                $overall_monthly_total_target += $monthly_total_target;
                $overall_monthly_total_output += $monthly_total_output;
                $overall_monthly_varience += $monthly_varience;
                $overall_monthly_achieve += $monthly_achieve;
                $overall_efficiency = $efficiency;
                $overall_dhu += $detail->dhu;
                $overall_total_npt_min += $detail->total_npt_min; 
            @endphp
            @else
                @php
                    array_push($cutting_finishing, $detail)
                @endphp
            @endif
        @endforeach
        <tr>
            <td class="td text-center" colspan="6">Unit Total</td>
            <td class="td">{{ $overall_op_present }}</td>
            <td class="td">{{ $overall_hp_present }}</td>
            <td class="td">{{ $overall_total_mp }}</td>
            <td class="td">{{ $overall_running_mc }}</td>
            <td class="td"></td>
            <td class="td">{{ $overall_target }}</td>
            <td class="td"></td>
            <td class="td">{{ $overall_output }}</td>
            <td class="td">{{ $overall_last_day_target }}</td>
            <td class="td">{{ $overall_last_day_output }}</td>
            <td class="td">{{ number_format($overall_last_day_hours/$total_forecast,1) }}</td>
            <td class="td">{{ $overall_varience }}</td>
            <td class="td">{{ number_format($overall_achieve/$total_forecast,2) }}</td>
            <td class="td">{{ number_format($overall_pcs_per_machine/$total_forecast,2) }}</td>
            <td class="td">{{ $overall_wash_send }}</td>
            <td class="td">{{ $overall_input_target }}</td>
            <td class="td">{{ $overall_today_input }}</td>
            <td class="td">{{ $overall_new_style_input }}</td>
            <td class="td">{{ $overall_total_input }}</td>
            <td class="td">{{ $overall_total_output }}</td>
            <td class="td">{{ $overall_need_wip }}</td>
            <td class="td">{{ number_format($overall_avg_output/$total_forecast,2) }}</td>
            <td class="td">{{ $overall_wip_line_balance }}</td>
            <td class="td">{{ $overall_monthly_total_target }}</td>
            <td class="td">{{ $overall_monthly_total_output }}</td>
            <td class="td">{{ $overall_monthly_varience }}</td>
            <td class="td">{{ number_format($overall_monthly_achieve/$total_forecast,2) }}</td>
            <td class="td">{{ number_format($overall_efficiency/$total_forecast,2) }}</td>
            <td class="td">{{ number_format($overall_dhu/$total_forecast,2) }}</td>
            <td class="td">{{ $overall_total_npt_min }}</td>
            <td class="td"></td>
        </tr>
        @if(isset($cutting_finishing) && !empty($cutting_finishing))
        @foreach($cutting_finishing as $cf)
        @php
            $last_production = last_production($cf);
            $last_day = last_day($cf);

            $last_production_output = $last_production ? $last_production->output : 0;
            $last_day_target = $last_day ? $last_day->target : 0;
            $last_day_hours = $cf->hours;

            $varience = $last_production_output - $last_day_target;
            $achieve = $last_day_target > 0 ? ($last_production_output*100)/$last_day_target : 0;

            $total_output = total_output($cf);
            $total_input = total_input($cf);
            $monthly_total_target = monthly_total_target($cf);
            $monthly_total_output = monthly_total_output($cf);

            $pcs_per_machine = 0;
            if($last_day_hours > 0 && $cf->prod_days > 0){
                $pcs_per_machine = ($last_production_output/$last_day_hours)/$cf->prod_days;
            }

            $avg_output = 0;
            if($cf->prod_days > 0){
                $avg_output = $total_output/$cf->prod_days;
            }

            $need_wip = $last_day_target*2.5;
            $wip_line_balance = $total_input - $total_output - 100;
            $monthly_varience = $total_output - $total_input;
            $monthly_achieve = 0;
            if($total_input > 0){
                $monthly_achieve = ($total_output*100)/$total_input;
            }

            $efficiency = 0;
            if($cf->total_mp > 0 && $last_day_hours > 0){
                $efficiency = ($cf->output * $cf->smv *100)/($cf->total_mp * $last_day_hours * 60);
            }
        @endphp 
        <tr>
            <td class="td" colspan="5">@if($cf->line_no == 'cutting') Cutting @else Finishing @endif</th>
            <td class="td">{{ $cf->smv }}</th>
            <td class="td"><span>{{ $cf->op_present }}</span></th>
            <td class="td">{{ $cf->hp_present }}</th>
            <td class="td">{{ $cf->total_mp }}</th>
            <td class="td">{{ $cf->running_mc }}</th>
            <td class="td">{{ $cf->prod_days }}</th>
            <td class="td">{{-- {{ $cf->target }} --}}</th>
            <td class="td">{{-- {{ $cf->hours }} --}}</th>
            <td class="td">{{-- {{ $last_production_output }} --}}</th>
            <td class="td">{{ $last_day_target }}</th>
            <td class="td">{{ $cf->output }}</th>
            <td class="td">{{ $last_day_hours }}</th>
            <td class="td">{{ $varience }}</td>
            <td class="td">{{ number_format($achieve, 2) }}</td>
            <td class="td">{{-- {{ $pcs_per_machine }} --}}</td>
            <td class="td">{{-- {{ $cf->wash_send }} --}}</td>
            <td class="td">{{-- {{ $cf->input_target }} --}}</td>
            <td class="td">{{ $cf->today_input }}</td>
            <td class="td">{{-- {{ $cf->new_style_input }} --}}</td>
            <td class="td">{{ $total_input }}</td>
            <td class="td">{{ $total_output }}</td>
            <td class="td">{{ $need_wip }}</td>
            <td class="td">{{-- {{ number_format($avg_output,2) }} --}}</td>
            <td class="td">{{ $wip_line_balance }}</td>
            <td class="td">{{ $monthly_total_target }}</td>
            <td class="td">{{ $monthly_total_output }}</td>
            <td class="td">{{ $monthly_varience }}</td>
            <td class="td">{{ number_format($monthly_achieve, 2) }}</td>
            <td class="td">{{ number_format($efficiency, 2) }}</td>
            <td class="td">{{ $cf->dhu }}</td>
            <td class="td">{{ $cf->total_npt_min }}</td>
            <td class="td">{{ $cf->remarks }}</td>
        </tr>
        @endforeach
        @endif

    </tbody>
</table>
<div style="font-size: 8px">
  <strong>Note: </strong> <i></i>
</div>
{{-- <br>
<div style="font-size: 12px">
  Terms & Conditions:
</div>
<table class="table"  align="center" cellpadding="0" cellspacing="0" style='width: 100%;border:none; margin-top:10px; float:left;position: relative; bottom: 0;'>
  <tr>
    <td style= "font-size: 12px; width: 10%">a)</td>
    <td style= "font-size: 12px"><strong> Order will be confirmed only after approval of sample.</strong>
    </td>
  </tr>
  <tr><td style= "font-size: 12px; width: 10%">b)</td><td style= "font-size: 12px"><strong> If quality is not as per sample, goods supplied will be returned to the seler at supplier cost.</strong></td></tr>
  <tr><td style= "font-size: 12px; width: 10%">c)</td><td style= "font-size: 12px"><strong> If after use of supplied goods quality of product us found defective, the supplier must compensate to the buyer based on the quantity of the defective goods and value of the same.</strong></td></tr>
  <tr><td style= "font-size: 12px; width: 10%">d)</td><td style= "font-size: 12px"><strong> Goods must be delivered within the delivery date fixed in purchase order.</strong></td></tr>
  <tr><td style= "font-size: 12px; width: 10%">e)</td><td style= "font-size: 12px"><strong> Quantity of goods ordered & goods delivered must be same.</strong></td></tr>
  <tr><td style= "font-size: 12px; width: 10%">f)</td><td style= "font-size: 12px"><strong> Supplier must provide VAT Challan along with Delivery Challan.</strong></td></tr>
  <tr><td style= "font-size: 12px; width: 10%">g)</td><td style= "font-size: 12px"><strong> Part shipment allowed/Not allowed.</strong></td></tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="signature">
    <table class=" table"  align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:none; float:left;">
      <tr>
        <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 12px; margin-top:30px;" ><br>Prepare By</td>
        <td style="width: 15%;border:none;"></td>
        <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 12px; margin-top:30px;" ><br> Purchase Officer</td>
        <td style="width: 15%;border:none;"></td>
        <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 12px"><br>Head Of the Dept.</td>
        <td style="width: 15%;border:none;"></td>
        <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 12px"><br><span class="strong">ED/ Director</span></td>
      </tr>
    </table>
</div> --}}
<br><br><br>
<center><a id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>

@endsection
