@extends('layouts.fixed')
{{--costing chart bill for product cost sheet--}}
@section('title','Costing Chart Bill')
<style>
    .sig-hr{
        font-size: 20px;
        font-weight: 600;
        padding: 5px;
        width: 280px;
        border-top: 2px dotted #01005b;
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
                            <div class="col-md-4 text-left">

                            </div>
                            <div class="col-md-4 text-center">
                                <h2>{{$cost_breakdown->unit_id != null ? $cost_breakdown->CompanyUnit->name : ''}}</h2>
                                <h4>Cost Breakdown </h4>
                            </div>
                            <div class="col-md-4 text-right" style="margin: 14px -10px;">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->front_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->back_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                            </div>

                        <div class="col-lg-12 header" style="border-top: 2px solid #636363">

                            <table id="datatable_buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1">

                                <tr>
                                    <th colspan="4">Export Country</th>
                                    <td class="text-center">{{$cost_breakdown->country != null ? $cost_breakdown->country->name : ''}}</td>
                                    <th colspan="3">Factory</th>
                                    <td class="text-center">{{$cost_breakdown->unit_id != null ? $cost_breakdown->CompanyUnit->name : ''}}</td>

                                </tr>
                                <tr>
                                    <th colspan="4">Merchandiser</th>
                                    <td class="text-center" >{{$cost_breakdown->merchandiser_name}}</td>
                                    <th colspan="3">Factory Owner </th>
                                    <td class="text-center">Mr. Sayed Nazrul Islam</td>

                                </tr>
                                <tr>
                                    <th colspan="4">Customer</th>
                                    <td class="text-center">{{$cost_breakdown->consumer_name}}</td>
                                    <th colspan="3"> Style : {{$cost_breakdown->style}}</th>
                                    <th class="text-center">Spec: @if($cost_breakdown->has_spec) Yes @else No  @endif </th>

                                </tr>
                                <tr>
                                    <th colspan="4">Product Description</th>
                                    <td class="text-center">{{$cost_breakdown->product_description}}</td>
                                    <th colspan="3"> Sketch </th>
                                    <td class="text-center">@if($cost_breakdown->has_sketch) Yes @else No  @endif  </td>

                                </tr>
                                <tr>
                                    <th colspan="4">Size Range</th>
                                    <td class="text-center">{{$cost_breakdown->size_range}}</td>
                                    <th colspan="3"> Size Ratio </th>
                                    <td class="text-center">@if($cost_breakdown->size_ratio) Yes @else No  @endif </td>

                                </tr>
                                <tr>
                                    <th colspan="4">Department</th>
                                    <td class="text-center">Men's</td>
                                    <th colspan="3"> Estimate Gmts del. </th>
                                    <td class="text-center">TBA</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Date Updated Cost:  July-30-2018</th>
                                    <td colspan="1" class="text-center"></td>
                                    <th colspan="3">Estimate Qty:</th>
                                    <td class="text-center">{{$cost_breakdown->estimate_qty}}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Price Quotation(Buyer End):</th>
                                    <td colspan="1" class="text-center">{{$cost_breakdown->quote_id != null ? $cost_breakdown->PriceQuote->name : ''}}</td>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="4">Payment Terms:</th>
                                    <td colspan="1" class="text-center">{{$cost_breakdown->payment_terms != null ? $cost_breakdown->payment_terms : ''}}</td>
                                </tr>

                                <tr>
                                    <th colspan="9"></th>
                                </tr>
                                <tbody>

                                <tr>
                                    <th colspan="9" class="text-center"> Fabric Cost</th>
                                </tr>

                                <tr>
                                    <th  class="text-center"> Fabric Type </th>
                                    <th  class="text-center"> Fabric Content </th>
                                    <th  class="text-center"> Fabric Width </th>
                                    <th  class="text-center"> Fabric Weight </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center"> Consumption</th>
                                    <th  class="text-center"> Unit(mtr/yd/kg)</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Appointed Fabric Cost(DZN)</th>
                                </tr>

                                @php $fabric_subtotal = 0; @endphp
                                @foreach($cost_breakdown->fabrics as $fabric)
                                    <tr>
                                        <td  class="text-center">{{$fabric->fabric != null ? $fabric->fabric->name : '' }}</td>
                                        <td  class="text-center"> {{$fabric->fabric_content}} </td>
                                        <td  class="text-center"> {{$fabric->fabric_width}} </td>
                                        <td  class="text-center"> {{$fabric->fabric_weight}} </td>
                                        <td  class="text-center"> {{$fabric->fabric_description}} </td>
                                        <td  class="text-center"> {{$fabric->fabric_consumption}}</td>
                                        <td  class="text-center"> {{$fabric->unit_id != null ? $fabric->unit->name : ''}}</td>
                                        <td  class="text-center"> {{$fabric->unit_price}} </td>
                                        <td  class="text-center"> ${{number_format($fabric->fabric_cost,4)}} </td>
                                        @php $fabric_subtotal+=$fabric->fabric_cost; @endphp
                                    </tr>
                                @endforeach

                                <tr>
                                    <th colspan="8" class="">1. Total Fabric Cost:</th>
                                    <th  class="text-center">${{number_format($fabric_subtotal,4)}}</th>
                                </tr>



                                <tr>
                                    <th colspan="9" class="text-center"> Appointed Trims Cost:</th>
                                </tr>

                                <tr>
                                    <th colspan="4" class="text-center"> Trims Item </th>
                                    <th  class="text-center"> REF </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center">Required Qty</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Appointed Trim Cost(DZN)</th>
                                </tr>
                                @php $trim_subtotal = 0; @endphp
                                @foreach($cost_breakdown->trims as $trim)
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            @if($trim->trim)
                                                {{$trim->trim->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$trim->reference}}</td>
                                        <td class="text-center">{{$trim->trims_description}}</td>
                                        <td class="text-center">{{$trim->required_qty}}</td>
                                        <td class="text-center">{{$trim->trims_price}}</td>
                                        <td class="text-center">${{number_format($trim->trims_cost,4)}}</td>
                                    </tr>
                                    @php $trim_subtotal+=$trim->trims_cost; @endphp
                                @endforeach

                                <tr>
                                    <th colspan="8" class="">2. Total Trim Cost:</th>
                                    <th  class="text-center">${{number_format($trim_subtotal,4)}}</th>
                                </tr>


                                <tr>
                                    <th  colspan="9" class="text-center">Packaging Trims:</th>
                                </tr>

                                <tr>
                                    <th colspan="4"  class="text-center">  Items </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center"> Unit</th>
                                    <th  class="text-center">Required Qty</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Packaging Trim Cost</th>
                                </tr>
                                @php $other_trim_subtotal=0; @endphp
                                @foreach($cost_breakdown->other_trims as $other_trim)
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            @if($other_trim->otherTrim)
                                                {{$other_trim->otherTrim->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$other_trim->other_trim_description}}</td>
                                        <td class="text-center">
                                            @if($other_trim->otherTrim)
                                                @if($other_trim->otherTrim->product_unit)
                                                    {{ $other_trim->otherTrim->product_unit->name }}
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-center">{{number_format($other_trim->qty,4)}}</td>
                                        <td class="text-center">{{number_format($other_trim->price,4)}}</td>
                                        <td class="text-center">${{number_format($other_trim->cost,4)}}</td>
                                    </tr>
                                    @php $other_trim_subtotal+=$other_trim->cost;  @endphp
                                @endforeach

                                <tr>
                                    <th colspan="8" class="">3. Total Packaging Cost</th>
                                    <th  class="text-center">${{number_format($other_trim_subtotal,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="9" class=""></th>

                                </tr>
                                <tr>
                                    <th colspan="7" class="">4. CM (Cutting & Making)</th>
                                    <th  class="text-center">(dzn):</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->cutting_marking,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="9" class=""></th>

                                </tr>
                                <tr>
                                    <th colspan="8" class="">5. Embroidery</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->embroidery !=null ? $cost_breakdown->embroidery : '0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">6. Printing</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->printing !=null ? $cost_breakdown->printing :'0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">7. Washing</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->washing !=null ? $cost_breakdown->washing :'0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">8. Testing Charge</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->testing_charge !=null ? $cost_breakdown->testing_charge :'0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">9. Other Charge</th>
                                    <th  class="text-center">${{number_format($cost_breakdown->other_charge !=null ? $cost_breakdown->other_charge : '0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="9" class=""></th>

                                </tr>
                                @php
                                    $grand_total =  $fabric_subtotal+$trim_subtotal+$other_trim_subtotal+$cost_breakdown->cutting_marking+
                                                    $cost_breakdown->embroidery+$cost_breakdown->printing+$cost_breakdown->washing+$cost_breakdown->testing_charge+
                                                    $cost_breakdown->other_charge;
                                @endphp
                                <tr style="line-height:1">
                                    <th colspan="8" class="">10. Total Factory FOB/DZN without Bank</th>

                                    <th  class="text-center">${{number_format($grand_total,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="6" class="">11. Financial/Commercial Charge/Bank</th>
                                    <th colspan="2" class="">Consider {{$cost_breakdown->consider}}%</th>
                                    <th  class="text-center">${{number_format($consider = ($grand_total*$cost_breakdown->consider)/100,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="6" class=""></th>
                                    <th colspan="2" class="">Final FOB/DZN</th>
                                    <th  class="text-center">${{number_format($after_consider = $grand_total+$consider,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="6" class=""></th>
                                    <th colspan="2" class="">Final FOB/PC</th>
                                    <th  class="text-center">${{number_format($after_consider/12,4)}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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

