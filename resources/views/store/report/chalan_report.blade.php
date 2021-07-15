@extends('layouts.fixed')
@section('title','Chalan Report')
@section('css')
    <style>
        .tab-content br{
            display: none;
        }
        .hidden{
            display: none;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chalan Wise Inventory Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chalan Wise Inventory Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        {{--<div class="container-fluid">--}}
        <div class="row">
            {{--                list start--}}
            <div class="col">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <h5 class="text-center">Search Report Using Chalan/Invoice No:</h5>
                        <br>
                        {{ Form::open(['route'=>'report.chalan','method'=>'get','enctype'=>'multipart/form-data','id'=>'report_cm']) }}
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 form-group">
                                <div class="input-group">
                                    {{ Form::select('inv_chalan',$all_chalan,null,['id'=>'inv_chalan','class'=>'form-control','placeholder'=>'Select Chalan']) }}
                                    ||
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 "></div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                @if(count($invoice)>0)
                <div class="col-lg-12">
                    <div class="form-row text-center">
                        <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                            <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                            <button id="cmd" class="btn btn-primary" data-toggle="tab">Pdf</button>
                            <a href="https://www.gmail.com" target="_blank" class="btn btn-warning">E-mail</a>
                            <button onclick="exportTableToExcel('datatable_buttons')" class="btn btn-secondary">Excel</button>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped table-hover" id="datatable_buttons">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Required Quantity</th>
                                <th>Invoice Quantity</th>
                                <th>Received Quantity</th>
                                <th>Short Quantity</th>
                                <th>Over Quantity</th>
                                <th>Fabric Roll</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($invoice as $list)
                            <tr>
                                <td>{{$list->item_name}}</td>
                                <td>{{$list->req_qty}}</td>
                                <td>{{$list->invoice_qty}}</td>
                                <td>{{$list->received_qty}}</td>
                                <td>{{$list->short_qty}}</td>
                                <td>{{$list->over_qty}}</td>
                                <td>{{$list->fab_roll}}</td>
                                <td>{{$list->remarks}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </section>
@endsection



@section('script')
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/jspdf.debug.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/mitubachi-normal.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/libs/faker.min.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://simonbengtsson.github.io/jsPDF-AutoTable/examples/examples.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#cmd').click(function () {
                var doc = new jsPDF();
                var date = new Date();
                doc.text(90, 10, 'Export CM');
                doc.autoTable({html: '#datatable_buttons',
                    theme : 'striped',
                    styles: {fontSize: 7}
                });
                doc.save('.export_cm');
            });
        });
    </script>
@stop