@extends('report.index')

@section('title')
Inhouse Report
@endsection

@section('report_title')
Inhouse Report
@endsection

@section('by')
Who prepared this
@endsection

@section('content')

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm" style="">
   {{--  <div id="logo" style="float:right; display: inline;">
      <img src="{{ asset('logo.png') }}" alt="Well Group" height="40" style="border-style: none;">
    </div> --}}
    <center>
      <h1>{{-- @if($data == 'daily') Daily @elseif($data == 'weekly') Weekly @else Monthly @endif  --}}Inhouse Report</h1>
    </center>
    <br><br>
    <div style="margin-bottom: 5px;font-size: 16px;float: left">
         Style No : {{ $store_bookings->style_no }}<br>
          
    </div>
    <div style="margin-bottom: 5px;font-size: 16px;float: right">
          @if($from_date != null && $to_date == null) Date :  {{ date('d-F-Y', strtotime($from_date)) }}
          @elseif($from_date == null && $to_date != null) Date :  {{ date('d-F-Y', strtotime($to_date)) }}
          @elseif($from_date != null && $to_date != null) Date : {{ date('d-F-Y', strtotime($from_date)) }} to {{ date('d-F-Y', strtotime($to_date)) }}
          @else
          All Dates
          @endif
    </div>
    {{-- <div style="margin-bottom: 5px;font-size: 16px;float: right">
      <strong>
        Date : {{ date('d-M-Y') }}
      </strong>
    </div> --}}
    <table class="table" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
         <thead>
            <tr style="font-size: 13px;height: 30px; background-color: #e3e1dc;" class="text-center">    
                <th class="td text-center"> Garments Name </th>
                <th class="td text-center"> Material Name </th>
                <th class="td text-center"> Unit </th>
                <th class="td text-center"> Booking Qty </th>
                <th class="td text-center"> {{-- @if($data == 'daily') Today @elseif($data == 'weekly') Last 1 Week @else Last 1 Month @endif --}}Date Wise Received </th>
                <th class="td text-center"> Total Received</th>
                <th class="td text-center"> Balance Qty</th>
                <th class="td text-center"> Next Recv Date</th>
                <th class="td text-center"> Remarks</th>
          </tr>
        </thead>
        <tbody>
            @if(isset($store_booking_details[0]->id))
            @php 
                $total = 0;
            @endphp
            @foreach($store_booking_details as $store_booking_detail)
              <tr>
                  <td class="td text-center">{{$store_booking_detail->store_bookings->store_order->item_desc}}</td>
                  <td class="td text-center">{{$store_booking_detail->item}}</td>
                  <td class="td text-center">{{$store_booking_detail->unit_name != null ? $store_booking_detail->unit_name->name : ''}}</td>
                  <td class="td text-right">{{$store_booking_detail->order_qty}}</td>
                  <td class="td text-right">
                    @php
                    $today_received = $store_booking_detail->store_inventory_details
                                  ->when($from_date != null && $to_date == null, function ($query) use ($from_date){
                                      return $query->where('rcv_date', $from_date);
                                  })
                                  ->when($from_date == null && $to_date != null, function ($query) use ($to_date){
                                      return $query->where('rcv_date', $to_date);
                                  })
                                  ->when($from_date != null && $to_date != null, function ($query) use ($to_date, $from_date){
                                      return $query->where('rcv_date', '>=', $from_date)->where('rcv_date', '<=', $to_date);
                                  })->sum('received_qty');
                    // $date_today = date('Y-m-d');
                    // if($data == 'daily'){
                    //   $today_received = $store_booking_detail->store_inventory_details->where('rcv_date', $date_today)->sum('received_qty');
                    // }elseif ($data == 'weekly') {
                    //     $last_seven_date = date('Y-m-d', strtotime('-7 day'));
                    //     $today_received = $store_booking_detail->store_inventory_details->where('rcv_date', '<=', $date_today)->where('rcv_date', '>=', $last_seven_date)->sum('received_qty');
                    // }else{
                    //     $last_thirty_date = date('Y-m-d', strtotime('-1 month'));
                    //     $today_received = $store_booking_detail->store_inventory_details->where('rcv_date', '<=', $date_today)->where('rcv_date', '>=', $last_thirty_date)->sum('received_qty');
                    // }
                    @endphp
                    {{ $today_received }}
                  </td>
                  <td class="td text-right">{{$store_booking_detail->store_inventory_details->sum('received_qty')}}</td>
                  <td class="td text-right">{{($store_booking_detail->store_inventory_details->sum('received_qty'))-($store_booking_detail->order_qty)}}</td>
                  <td class="td text-right"></td>
                  <td class="td text-center">{{$store_booking_detail->remarks}}</td>

              </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {{-- <div style="margin-top: 250px" class="signature">
        <table class=" table"  align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:none; float:left;">
           <tr>
            <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 13px; margin-top:30px;" ><br>Prepare By</td>
            <td style="width: 15%;border:none;"></td>
            <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 13px; margin-top:30px;" ><br> Purchase Officer</td>
            <td style="width: 15%;border:none;"></td>
            <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 13px"><br>Head Of the Dept.</td>
            <td style="width: 12%;border:none;"></td>
            <td style="border-top: 1px solid black;width: 15%;text-align: center;font-size: 13px"><br><span class="strong">ED(Tech)/ Director/ MD</span></td>
          </tr>
        </table>
    </div> --}}
{{-- <br><br><br> --}}
<center style="margin-top:50px"><a  id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>
 
@endsection
