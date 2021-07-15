@extends('layouts.fixed')

@section('title','WELL-GROUP | Edit Holiday')

@section('content')
<script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="margin-left: 20px"><b>Edit Holiday</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <h2><a class="btn btn-info" href="{{ url('line-loading-plan/holidays') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;All Holidays</a></h2>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <form method="post" action="{{ route('holidays.update', $holiday->id) }}" class="form-horizontal" id="form">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
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
                                        {{ Form::date('date',$holiday->date,['id'=>'date','class'=>'form-control','placeholder'=>'Input Date']) }}
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
                <button type="submit" class="col-md-1 btn btn-success">Update</button>
            </div>
        </div>
    </div>
    <br>
    </form>

@endsection

@section('script')

@endsection