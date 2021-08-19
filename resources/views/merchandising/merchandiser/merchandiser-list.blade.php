@extends('layouts.fixed')

@section('title',' Lists')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Merchandiser Lists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Merchandiser</li>
                        <li class="breadcrumb-item active">Merchandiser lists</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="col-12">
            <div class="card"><br>
                <div class="row justify-content-center">
                    <div class="card-info" style="width:95%">
                        <div class="card-header">
                            <h3 class="card-title">Merchandiser List</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="text-bold">
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone no</td>
                                        <td>Designation</td>
                                        <td>Remarks</td>
                                        <td>Created</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($merchandisers as $merchandiser)
                                        <?php
                                            $created = date('d-m-Y', strtotime($merchandiser->created_at));
                                        ?>
                                        <tr>
                                            <td class="pl-2">{{$merchandiser->name}}</a></td>
                                            <td class="pl-2">{{$merchandiser->email}}</td>
                                            <td class="pl-2">{{$merchandiser->phone_no}}</td>
                                            <td class="pl-2">{{$merchandiser->designation}}</td>
                                            <td class="pl-2">{{$merchandiser->remarks}}</td>
                                            <td class="pl-2">{{$created}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <script>
        $(document).ready(function(){
        });
    </script>
@stop
