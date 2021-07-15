@extends('report.index')

@section('title')
Supplier Wise Products
@endsection

@section('report_title')
Supplier Wise Products
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
      <h1>{{-- @if($data == 'daily') Daily @elseif($data == 'weekly') Weekly @else Monthly @endif  --}}Supplier Wise Products</h1>
    </center>
    <br><br>
    <div style="margin-bottom: 5px;font-size: 16px;float: left">
         Style No : {{ $store_bookings->style_no }}<br>
          
    </div>
    <div style="margin-bottom: 5px;font-size: 16px;float: right">
          @if(isset($supplier->id))
          Supplier: {{ $supplier->name }}
          @else
          All Suppliers
          @endif
    </div>
    {{-- <div style="margin-bottom: 5px;font-size: 16px;float: right">
      <strong>
        Date : {{ date('d-M-Y') }}
      </strong>
    </div> --}}
    <table class="table" align="center"  cellspacing="0" border="0" style="margin-top:20px;">
         <thead>
            <tr style="font-size: 13px;height: 30px; background-color: #e3e1dc;" class="text-center">    
                <th class="td text-center"> Received Date </th>
                <th class="td text-center"> Invoice/Chalan No </th>
                <th class="td text-center"> Item Name </th>
                <th class="td text-center"> Required Qty. </th>
                <th class="td text-center"> Invoice Qty. </th>
                <th class="td text-center"> Received Qty. </th>
                <th class="td text-center"> Short Qty. </th>
                <th class="td text-center"> Over Qty. </th>
                <th class="td text-center"> Fabric Roll </th>
                <th class="td text-center"> Remarks</th>
          </tr>
        </thead>
        <tbody>
            @if(isset($store_inventory_details[0]->id))
            @foreach($store_inventory_details as $store_inventory_detail)
              <tr style="font-size: 13px;">
                  <td class="td text-center">{{$store_inventory_detail->rcv_date}}</td>
                  <td class="td text-center">{{optional($store_inventory_detail->store_inventory)->inv_cha}}</td>
                  <td class="td text-center">{{$store_inventory_detail->item_name}}</td>
                  <td class="td text-center">{{$store_inventory_detail->req_qty}}</td>
                  <td class="td text-center">{{$store_inventory_detail->invoice_qty}}</td>
                  <td class="td text-center">{{$store_inventory_detail->received_qty}}</td>
                  <td class="td text-center">{{$store_inventory_detail->short_qty}}</td>
                  <td class="td text-center">{{$store_inventory_detail->over_qty}}</td>
                  <td class="td text-center">{{$store_inventory_detail->fab_roll}}</td>
                  <td class="td text-center">{{$store_inventory_detail->remarks}}</td>

              </tr>
            @endforeach
            @endif
        </tbody>
    </table>
<center style="margin-top:50px"><a  id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>
 
@endsection
