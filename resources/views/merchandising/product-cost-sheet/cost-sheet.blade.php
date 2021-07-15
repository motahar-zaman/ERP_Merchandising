@extends('layouts.fixed')

@section('title','WELL-GROUP | COST BREAKDOWN SHEET')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Cost Breakdown Sheet</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><b>Cost Sheet</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
<section class="content">
    <div class="col-lg-12">
        <div class="card"><br>
            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#basic_info" data-toggle="tab" style="font-weight: bold;"><b>Basic Info</b></a></li>
                                <li class="nav-item"><a class="nav-link" href="#fabric_content" data-toggle="tab" style="font-weight: bold;"><b>Fabric Information</b></a></li>
                                <li class="nav-item"><a class="nav-link" href="#appointed_trims" data-toggle="tab" style="font-weight: bold;"><b>Appointed Trims & Accessories</b></a></li>
                                <li class="nav-item"><a class="nav-link" href="#other_trims" data-toggle="tab" style="font-weight: bold;"><b>Packaging Trims</b></a></li>
                                <li class="nav-item"><a class="nav-link" href="#other_cost" data-toggle="tab" style="font-weight: bold;"><b>Other Cost</b></a></li>
                            </ul>
                        </div>

                        {{ Form::open(['action'=>'Merchandise\ProductCostSheetController@store','method'=>'POST', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="card-body">
                            {{-- <ul>
                                @php $i=0; @endphp
                                @foreach($errors->all() as $error)
                                        <li> {{ ++$i }} <span class="has-error"><strong> {{ $error }} </strong></span></li>
                                @endforeach
                            </ul> --}}
                            <div class="tab-content">
                                <div class="tab-pane active" id="basic_info">
                                   @include('merchandising.product-cost-sheet.basic-info')
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="fabric_content">
                                    @include('merchandising.product-cost-sheet.fabric-content')
                                </div>

                                {{--//Start short-course-information added by Ahmed--}}
                                <div class="tab-pane" id="appointed_trims">
                                    @include('merchandising.product-cost-sheet.appointed-trims')
                                </div>
                                <!-- /.end short-course-information  -->

                                {{--//Start short-course-information added by Ahmed--}}
                                <div class="tab-pane" id="other_trims">
                                    @include('merchandising.product-cost-sheet.other-trims')
                                </div>
                                <!-- /.end short-course-information  -->

                                {{--//Start short-course-information added by Ahmed--}}
                                <div class="tab-pane" id="other_cost">
                                    @include('merchandising.product-cost-sheet.other-cost')
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                                    <div class="form-group">
                                        {{ Form::button('SAVE ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
                                    </div>
                                </div>
                                <!-- /.end short-course-information  -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>


                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</section>&nbsp;
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@stop

    @section('css')
        <style>
            .loader {
                position: absolute;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>

    @endsection

@section('script')
    <!-- page script -->
    <script type="text/javascript">

        $('body').on('keydown', 'input, select, textarea', function(e) {
            var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
            ;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });

//        $(document).on("click","#add_more",function () {
////            $("select").select2();
//            var clone = $(this).closest('tr').clone(true).insertAfter( $(this).closest('tr'));
//
//        });

        $(document).on("click","#remove",function () {
            $(this).parent().parent().remove();
        });
    </script>

    <script>
        // Add new row
        function addRow(){
            // get the last DIV which ID starts with ^= "product"
            var $div = $('tr[id^="product"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;


            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'product'+num);

            $('select[id^="supplier_id"]:last').prop('id','supplier_id'+num).prop('name','supplier_id'+num);
            $('input[id^="fabric_content"]:last').prop('id','fabric_content'+num).prop('name','fabric_content'+num);
            $('input[id^="fabric_width"]:last').prop('id','fabric_width'+num).prop('name','fabric_width'+num);
            $('input[id^="fabric_weight"]:last').prop('id','fabric_weight'+num).prop('name','fabric_weight'+num);
            $('input[id^="fabric_description"]:last').prop('id','fabric_description'+num).prop('name','fabric_description'+num);
            $('select[id^="fabric_id"]:last').prop('id','fabric_id'+num).prop('name','fabric_id'+num);
            $('input[id^="fabric_consumption"]:last').prop('id','fabric_consumption'+num).prop('name','fabric_consumption'+num);
            $('select[id^="unit_id"]:last').prop('id','unit_id'+num).prop('name','unit_id'+num);
            $('input[id^="unit_price"]:last').prop('id','unit_price'+num).prop('name','unit_price'+num);
            $('input[id^="fabric_cost"]:last').prop('id','fabric_cost'+num).prop('name','fabric_cost'+num);
            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
            $('#supplier_id'+num).last().next().next().remove();
            $('#fabric_id'+num).last().next().next().remove();
            $('#unit_id'+num).last().next().next().remove();

            $klon.appendTo($("#door"));

        }


        // Add new row
        function addRow1(){
            // get the last DIV which ID starts with ^= "row"
            var $div = $('tr[id^="row"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'row'+num);
            $('select[id^="distributor"]:last').prop('id','distributor'+num).prop('name','distributor'+num);
            $('select[id^="trim_id"]:last').prop('id','trim_id'+num).prop('name','trim_id'+num);
            $('input[id^="reference"]:last').prop('id','reference'+num).prop('name','reference'+num);
            $('input[id^="color"]:last').prop('id','color'+num).prop('name','color'+num);
            $('input[id^="trims_description"]:last').prop('id','trims_description'+num).prop('name','trims_description'+num);
            $('input[id^="trims_price"]:last').prop('id','trims_price'+num).prop('name','trims_price'+num);
            $('input[id^="trims_cost"]:last').prop('id','trims_cost'+num).prop('name','trims_cost'+num);
            $('input[id^="required_qty"]:last').prop('id','required_qty'+num).prop('name','required_qty'+num);
//            dd(input id = '5%');
            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
            $('#distributor'+num).last().next().next().remove();
            $('#trim_id'+num).last().next().next().remove();

            $klon.appendTo($("#door1"));

        }

        // Add new row
        function addRow2(){
            // get the last DIV which ID starts with ^= "row"
            var $div = $('tr[id^="col"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "product3")
            // And increment that number by 1
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            // Clone it and assign the new ID (i.e: from num 4 to ID "product4")
            var $klon = $div.clone().prop('id', 'col'+num);
            $('select[id^="provider"]:last').prop('id','provider'+num).prop('name','provider'+num);
            $('select[id^="other_trim_id"]:last').prop('id','other_trim_id'+num).prop('name','other_trim_id'+num);
            $('input[id^="other_trim_description"]:last').prop('id','other_trim_description'+num).prop('name','other_trim_description'+num);
            $('input[id^="qty"]:last').prop('id','qty'+num).prop('name','qty'+num);
            $('input[id^="price"]:last').prop('id','price'+num).prop('name','price'+num);
            $('input[id^="cost"]:last').prop('id','cost'+num).prop('name','cost'+num);
            // >>> Append $klon wherever you want

//            $("supplier_id1").select2({placeholder:"Select Supplier"});
            $('#provider'+num).last().next().next().remove();
            $('#other_trim_id'+num).last().next().next().remove();

            $klon.appendTo($("#door2"));

        }

    </script>

    <script>
        var global1=global2=global3=global4=global5=global6=0;
        var data = '';
            $(document).on("keyup","input",function () {

                var id;
                data = $(this).attr("id");
                id = data.slice(-1);
                global1 = $("#fabric_consumption"+id).val();
//                alert(global1);
                global2 = $("#unit_price"+id).val();
                global3 = $("#required_qty"+id).val();
                global4 = $("#trims_price"+id).val();
                global5 = $("#qty"+id).val();
                global6 = $("#price"+id).val();
                $('#fabric_cost'+id).val(global1*global2);
                $('#trims_cost'+id).val(global3*global4);
                $('#cost'+id).val(global5*global6);
            });



    </script>



@stop
