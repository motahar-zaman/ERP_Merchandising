@extends('layouts.fixed')

@section('title','Zipper Booking Report')
<style>
    .sig-hr{
        font-size: 20px;
        font-weight: 600;
        padding: 5px;
        width: 280px;
        border-top: 2px dotted #000000;
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-center">
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Zipper Booking Report</li>
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
                            <h2>{{$zipper_bookings->unit_id != null ? $zipper_bookings->CompanyUnit->name : ''}}</h2>
                            <h4>Zipper Booking Report </h4>
                        </div>
                        <div class="col-md-6 text-left">

                        </div>

                        <div class="col-md-6 text-right">

                        </div>

                        <div class="col-lg-12" style="border-top: 2px solid #636363">
                            <table id="datatable_buttons" class="table table-hover table-bordered" style="line-height: .1">
                                <thead>
                                    <tr>
                                        <th colspan="3">Date</th>
                                        <td class="text-center">{{$zipper_bookings->date}}</td>
                                        <th colspan="3">From</th>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <td class="text-center" ></td>
                                        <th  colspan="3">Well Fashion Ltd(Unit 2) </th>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">To</th>
                                        <td class="text-center">{{$zipper_bookings->to}}</td>
                                        <th colspan="3"> A-6(part),7-8(part),BSCIC Industrial State </th>
                                        <th class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Attn</th>
                                        <td class="text-center">{{$zipper_bookings->attn}}</td>
                                        <th colspan="3"> Kalurghat,Chittagong-4000,Bangladesh </th>
                                        <td class="text-center"></td>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<th colspan="3"></th>--}}
                                        {{--<td class="text-center"></td>--}}
                                        {{--<th colspan="3">Phone #88-031-671604,671173,672572, Fax: 88-031-671989 </th>--}}
                                        {{--<td class="text-center"></td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <th colspan="3">Sub</th>
                                        <td class="text-center">{{$zipper_bookings->sub}}</td>
                                        <th colspan="3">nazrul@wellgroupbd.com </th>
                                        <td class="text-center"></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th  class="text-center"> Size  </th>
                                        <th  class="text-center"> Zipper Tape Color </th>
                                        <th  class="text-center"> Color Code</th>
                                        <th  class="text-center"> Zipper Length</th>
                                        <th  class="text-center">Gmnts Qty</th>
                                        <th  class="text-center">Percentage</th>
                                        <th colspan="2"  class="text-center"> Booking Qty.</th>
                                    </tr>
                                    @php
                                        $gmnts_qty_subtotal = 0;
                                        $book_qty_subtotal = 0;
                                    @endphp
                                    @foreach($zipper_booking_details as $zipper_booking_detail)
                                        <tr>
                                            <td class="text-center">{{$zipper_booking_detail->size}}</td>
                                            <td class="text-center">{{$zipper_booking_detail->tape_color}}</td>
                                            <td class="text-center">{{$zipper_booking_detail->color_code}}</td>
                                            <td class="text-center">{{$zipper_booking_detail->length}}</td>
                                            <td class="text-center">{{$zipper_booking_detail->gmnts_qty}}</td>
                                            <td class="text-center">{{$zipper_booking_detail->percentage}}</td>
                                            <td colspan="2" class="text-center">{{$zipper_booking_detail->gmnts_qty}}</td>

                                            @php $gmnts_qty_subtotal+=$zipper_booking_detail->gmnts_qty; @endphp
                                            @php $book_qty_subtotal+=$zipper_booking_detail->gmnts_qty; @endphp
                                        </tr>
                                    @endforeach
                                    {{--@php $trim_subtotal+=$trim->trims_cost; @endphp--}}
                                    <tr>
                                        <th colspan="8"></th>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-center"> Total Qty:</th>
                                        <td  class="text-center">{{$gmnts_qty_subtotal}}</td>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/jspdf.debug.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/mitubachi-normal.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/faker.min.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/examples.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('#cmd').click(function () {
                var doc = new jsPDF();
                var date = new Date();
                doc.text(90, 10, 'Zipper Booking');
                doc.autoTable({html: '#datatable_buttons',
                    theme : 'striped',
                    styles: {fontSize: 7}
                });
                doc.save('.Zipper_Booking');
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
            test1 = test?test+'.xls':'Zipper_Booking.xls';

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
