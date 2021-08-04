@extends('layouts.fixed')

@section('title','Order Lists')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Lists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Order lists</li>
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
                            <h3 class="card-title">Order List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover text-center">
                                <thead class="text-bold">
                                    <tr>
                                        <td>Style Name</td>
                                        <td>Order No</td>
                                        <td>Order Name</td>
                                        <td>Quantity</td>
                                        <td>Buyer</td>
                                        <td>Order date</td>
                                        <td>Delivery Date</td>
                                        <td>Left days</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <?php
                                            $start = strtotime($order->delivery_date);
                                            $end = strtotime(date('Y-m-d'));
                                            $days_between = ceil(abs($end - $start) / 86400);
                                            $orderDate = date('Y-m-d', strtotime($order->created_at));
                                        ?>
                                        <tr>
                                            <td class="pl-2"><a href='/order-details/{{$order->id}}'>{{$order->style_name}}</a></td>
                                            <td class="pl-2">{{$order->order_no}}</td>
                                            <td class="pl-2">{{$order->order_name}}</td>
                                            <td class="pl-2">{{$order->quantity}}</td>
                                            <td class="pl-2">{{$order->buyer_id}}</td>
                                            <td class="pl-2">{{$orderDate}}</td>
                                            <td class="pl-2">{{$order->delivery_date}}</td>
                                            <td class="pl-2">{{$days_between}}</td>
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
