@extends('layouts.fixed')

@section('title','WELL-GROUP | Create Holiday')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Create Holiday</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <h2><a class="btn btn-info" href="{{ url('line-loading-plan/holidays') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;All Holidays</a></h2>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{ Form::open(['action'=>'Planning\HolidayController@store','method'=>'POST','id'=>'form', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="from-group">
                                        {{ Form::label('','Date: ') }}
                                        <input type="date" id="date" name="date" class="form-control">
                                        @if($errors->has('date'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="col-md-1 btn btn-success">Save</button>
            </div>
        </div>
    </div>
    <br>
    {{ Form::close() }}

@endsection

@section('script')

@endsection