@extends('report.index')

@section('title')
Requisition Details Report
@endsection

@section('report_title')
Requisition Details Report
@endsection

@section('by')
Who prepared this
@endsection

@section('content')

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm" style="">
    <center><h2>REQUISITION DETAILS REPORT</h2></center>

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
    <div class="twocol" id="docname"><h3>Report of - "{{$store_requisition->style != null ? $store_requisition->style : ''}}" </h3>
      <div id="t3" class="twocol"><strong>Date: {{$store_requisition->date !=null ? date('F j,Y',strtotime($store_requisition->date)) : ''}}</strong></div>
      <div id="t4" class="twocol"><strong>Buyer: {{$store_requisition->buyer != null ? $store_requisition->buyer: ''}}</strong></div><div class="clear"></div>
      <div id="note"> Note: This document is valid for 30 days.<br>Printed At: {{date('l F j, Y g:i a')}} </div>


    </div>
    <div class="clear" style="margin-bottom: 10px;"></div>

<table class="table border-none" align="center" cellpadding="0" cellspacing="0" style=" background: #dEe; padding: 10px;">
  <tbody style="font-size: 12px" >
    <tr>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Style</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_requisition->style != null ? $store_requisition->style : ''}}</td>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Company</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_requisition->company_name != null ?$store_requisition->company_name->name : ''}}</td>
    </tr>
    <tr>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Order No </th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_requisition->ord_no != null ? $store_requisition->ord_no : ''}}</td>
        <th class="td border-right-none border-bottom-none text-left" style="width: 13%">Remarks</th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_requisition->remarks != null ? $store_requisition->remarks : ''}}</td>
    </tr>
    <tr>
        <th  class="td border-right-none border-bottom-none text-left" style="width: 13%">Order Qty </th>
        <td class="td border-right-none border-bottom-none text-left" style="width: 20%">{{$store_requisition->ord_qty != null ? $store_requisition->ord_qty : ''}}</td>
    </tr>
  </tbody>
</table>
<table class="table" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">

    <thead>
        <tr style="font-size: 12px;height: 30px; background-color: #e3e1dc;" class="text-center">    
            <th class="td text-center"> Serial</th>
            <th class="td text-center"> Item Name </th>
            <th class="td text-center"> Consumption </th>
            <th class="td text-center"> Order Qty. </th>
            <th class="td text-center"> Qoh </th>
            <th class="td text-center"> Issued </th>
            <th class="td text-center"> Roll </th>
            <th class="td text-center"> Remarks</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">

        @foreach($store_requisition_details as $detailKey =>  $store_requisition_detail)
            <tr>
                <td class="td text-center">{{ $detailKey + 1 }}</td>
                <td class="td text-center">{{$store_requisition_detail->store_booking_details->item}}</td>
                <td class="td text-center">{{$store_requisition_detail->consumption}}</td>
                <td class="td text-center">{{$store_requisition_detail->store_booking_details->order_qty}}</td>
                <td class="td text-center">{{$store_requisition_detail->store_booking_details->qoh}}</td>
                <td class="td text-center">{{$store_requisition_detail->issued}}</td>
                <td class="td text-center">{{$store_requisition_detail->roll}}</td>
                <td class="td text-center">{{$store_requisition_detail->remarks_details}}</td>

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

<table class="signature table"  align="center" cellpadding="0" cellspacing="0" style='width: 100%;border:none;  float:left;'>
  <tr>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px; margin-top:30px;" ><br>Prepared By</td>
    <td style="width: 20%;border:none;"></td>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px; margin-top:30px;" ><br> Checked By<br>Store Manager</td>
    <td style="width: 20%;border:none;"></td>
    <td style="border-top: 1px solid black;width: 20%;text-align: center;font-size: 12px"><br>Merchandiser</td>
  </tr>
</table>
{{-- <br><br><br> --}}
<center><a id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>
 
@endsection
