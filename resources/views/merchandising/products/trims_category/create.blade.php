@extends('layouts.fixed')
@section('title','Create Trims Category')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            {{--<div class="row mb-2 pull-right">--}}
                {{--show clock by ahmed--}}
                {{--<div id="showClock" class="bg-dark badge badge-info p-2" style="font-size: 18px;"></div>--}}
            {{--</div>--}}


        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Trims Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">

            <div class="card"><br>
                <div class="card-body">

                    {{-- start showin gsuccess message --}}
                    <div class="col-md-4">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    {{-- end showin gsuccess message --}}

                    <div class="row">
                        @can('merchandiser')
                        <div class="col-lg-4">
                            <h5>Add Trims Category</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    {{ Form::model($trimsCategory= new \App\TrimsCategory,['action'=>'Inventory\TrimsCategoryController@store','method'=>'POST', 'class'=>'form-horizontal']) }}
                                    @include('merchandising.products.trims_category.form')
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            {{--load list data --}}
                            @include('merchandising.products.trims_category.list')
                        </div>
                        @endcan
                        @can('planning')
                        <div class="col-lg-12">
                            {{--load list data --}}
                            @include('merchandising.products.trims_category.list')
                        </div>
                        @endcan
                    </div>
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
    </script>
@stop