@extends('layouts.fixed')
@section('title','Booking Details Report')
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
                        <li class="breadcrumb-item active">Booking Details Report</li>
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
                                <button class="btn btn-success" onclick="print('{{ $store_bookings->id }}'); return false;">Print</button>
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
                        <div class="col-md-12 text-center">
                            <h4>Booking Details Report of - <b>"{{$store_bookings->store_order != null ?$store_bookings->store_order->style_no : ''}}"</b> </h4>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12" style="border-top: 2px solid #636363;overflow-x:auto !important;">
                            <table  id="datatable_buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1">
                                <thead>
                                    <tr>
                                        <th colspan="4">Booking Date</th>
                                        <td class="text-center">{{$store_bookings->booking_date}}</td>
                                        <th colspan="4">Buyer Name</th>
                                        <td class="text-center">{{$store_bookings->buyer_name != null ? $store_bookings->buyer_name : ''}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Style No.</th>
                                        <td class="text-center">{{$store_bookings->store_order != null ?$store_bookings->store_order->style_no : ''}}</td>
                                        <th colspan="4">Merchandiser Name</th>
                                        <td class="text-center">{{$store_bookings->merchandiser_name != null ? $store_bookings->merchandiser_name : ''}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Order No.</th>
                                        <td class="text-center" >{{$store_bookings->order_no}}</td>
                                        <th colspan="4">Remarks</th>
                                        <td class="text-center" >{{$store_bookings->remarks}}</td>
                                    </tr>
                                    <tr>
                                        <th  colspan="4">Order Qty. </th>
                                        <td class="text-center">{{$store_bookings->order_qty}}</td>
                                    </tr>
                                </thead>

                                <tbody>
                                <th colspan="10"></th>
                                <tr>
                                    <th  class="text-center"> Group </th>
                                    <th  class="text-center"> Item Name </th>
                                    <th  class="text-center"> Order Qty </th>
                                    <th  class="text-center"> unit </th>
                                    <th  class="text-center"> Supplier Name </th>
                                    <th  class="text-center"> Receive Qty. </th>
                                    <th  class="text-center"> Balance Qty. </th>
                                    <th  class="text-center"> Qoh </th>
                                    <th  class="text-center"> Fabric Roll </th>
                                    <th  class="text-center"> Remarks</th>
                                </tr>

                                @foreach($store_booking_details as $store_booking_detail)
                                    {{--@dd($store_booking_detail)--}}
                                    <tr>
                                        <td class="text-center">{{$store_booking_detail->groups != null ? $store_booking_detail->groups->group_name : ''}}</td>
                                        <td class="text-center">{{$store_booking_detail->item}}</td>
                                        <td class="text-center">{{$store_booking_detail->order_qty}}</td>
                                        <td class="text-center">{{$store_booking_detail->unit_name != null ? $store_booking_detail->unit_name->name : ''}}</td>
                                        <td class="text-center">{{$store_booking_detail->suppliers != null ? $store_booking_detail->suppliers->name : ''}}</td>
                                        <td class="text-center">{{$store_booking_detail->store_inventory_details->sum('received_qty')}}</td>
                                        <td class="text-center">{{($store_booking_detail->store_inventory_details->sum('received_qty'))-($store_booking_detail->order_qty)}}</td>
                                        <td class="text-center">{{$store_booking_detail->store_inventory_details->sum('received_qty') - $store_booking_detail->store_requisition_details->sum('issued')}}</td>
                                        <td class="text-center">{{$store_booking_detail->fabric_roll + $store_booking_detail->store_inventory_details->sum('fab_roll')}}</td>
                                        <td class="text-center">{{$store_booking_detail->remarks}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;margin-left: 200px">
                        <div class="col-md-4 text-center">
                            <div style="border-top:solid 2px black;width: 25%">
                                <p>Prepared By <span></span></p>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <div style="border-top:solid 2px black;width: 25%">
                            <span>
                                Checked By <br>
                                Store Manager
                            </span>

                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <div style="border-top:solid 2px black;width: 25%">
                                <p>Merchandiser <span></span></p>
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
    
    

    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ url('public/plugins/datatables/dataTables.bootstrap4.css') }}"> --}}
@stop

@section('plugin')
    <!-- DataTables -->
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script> --}}
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script> --}}
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
@stop

@section('script')

    

    <!-- page script -->
    <script type="text/javascript">
        function print(id){  
            window.open('{{url("booking-report")}}/'+id+'/print','_blank');

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
                        pdfMake.createPdf(docDefinition).download("Booking_Report.pdf");
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
            test1 = test?test+'.xls':'Booking_Details.xls';

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
