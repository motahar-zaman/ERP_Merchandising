@extends('report.index')

@section('title')
MRR
@endsection

@section('report_title')
MRR
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
      <h1>{{-- @if($data == 'daily') Daily @elseif($data == 'weekly') Weekly @else Monthly @endif  --}}Material Receiving Report (MRR)</h1>
    </center>    {{-- <div style="margin-bottom: 5px;font-size: 16px;float: right">
      <strong>
        Date : {{ date('d-M-Y') }}
      </strong>
    </div> --}}
    <table class="table" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
         <thead>
            <tr style="font-size: 12px;height: 30px; background-color: #e3e1dc;" class="text-center">    
                <th class="td">Sl No.</th>
                <th class="td">Date</th>
                <th class="td">Buyer</th>
                <th class="td">Item Name</th>
                <th class="td">MRR No</th>
                <th class="td">Inv/Challan No</th>
                <th class="td">Supplier Name</th>
                <th class="td">PKGS</th>
                <th class="td">SIZE</th>
                <th class="td">Unit</th>
                <th class="td">Inv/Cln Qty</th>
                <th class="td">RCVD Qty</th>
                <th class="td">Short Over</th>
                <th class="td">Remarks</th>
          </tr>
        </thead>
        <tbody>
            @foreach($mrr as $key => $value)
                <tr role="row" id="tr-{{ $value->id }}" class="odd text-center">
                <td class="td">{{ $key + 1 }}</td>
                <td class="td">{{ date('d.m.y', strtotime($value->date)) }}</td>
                <td class="td">{{ optional($value->buyer)->name }}</td>
                <td class="td">{{ $value->item }}</td>
                <td class="td">{{ $value->id }}</td>
                <td class="td">{{ $value->invoice_no }}</td>
                <td class="td">{{ optional($value->supplier)->name }}</td>
                <td class="td">{{ $value->pkgs }}</td>
                <td class="td">{{ $value->size }}</td>
                <td class="td">{{ optional($value->unit)->name }}</td>
                <td class="td">{{ $value->invoice_qty }}</td>
                <td class="td">{{ $value->received_qty  }}</td>
                <td class="td">{{ $value->invoice_qty - $value->received_qty}}</td>
                <td class="td">{{ $value->remarks }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
<center style="margin-top:50px"><a  id="print" class="btn-print print-none" onclick="window.print()" >Print</a></center>
</section>
 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
  setTimeout(function(){ printFirst() }, 50);

  function printFirst(){
    $('#print').click();
  }
</script>
