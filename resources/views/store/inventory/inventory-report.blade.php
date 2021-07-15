@extends('layouts.fixed')
@section('title','Inventory Details Report')
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
                        <li class="breadcrumb-item active">INVENTORY DETAILS REPORT</li>
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
                        {{--{{Form::open(['url'=>'hrm/report/section-wise-attendance','method'=>'get']) }}--}}
                        <div class="form-row">
                            <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                                <button class="btn btn-success" onclick="print('{{ $store_inventory->id }}')">Print</button>
                                <button id="cmd" class="btn btn-primary" data-toggle="tab">Pdf</button>
                                <a href="https://www.gmail.com" target="_blank" class="btn btn-warning">E-mail</a>
                                <button onclick="exportTableToExcel('datatable_buttons')" class="btn btn-secondary">Excel</button>
                            </div>
                        </div>
                        {{--{{  Form::close() }}--}}
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
                    <div  class="row">
                        {{--<div class="col-md-12 text-center">--}}
                            {{--<h4>Inventory Report Of Style <b>"{{$store_inventory->style_name != null ? $store_inventory->style_name ->style_no: ''}}"</b> </h4>--}}
                            {{--<h5><b>Buyer Name:</b> {{$store_inventory->buyer != null ? $store_inventory->buyer : ''}}</h5>--}}
                            {{--<h5><b>Date:</b> {{$store_inventory->created_at}}</h5>--}}
                            {{--<h5><b>Received Date:</b> {{$store_inventory->rcv_date != null ? $store_inventory->rcv_date : ''}}</h5>--}}
                            {{--<h5><b>Style No:</b> {{$store_inventory->style_name != null ? $store_inventory->style_name ->style_no: ''}}</h5>--}}
                        {{--</div>--}}
                        <br>
                        <br>
                        <div class="col-lg-12" style="border-top: 2px solid #636363">
                            <table id="datatable_buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1">
                                <tr>
                                    <th colspan="2">Inventory Report Of Style:</th>
                                    <td>{{$store_inventory->style_name != null ? $store_inventory->style_name ->style_no: ''}}</td>
                                    <th colspan="2">Buyer Name:</th>
                                    <td>{{$store_inventory->buyer != null ? $store_inventory->buyer : ''}}</td>
                                    <th colspan="3">Date:</th>
                                    <td>{{$store_inventory->created_at}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Received Date:</th>
                                    <td>{{$store_inventory->rcv_date != null ? $store_inventory->rcv_date : ''}}</td>
                                    <th>Style No:</th>
                                    <td>{{$store_inventory->style_name != null ? $store_inventory->style_name ->style_no: ''}}</td>
                                </tr>
                                <tr><th colspan="10"></th></tr>
                                <tr><th colspan="10"></th></tr>
                                <tbody>
                                <tr>
                                    <th  class="text-center"> Invoice/Chalan No </th>
                                    <th  class="text-center"> Supplier </th>
                                    <th  class="text-center"> Item Name </th>
                                    <th  class="text-center"> Required Qty. </th>
                                    <th  class="text-center"> Invoice Qty. </th>
                                    <th  class="text-center"> Received Qty. </th>
                                    <th  class="text-center"> Short Qty. </th>
                                    <th  class="text-center"> Over Qty. </th>
                                    <th  class="text-center"> Fabric Roll </th>
                                    <th  class="text-center"> Remarks</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($store_inventory_details as $store_inventory_detail)
                                    <tr>
                                        <td class="text-center">{{$store_inventory->inv_cha}}</td>
                                        <td class="text-center">{{$store_inventory->supplier_name != null ? $store_inventory->supplier_name->name : ''}}</td >
                                        <td class="text-center">{{$store_inventory_detail->item_name}}</td>
                                        <td class="text-center">{{$store_inventory_detail->req_qty}}</td>
                                        <td class="text-center">{{$store_inventory_detail->invoice_qty}}</td>
                                        <td class="text-center">{{$store_inventory_detail->received_qty}}</td>
                                        <td class="text-center">{{$store_inventory_detail->short_qty}}</td>
                                        <td class="text-center">{{$store_inventory_detail->over_qty}}</td>
                                        <td class="text-center">{{$store_inventory_detail->fab_roll}}</td>
                                        <td class="text-center">{{$store_inventory_detail->remarks}}</td>
                                    </tr>
                                @endforeach
                                <tr><th colspan="10"></th></tr>
                                <tr><th colspan="10"></th></tr>
                                <tr><th colspan="10"></th></tr>
                                <tr><th colspan="10"></th></tr>
                                <tr><th colspan="10"></th></tr>
                                <tr>
                                    <th colspan=""></th>
                                    <td><p>Prepared By</p></td>
                                    <th colspan=""></th>
                                    <td><p>Checked By</td>
                                    <th colspan="3"></th>
                                    <td colspan="3"><p>Merchandiser</p></td>
                                </tr>
                                <tr>
                                    <th colspan=""></th>
                                    <td></td>
                                    <th colspan=""></th>
                                    <td><p>(Store Manager)</td>
                                    <th colspan="3"></th>
                                    <td colspan="3"></td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                    {{--<div class="row" style="margin-top: 40px;margin-left: 200px">--}}
                        {{--<div class="col-md-4 text-center">--}}
                            {{--<div style="border-top:solid 2px black;width: 25%">--}}
                                {{--<p>Prepared By <span></span></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4 text-center">--}}
                            {{--<div style="border-top:solid 2px black;width: 25%">--}}
                            {{--<span>--}}
                                {{--Checked By <br>--}}
                                {{--Store Manager--}}
                            {{--</span>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4 text-center">--}}
                            {{--<div style="border-top:solid 2px black;width: 25%">--}}
                                {{--<p>Merchandiser <span></span></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->

@stop

@section('style')
    {{-- <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/jspdf.debug.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/mitubachi-normal.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/faker.min.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/examples.js"></script> --}}


    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}"> --}}
@stop

@section('plugin')
    <!-- DataTables -->
    {{-- <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script> --}}
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
@stop

@section('script')

    <!-- page script -->
    <script type="text/javascript">
        function print(id){  
            window.open('{{url("inventory-report")}}/'+id+'/print','_blank');

        }
        $(document).ready(function() {
            
            $('#cmd').click(function () {

                html2canvas($('#datatable_buttons')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Inventory_Report.pdf");
                    }
                });
                            
                // doc.save('.Fabric_Booking');
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
            test1 = test?test+'.xls':'Inventory_Report.xls';

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
