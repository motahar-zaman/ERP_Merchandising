@extends('layouts.fixed')
{{--costing chart bill for product cost sheet--}}
@section('title','Booking Plan')
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
                                <h2>Booking Plan</h2>
                                {{-- <h4>Cost Breakdown </h4> --}}
                            </div>
                            <br>
                            <br>
                           {{--  <div class="col-md-4 text-right" style="margin: 14px -10px;">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->front_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                                <img src="{{ asset("costBreakdownImage/".$cost_breakdown->back_image) }}" style="height:100px;width:100px;border: 1px solid #dddddd">
                            </div> --}}
                        @if(isset($booking_plan->id))
                        <div class="col-lg-12 header table-responsive p-0" style="border-top: 2px solid #636363">

                            <table id="datatable_buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1">
                                <tr>
                                    <th colspan="15" class="text-center"><h4> ID #{{ $booking_plan->id }} </h4></th>
                                </tr>
                                {{-- <tr>
                                    <th colspan="3" class="text-center"> LC Factory </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->lc_factory }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center">Buyer </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->buyer_id }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Style </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->style_id }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center">Item </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->item }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Responsible Merchandiser </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->merchandiser }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Responsible Merchandiser Head </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->merchandiser_head }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Sketch/Sample </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->sketch_or_sample }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center">SMV </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->smv }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Order Qty </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->quantity }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Order Season </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->order_season }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Input Date </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->input_date }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Ex Factory </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->ex_factory }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Wash/ Not Wash </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->wash }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Emblishment </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->emblishment }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"> Remarks </th>
                                    <td colspan="5" class="text-center"> {{ $booking_plan->remarks }}</td>
                                </tr> --}}
                                <tr>
                                     @php 
                                        $bookingPlan = bookingPlan();
                                    @endphp
                                    @foreach($bookingPlan as $tna)
                                    <th>{{ $tna }}</th>
                                    @endforeach
                                </tr>
                                    <td class="text-center"> {{ $booking_plan->lc_factory }}</td>
                                    <td class="text-center"> {{ $booking_plan->buyer_id }}</td>
                                    <td class="text-center"> {{ $booking_plan->style_id }}</td>
                                    <td class="text-center"> {{ $booking_plan->item }}</td>
                                    <td class="text-center"> {{ $booking_plan->merchandiser }}</td>
                                    <td class="text-center"> {{ $booking_plan->merchandiser_head }}</td>
                                    <td class="text-center"> {{ $booking_plan->sketch_or_sample }}</td>
                                    <td class="text-center"> {{ $booking_plan->smv }}</td>
                                    <td class="text-center"> {{ $booking_plan->quantity }}</td>
                                    <td class="text-center"> {{ $booking_plan->order_season }}</td>
                                    <td class="text-center"> {{ $booking_plan->input_date }}</td>
                                    <td class="text-center"> {{ $booking_plan->ex_factory }}</td>
                                    <td class="text-center"> {{ $booking_plan->wash }}</td>
                                    <td class="text-center"> {{ $booking_plan->emblishment }}</td>
                                    <td class="text-center"> {{ $booking_plan->remarks }}</td>
                                <tr>

                                </tr>
                            </table>
                        </div>
                        @else
                        <center><h3>Sorry, you have no booking plan !</h3></center>
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

