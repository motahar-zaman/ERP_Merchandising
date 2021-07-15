@extends('layouts.fixed')

@section('title','Save-Item Inventory')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Item</li>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-info text-center">Add A Unit</h2><hr>
                            {!! Form::open(['method'=>'POST', 'class'=>'form-horizontal']) !!}
                            <div class="row">
                                @include('inventory.item.form-item')
                            </div>

                            <div class="form-group">
                                <div class="">
                                    {{ Form::submit('Save Item', ['class'=>'btn btn-success btn-block']) }}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="col-lg-6 table-responsive">

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>

                            @endif
                            @include('inventory.item.items')
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
    <!-- page script -->
    <script type="text/javascript">

        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").slideUp(1000, function(){
                    $(this).remove();
                });
            }, 1200);

        });
    </script>

@stop
