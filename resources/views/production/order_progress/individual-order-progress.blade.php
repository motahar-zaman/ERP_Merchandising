@extends('report.index')

@section('title')
Order Progress
@endsection

@section('report_title')
Order Progress
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
    <div id="logo" style="float:right;">
      <img src="{{ asset('logo.png') }}" alt="Well Group" height="40" style="border-style: none;">
    </div>
    <div style="margin-left: 10%;float: center !important">
      <center>
        <span style="font-size: 30px"><strong>{{ $factories[$order->factory_id] }}</strong></span>
        <br>
        <span style="font-size: 15px">Daily Order Progress Report</span>
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
            <th class="td text-left" colspan="9">Reporting Date: {{ date('d/M/y',strtotime($order->reporting_date)) }}<br>Production Date: {{ date('d/M/y',strtotime($order->production_date)) }}</th>
            <th colspan="2" class="td text-center">Cutting</th>
            <th colspan="5" class="td text-center">Sewing</th>
            <th colspan="5" class="td text-center">Washing</th>
            <th colspan="10" class="td text-center">Finishing</th>
            <th colspan="2"></th>
        </tr>
        <tr style="font-size: 8px;height: 30px; background-color: #e3e1dc;" class="text-center">
            <th class="td">Floor</th>
            <th class="td">Line No</th>
            <th class="td">Buyer</th>
            <th class="td">Style</th>
            <th class="td">Color</th>
            <th class="td">Exit Date</th>
            <th class="td">Item</th>
            <th class="td">Ord. Qty</th>
            <th class="td">Ord. Qty <br>(With 2 %)</th>
            <th class="td">Today Cutting</th>
            <th class="td">Total Cutting</th>
            <th class="td">Today Input</th>
            <th class="td">Total Input</th>
            <th class="td">Today Sewing</th>
            <th class="td">Total Sewing</th>
            <th class="td">WIP</th>
            <th class="td">Today Send</th>
            <th class="td">Total Send</th>
            <th class="td">Today Receive</th>
            <th class="td">Total Receive</th>
            <th class="td">WIP</th>
            <th class="td">Today Receive</th>
            <th class="td">Total Receive</th>
            <th class="td">Daily QC Pass</th>
            <th class="td">Total QC Pass</th>
            <th class="td">Today Pack</th>
            <th class="td">Total Pack</th>
            <th class="td">BAL. Pack</th>
            <th class="td">Daily CTN.</th>
            <th class="td">Total CTN.</th>
            <th class="td">Ship Qty</th>
            <th class="td">Remarks</th>
        </tr>
    </thead>
    <tbody style="font-size: 8px">
        @php 
            $total_cutting_sum = 0;
            $total_sewing_input_sum = 0;
            $total_sewing_sum = 0;
            $total_send_sum = 0;
            $total_washing_received_sum = 0;
            $total_finishing_received_sum = 0;
            $total_qc_pass_sum = 0;
            $total_pack_sum = 0;
            $total_ctn_sum = 0;
            $order_qty_with_percentage_sum = 0;
        @endphp
        @foreach($order->details as $detail)
            @php
                $total = App\Models\Production\OrderProgressDetails::where('floor',$detail->floor)->where('line_no',$detail->line_no)->where('factory_id',$detail->factory_id)->where('buyer_id',$detail->buyer_id)->where('style_id',$detail->style_id)->where('item_id',$detail->item_id)->get();

                $total_cutting = $total->sum('today_cutting');
                $total_sewing_input = $total->sum('total_sewing_input');
                $total_sewing = $total->sum('today_sewing');
                $total_send = $total->sum('today_send');
                $total_washing_received = $total->sum('today_washing_received');
                $total_finishing_received = $total->sum('today_finishing_received');
                $total_qc_pass = $total->sum('day_qc_pass');
                $total_pack = $total->sum('today_pack');
                $total_ctn = $total->sum('daily_ctn');

                $total_cutting_sum += $total_cutting;
                $total_sewing_input_sum += $total_sewing_input;
                $total_sewing_sum += $total_sewing;
                $total_send_sum += $total_send;
                $total_washing_received_sum += $total_washing_received;
                $total_finishing_received_sum += $total_finishing_received;
                $total_qc_pass_sum += $total_qc_pass;
                $total_pack_sum += $total_pack;
                $total_ctn_sum += $total_ctn;

                $order_qty_with_percentage = $detail->order_qty + ($detail->order_qty*2)/100;
                $order_qty_with_percentage_sum += $order_qty_with_percentage;
            @endphp
            <tr>
                <td class="td">{{ floors()[$detail->floor] }}</th>
                <td class="td">{{ lines()[$detail->line_no] }}</th>
                <td class="td">{{ optional($detail->buyer)->name }}</th>
                
                <td class="td">{{ strtoupper(optional($detail->style)->style) }}</th>
                <td class="td">{{ $detail->color }}</td>
                <td class="td">{{ $detail->exit_date }}</td>
                <td class="td">{{ optional($detail->item)->name }}</th>
                <td class="td">{{ $detail->order_qty }}</td>
                <td class="td">{{ $order_qty_with_percentage }}</td>
                <td class="td">{{ $detail->today_cutting }}</td>
                <td class="td">{{ $total_cutting }}</td>
                <td class="td">{{ $detail->today_sewing_input }}</td>
                <td class="td">{{ $total_sewing_input }}</td>
                <td class="td">{{ $detail->today_sewing }}</td>
                <td class="td">{{ $total_sewing }}</td>
                <td class="td">{{ $detail->sewing_wip }}</td>
                <td class="td">{{ $detail->today_send }}</td>
                <td class="td">{{ $total_send }}</td>
                <td class="td">{{ $detail->today_washing_received }}</td>
                <td class="td">{{ $total_washing_received }}</td>
                <td class="td">{{ $detail->washing_wip }}</td>
                <td class="td">{{ $detail->today_finishing_received }}</td>
                <td class="td">{{ $total_finishing_received }}</td>
                <td class="td">{{ $detail->day_qc_pass }}</td>
                <td class="td">{{ $total_qc_pass }}</td>
                <td class="td">{{ $detail->today_pack }}</td>
                <td class="td">{{ $total_pack }}</td>
                <td class="td">{{ $detail->bal_pack }}</td>
                <td class="td">{{ $detail->daily_ctn }}.</td>
                <td class="td">{{ $total_ctn }}</td>
                <td class="td">{{ $detail->ship_qty }}</td>
                <td class="td">{{ $detail->remarks }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7" class="td text-left"><span style="color: red; font-size: 13px;font-weight: bold">Total</span></th>
            <td class="td">{{ $order->details->sum('order_qty') }}</td>
            <td class="td">{{ $order_qty_with_percentage_sum }}</td>
            <td class="td">{{ $order->details->sum('today_cutting') }}</td>
            <td class="td">{{ $total_cutting_sum }}</td>
            <td class="td">{{ $order->details->sum('today_sewing_input') }}</td>
            <td class="td">{{ $total_sewing_input_sum }}</td>
            <td class="td">{{ $order->details->sum('today_sewing') }}</td>
            <td class="td">{{ $total_sewing_sum }}</td>
            <td class="td">{{ $order->details->sum('sewing_wip') }}</td>
            <td class="td">{{ $order->details->sum('today_send') }}</td>
            <td class="td">{{ $total_send_sum }}</td>
            <td class="td">{{ $order->details->sum('today_washing_received') }}</td>
            <td class="td">{{ $total_washing_received_sum }}</td>
            <td class="td">{{ $order->details->sum('washing_wip') }}</td>
            <td class="td">{{ $order->details->sum('today_finishing_received') }}</td>
            <td class="td">{{ $total_finishing_received_sum }}</td>
            <td class="td">{{ $order->details->sum('day_qc_pass') }}</td>
            <td class="td">{{ $total_qc_pass_sum }}</td>
            <td class="td">{{ $order->details->sum('today_pack') }}</td>
            <td class="td">{{ $total_pack_sum }}</td>
            <td class="td">{{ $order->details->sum('bal_pack') }}</td>
            <td class="td">{{ $order->details->sum('daily_ctn') }}.</td>
            <td class="td">{{ $total_ctn_sum }}</td>
            <td class="td">{{ $order->details->sum('ship_qty') }}</td>
            <td class="td"></td>
        </tr>
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
