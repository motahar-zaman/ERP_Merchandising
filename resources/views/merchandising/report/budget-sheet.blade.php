@extends('layouts.fixed')
{{--Budget Sheet Report for Budget Sheet--}}
@section('title','Budget Sheet')
<style>
    .sig-hr{
        font-size: 20px;
        font-weight: 600;
        padding: 5px;
        width: 280px;
        border-top: 2px dotted #01005b;
    }

    #datatable_buttons tr th,#datatable_buttons tr td{
        border: solid 2px black;
    }

    @media print {
        /*pre, blockquote {page-break-inside: inherit;}*/
        font-size: 3px;
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
                        <li class="breadcrumb-item active">Budget Sheet</li>
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
                                <button onclick="exportTableToExcel('datatable_buttons')"  class="btn btn-secondary">Excel</button>
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-left"></div>
                        <div class="col-md-4 text-center">
                            <h2>{{$budget_sheets->unit_id != null ? $budget_sheets->CompanyUnit->name : ''}}</h2>
                            <h4>Budget Sheet </h4>
                        </div>

                        <div class="col-md-4 text-right" style="margin: 14px -10px;">
                            <img src="{{ asset("budgetSheetImage/".$budget_sheets->front_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                            <img src="{{ asset("budgetSheetImage/".$budget_sheets->back_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                        </div>

                        <div class="col-lg-12" style="border-top: 2px solid #636363">
                            <table id="datatable_buttons" class="table table responsive table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1;">
                                <tr>
                                    <th colspan="4">Export Country</th>
                                    <td class="text-center">{{$budget_sheets->country != null ? $budget_sheets->country->name : ''}}</td>
                                    <th colspan="3">Factory</th>
                                    <td class="text-center">{{$budget_sheets->unit_id != null ? $budget_sheets->CompanyUnit->name : 'null'}}</td>

                                </tr>
                                <tr>
                                    <th colspan="4">Merchandiser</th>
                                    <td class="text-center" >{{$budget_sheets->merchandiser_name}}</td>
                                    <th colspan="3">Factory Owner </th>
                                    <td class="text-center">Mr. Sayed Nazrul Islam</td>

                                </tr>
                                <tr>
                                    <th colspan="4">Customer</th>
                                    <td class="text-center">{{$budget_sheets->consumer_name}}</td>
                                    <th colspan="3"> Style : {{$budget_sheets->style}}</th>
                                    <th class="text-center">Spec: @if($budget_sheets->has_spec) Yes @else No  @endif </th>

                                </tr>
                                <tr>
                                    <th colspan="4">Product Description</th>
                                    <td class="text-center">{{$budget_sheets->product_description}}</td>
                                    <th colspan="3"> Sketch </th>
                                    <td class="text-center">@if($budget_sheets->has_sketch) Yes @else No  @endif  </td>

                                </tr>
                                <tr>
                                    <th colspan="4">Size Range</th>
                                    <td class="text-center">{{$budget_sheets->size_range}}</td>
                                    <th colspan="3"> Size Ratio </th>
                                    <td class="text-center">@if($budget_sheets->size_ratio) Yes @else No  @endif </td>

                                </tr>
                                <tr>
                                    <th colspan="4">Price Quotation(Buyer End):</th>
                                    <td colspan="1" class="text-center">{{$budget_sheets->quote_id != null ? $budget_sheets->PriceQuote->name : ''}}</td>
                                    <th colspan="3"> Estimate Gmts del. </th>
                                    <td class="text-center">{{$budget_sheets->estimate_garments}}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Payment Terms:</th>
                                    <td colspan="1" class="text-center">{{$budget_sheets->payment_terms != null ? $budget_sheets->payment_terms : ''}}</td>
                                    <th colspan="3">Estimate Qty:</th>
                                    <td class="text-center">{{$budget_sheets->estimate_qty}}</td>
                                </tr>
                                <tr>
                                    <th colspan="9"></th>
                                </tr>

                                <tr>
                                    <th colspan="3"> Style Name/Color Name</th>
                                    <th colspan="2"> Size Range</th>
                                    <th> Order Qty.</th>
                                    <th> Confirmed</th>
                                    <th> Well Provided</th>
                                    <th> Total L/C Value</th>
                                </tr>
                                <tr>
                                    <td colspan="3">{{$budget_sheets->style}}</td>
                                    <td colspan="2">{{$budget_sheets->size_range}}</td>
                                    <td>{{$budget_sheets->estimate_qty}}</td>
                                    <td>{{$budget_sheets->fob}}</td>
                                    <td></td>
                                    <td>{{ $total_lc_value = ($budget_sheets->estimate_qty)*($budget_sheets->fob) }}</td>
                                </tr>
                                <tr>
                                    <td  colspan="3" class=""><b>TOTAL GRAND  Q'TY- Pc/Dzn:</b> </td>
                                    <td  colspan="2" class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"></td>
                                </tr>

                                <tr>
                                    <th colspan="9"></th>
                                </tr>

                                <tr>
                                    <th colspan="3"> Style Name/Color Name</th>
                                    <th colspan="2"> Size Range</th>
                                    <th> SOLID Q'TY.</th>
                                    <th> Consumption</th>
                                    <th> FABRIC REQ</th>
                                    <th> pocket fabric yy</th>
                                </tr>
                                <tr>
                                    <td colspan="3">{{$budget_sheets->style}}</td>
                                    <td colspan="2">{{$budget_sheets->size_range}}</td>
                                    <td>{{$budget_sheets->estimate_qty}}</td>
                                    <td>{{$budget_sheets->consumption}}</td>
                                    <td>{{$budget_sheets->estimate_qty * $budget_sheets->consumption}}</td>
                                    <td>{{$budget_sheets->pocket_fab_yy}}</td>
                                </tr>
                                <tr>
                                    <td  colspan="3" class=""> </td>
                                    <td  colspan="2" class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td  class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>

                                <tbody>
                                <tr>
                                    <th colspan="9"></th>
                                </tr>
                                <tr>
                                    <th colspan="9" class="text-center"> Cost Breakdown</th>
                                </tr>
                                <tr>
                                    <th colspan="9"> Fabric Cost</th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-center"> Fabric Type </th>
                                    <th  class="text-center"> Fabric Content </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center"> Consumption</th>
                                    <th  class="text-center"> Unit</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Appointed Fabric Cost(DZN)</th>
                                </tr>

                                @php $fabric_subtotal = 0; @endphp
                                @foreach($budget_sheets->fabrics as $fabric)
                                    <tr>
                                        <td colspan="3" class="text-center">{{$fabric->fabric != null ? $fabric->fabric->name : '' }}</td>
                                        <td  class="text-center"> {{$fabric->fabric_content}} </td>
                                        <td  class="text-center"> {{$fabric->fabric_description}} </td>
                                        <td  class="text-center"> ${{$fabric->fabric_consumption}}</td>
                                        <td  class="text-center">  {{$fabric->unit_id != null ? $fabric->unit->name : ''}}</td>
                                        <td  class="text-center"> {{$fabric->unit_price}} </td>
                                        <td  class="text-center"> ${{number_format($fabric->fabric_cost,4)}} </td>
                                        @php $fabric_subtotal+=$fabric->fabric_cost; @endphp
                                    </tr>
                                @endforeach

                                <tr>
                                    <th colspan="8" class="">Total Fabric Cost:</th>
                                    <th class="text-center">${{number_format($fabric_subtotal,4)}}</th>
                                </tr>

                                <tr>
                                    <th colspan="9" class="text-center"> Appointed Trims Cost:</th>
                                </tr>

                                <tr>
                                    <th  colspan="4" class="text-center"> Trims Item </th>
                                    <th  class="text-center"> REF </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center">Required Qty</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Appointed Trim Cost(DZN)</th>
                                </tr>
                                @php $trim_subtotal = 0; @endphp
                                @foreach($budget_sheets->trims as $trim)
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
                                    <th colspan="8" class="">Total Appointed Trim Cost:</th>
                                    <th  class="text-center">${{number_format($trim_subtotal,4)}}</th>
                                </tr>

                                <tr>
                                    <th  colspan="9" class="text-center">Packaging Trims Cost:</th>
                                </tr>

                                <tr >
                                    <th colspan="4"  class="text-center">  Items </th>
                                    <th  class="text-center"> Description </th>
                                    <th  class="text-center"> Unit</th>
                                    <th  class="text-center">Required Qty</th>
                                    <th  class="text-center">Unit Price</th>
                                    <th  class="text-center">Packaging Trim Cost</th>
                                </tr>
                                @php $other_trim_subtotal=0; @endphp
                                @foreach($budget_sheets->other_trims as $other_trim)
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            @if($other_trim->otherTrim)
                                                {{$other_trim->otherTrim->name}}
                                            @endif
                                        </td>
                                        <td  class="text-center">{{$other_trim->other_trim_description}}</td>
                                        <td  class="text-center">
                                            @if($other_trim->otherTrim)
                                                @if($other_trim->otherTrim->product_unit)
                                                    {{ $other_trim->otherTrim->product_unit->name }}
                                                @endif
                                            @endif
                                        </td>
                                        <td  class="text-center">{{number_format($other_trim->qty,4)}}</td>
                                        <td  class="text-center">{{number_format($other_trim->price,4)}}</td>
                                        <td  class="text-center">${{number_format($other_trim->cost,4)}}</td>
                                    </tr>
                                    @php $other_trim_subtotal+=$other_trim->cost;  @endphp
                                @endforeach

                                <tr>
                                    <th colspan="8" class="">Total Packaging Cost</th>
                                    <th   class="text-center">${{number_format($other_trim_subtotal,4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="9" class=""></th>

                                </tr>
                                {{--<tr>--}}
                                    {{--<th colspan="8" class="">*Total Trim Cost</th>--}}
                                    {{--<th class="text-center">${{number_format($total_trim_cost=$trim_subtotal+$other_trim_subtotal,4)}}</th>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th colspan="9" class=""></th>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th colspan="8" class="">*Total Fabric & Trim Cost</th>--}}
                                    {{--<th class="text-center">${{number_format($fabric_subtotal+$total_trim_cost,4)}}</th>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th colspan="9" class=""></th>--}}
                                {{--</tr>--}}
                                <tr>
                                    <th colspan="8" class="">Embroidery</th>
                                    @php 
                                        $embroidery = $budget_sheets->embroidery + $budget_sheets->embroidery_2 + $budget_sheets->embroidery_3;
                                    @endphp
                                    <th class="text-center">${{number_format($embroidery !=null ? $embroidery : '0',4)}}</th>
                                </tr>
                                <tr>
                                    @php 
                                        $printing = $budget_sheets->printing + $budget_sheets->printing_2 + $budget_sheets->printing_3;
                                    @endphp
                                    <th colspan="8" class="">Printing</th>
                                    <th class="text-center">${{number_format($printing !=null ? $printing :'0',4)}}</th>
                                </tr>
                                <tr>
                                    @php 
                                        $washing = $budget_sheets->washing + $budget_sheets->washing_2 + $budget_sheets->washing_3 + $budget_sheets->washing_4 + $budget_sheets->washing_5;
                                    @endphp
                                    <th colspan="8" class="">Washing</th>
                                    <th class="text-center">${{number_format($washing !=null ? $washing :'0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">Testing Charge</th>
                                    <th class="text-center">${{number_format($budget_sheets->testing_charge !=null ? $budget_sheets->testing_charge :'0',4)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="8" class="">Other Charge</th>
                                    <th class="text-center">${{number_format($budget_sheets->other_charge !=null ? $budget_sheets->other_charge : '0',4)}}</th>
                                </tr>
                                @php
                                    $grand_total =  $fabric_subtotal+$trim_subtotal+$other_trim_subtotal+$budget_sheets->cutting_marking+
                                                    $budget_sheets->embroidery+$budget_sheets->printing+$budget_sheets->washing+$budget_sheets->testing_charge+
                                                    $budget_sheets->other_charge;

                                    $total_lc_value = ($budget_sheets->estimate_qty)*($budget_sheets->fob);

                                    $other_charge = ($budget_sheets->embroidery + $budget_sheets->printing + $budget_sheets->washing + $budget_sheets->testing_charge + $budget_sheets->other_charge);
                                @endphp

                                    <tr>
                                        <td colspan="9" style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">Total L/C Value</th>
                                        <th  class="text-center">${{number_format($total_lc_value,4)}}</th>
                                        <td colspan="4" style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">Fin Bank Charge {{$budget_sheets->consider}}%</th>
                                        <th class="text-center">${{number_format($consider = ($total_lc_value*$budget_sheets->consider)/100,4)}}</th>
                                        <td colspan="4" style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">Grand Total Cost</th>
                                        <th  class="text-center">${{number_format($after_consider = $fabric_subtotal+$consider+$trim_subtotal+$other_trim_subtotal+
                                        $other_charge,4)}}</th>
                                        <td colspan="4" style="border: none"></td>
                                        {{--{{dd($other_charge)}}--}}
                                        {{--45.71112--}}
                                        {{--7204.68--}}
                                        {{--2.655--}}
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">Save</th>
                                        <th  class="text-center">${{number_format($save = $total_lc_value-$after_consider,4)}}</th>
                                        <td colspan="4" style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">CM</th>
                                        <!--<th  class="text-center">${{number_format($budget_sheets->cutting_marking,4)}}</th>-->
                                        <th  class="text-center">${{number_format(($save/($budget_sheets->estimate_qty/12)),4)}}</th>
                                        <td colspan="4" style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: none"></td>
                                        <th  class="">% Coming</th>
                                        @if($total_lc_value != null)
                                            <th  class="text-center">{{number_format($save/$total_lc_value*100,4)}}%</th>
                                        @endif
                                        <td colspan="4" style="border: none"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 25px">
                        <div class="col-md-6">
                            <div class="sig-hr"  style="margin-left: 130px">
                                <p>Signed & Confirmed</p>
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
    </section>
    <!-- /.content -->

@stop

@section('style')
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/jspdf.debug.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/mitubachi-normal.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/faker.min.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/examples.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {

            $('#cmd').click(function () {
                var doc = new jsPDF();
                doc.text(90, 10, 'Budget Sheet');
                doc.autoTable({html: '#datatable_buttons',
                    theme : 'grid',
                    styles: {fontSize: 7}
                });
                doc.save('.Budget_Sheet');
            });
        });
    </script>

    <script>
        function exportTableToExcel(datatable_buttons,test){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(datatable_buttons);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            test1 = test?test+'.xls':'Budget_Sheet.xls';

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


