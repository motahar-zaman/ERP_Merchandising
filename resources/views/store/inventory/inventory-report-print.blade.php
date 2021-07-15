@extends('report.index')

@section('title')
Inventory Details Report
@endsection

@section('report_title')
Inventory Details Report
@endsection

@section('by')
Who prepared this
@endsection

@section('content')

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm" style="">
    <center><h2>INVENTORY DETAILS REPORT</h2></center>

    <!-- Write HTML just like a web page -->
    <div class="twocol" style="width: 50%;float: left; display: block; ">
      <div id="logo" style="float:left; display: inline;">
        <img src="{{url('public/logo.png')}}" alt="Well Group" height="40" style="border-style: none;">
      </div>
      
      <div class="clear" style="width: 100;display: block;clear: both;height: 1px;"></div>
      <div id="companydetails" style="font-size: 8pt;">  
        Email: info@wellbd.com<br>
        Phone: +88 02 9890786-90, 9860857, 9896158, 8858032<br>
      </div>
    </div>
    <div class="twocol" id="docname"><h3>Report of - "{{ optional($store_inventory->style)->style_no }}" </h3>
      <div id="t3" class="twocol"><strong>Date: {{date('F j,Y',strtotime($store_inventory->created_at))}}</strong></div>
      <div id="t4" class="twocol"><strong>Buyer: {{$store_inventory->buyer != null ? $store_inventory->buyer : ''}}</strong></div><div class="clear"></div>
      <div id="note"> Note: This document is valid for 30 days.<br>Printed At: {{date('l F j, Y g:i a')}} </div>


    </div>
    <div class="clear" style="margin-bottom: 10px;"></div>

<table class="table border-none" align="center" cellpadding="0" cellspacing="0" style=" background: #dEe; padding: 10px;">
  <tbody style="font-size: 12px" >
    <tr>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Received Date:</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_inventory->rcv_date != null ? $store_inventory->rcv_date : ''}}</td>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Style No:</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{ optional($store_inventory->style)->style_no }}</td>
    </tr>
    <tr>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Received Type:</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">Challan</td>
    </tr>
  </tbody>
</table>
<table class="table" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">

    <thead>
        <tr style="font-size: 12px;height: 30px; background-color: #e3e1dc;" class="text-center">    
            <th class="td text-center"> Invoice/Chalan No </th>
            <th class="td text-center"> Supplier </th>
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
    <tbody style="font-size: 12px">
        @foreach($store_inventory_details as $store_inventory_detail)
            <tr>
                <td class="td text-center">{{$store_inventory->inv_cha}}</td>
                <td class="td text-center">{{$store_inventory->supplier_name != null ? $store_inventory->supplier_name->name : ''}}</td >
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
    </tbody>
</table>  

<table class="table"  align="center" cellpadding="0" cellspacing="0" style='width: 100%;border:none; margin-top:10px; float:left;position: relative;'>

 {{-- <tr>
    <td style= "font-size: 12px">Terms & Condition :
    </td>  
  </tr> --}}
</table>

<table class="signature table"  align="center" cellpadding="0" cellspacing="0" style='width: 100%;border:none; float:left;'>
  <tr>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px; margin-top:30px;" ><br>Prepared By</td>
    <td style="width: 20%;border:none;"></td>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px; margin-top:30px;" ><br> Checked By</td>
    <td style="width: 20%;border:none;"></td>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px"><br>Merchandiser</td>
  </tr>
</table>
{{-- <br><br><br> --}}
<center><a id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>
 
@endsection
