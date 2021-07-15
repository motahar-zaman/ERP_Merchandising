@extends('layouts.fixed')
@section('title','Fabric Booking Report')
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
                        <li class="breadcrumb-item active">Fabric Booking Report</li>
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
                                <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
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
                    <div class="row">
                        <div class="col-md-10 text-center">
                            <h2>{{$fabric_bookings->unit_id != null ? $fabric_bookings->CompanyUnit->name : ''}}</h2>
                            <h4>Fabric Booking Report </h4>
                        </div>
                        {{--<div class="col-md-6 text-left">--}}

                        {{--</div>--}}

                        {{--<div class="col-md-6 text-right">--}}

                        {{--</div>--}}

                        <div class="col-lg-12" style="border-top: 2px solid #636363">
                            <table id="datatable_buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="line-height: .1">
                                <thead>
                                    <tr>
                                        <th colspan="3">Date</th>
                                        <td class="text-center">{{$fabric_bookings->date}}</td>
                                        <th colspan="3">From</th>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <td class="text-center" ></td>
                                        <th  colspan="3">{{$fabric_bookings->unit_id != null ? $fabric_bookings->CompanyUnit->name : ''}} </th>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">To</th>
                                        <td class="text-center">{{$fabric_bookings->to}}</td>
                                        <th colspan="3"> {{$fabric_bookings->unit_id != null ? $fabric_bookings->CompanyUnit->description : ''}}</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Attn</th>
                                        <td class="text-center">{{$fabric_bookings->attn}}</td>
                                        <th colspan="3"> {{$fabric_bookings->unit_id != null ? $fabric_bookings->CompanyUnit->phone : ''}} </th>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Sub</th>
                                        <td class="text-center">{{$fabric_bookings->sub}}</td>
                                        <th colspan="3">{{$fabric_bookings->unit_id != null ? $fabric_bookings->CompanyUnit->email : ''}} </th>
                                        <td class="text-center"></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th  class="text-center"> FABRIC </th>
                                        <th  class="text-center"> Color Name</th>
                                        <th  class="text-center">Gmnts Qty</th>
                                        <th  class="text-center">Consumption</th>
                                        <th  class="text-center">Req. Qty</th>
                                        <th  class="text-center">PERCENTAGE </th>
                                        <th colspan="2" class="text-center">BOOKING QTY.</th>
                                    </tr>

                                    @php
                                        $gmnts_qty_subtotal = 0;
                                        $req_qty_subtotal = 0;
                                        $book_qty_subtotal = 0;
                                    @endphp

                                    @foreach($fabric_bookings_details as $fabric_bookings_detail)
                                        <tr>
                                            <td class="text-center">{{$fabric_bookings_detail->fabric_name}}</td>
                                            <td class="text-center">{{$fabric_bookings_detail->color}}</td>
                                            <td class="text-center">{{$fabric_bookings_detail->gmnts_qty}}</td>
                                            <td class="text-center">{{$fabric_bookings_detail->consumption}}</td>
                                            <td class="text-center">{{$fabric_bookings_detail->req_qty}}</td>
                                            <td class="text-center">{{$fabric_bookings_detail->percentage}}</td>
                                            <td colspan="2" class="text-center">{{$fabric_bookings_detail->book_qty}}</td>

                                            @php $gmnts_qty_subtotal+=$fabric_bookings_detail->gmnts_qty; @endphp
                                            @php $req_qty_subtotal+=$fabric_bookings_detail->req_qty; @endphp
                                            @php $book_qty_subtotal+=$fabric_bookings_detail->book_qty; @endphp

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="8"></th>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-center"> Total Qty:</th>
                                        <td  class="text-center">{{$gmnts_qty_subtotal}}</td>
                                        <td  class="text-center"></td>
                                        <td  class="text-center">{{$req_qty_subtotal}}</td>
                                        <td  class="text-center"></td>
                                        <td colspan="2" class="text-center">{{$book_qty_subtotal}}</td>
                                    </tr>
                                </tfoot>
                            </table>
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
                var date = new Date();
                doc.text(90, 10, 'Fabric Booking');
                doc.autoTable({html: '#datatable_buttons',
                    theme : 'striped',
                    styles: {fontSize: 7}
                });
                doc.save('.Fabric_Booking');
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
            test1 = test?test+'.xls':'Fabric_Booking.xls';

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
