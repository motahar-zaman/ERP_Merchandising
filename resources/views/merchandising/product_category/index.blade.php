
@extends('layouts.fixed')
@section('title','Product Category')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" >
                    <h4 class=" text-dark" style="margin-left:30px">Manage  Product Category</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Merchandising</a></li>
                        <li class="breadcrumb-item active">Manage Product Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">
                    {{--create/edit start --}}
                    <div class="col-lg-4">
                        <div class=" bg-light">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="text-info"> Add Category </h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                <div class="card-body" style="display: block;">
                                    {{ Form::open(['action'=>'Merchandise\ProductCategoryController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
                                    @include('merchandising.product_category.form')
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--create/edit  start --}}

                    {{--list  start --}}
                    <div class="col-md-6 offset-md-1">
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-info text-center">Category list </h5>
                                </div>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                @include('merchandising.product_category.list')
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{--list end--}}
                </div>
            </div>
        </div>
    </section><!-- /.content -->
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
    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeOut(500, function(){
                    $(this).remove();
                });
            }, 1200);

        });

        //delete confirmation  message
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this ?');
            return !!x;
        }

        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@stop




