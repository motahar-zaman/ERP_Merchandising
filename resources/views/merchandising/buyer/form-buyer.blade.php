
<div class="card-body">
    <div class="form-group row {{ $errors->has('buyer_code') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Buyer Code<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('buyer_code',null,['class'=>'form-control','placeholder'=>'Buyer Code']) }}
            @if($errors->has('buyer_code'))<span class="help-block text-danger">{{ $errors->first('buyer_code') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name']) }}
            @if($errors->has('name'))<span class="help-block text-danger">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Contract no<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'Enter Contract No']) }}
            @if($errors->has('phone'))<span class="help-block text-danger">{{ $errors->first('phone') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">E-Mail<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email Address']) }}
            @if($errors->has('email'))<span class="help-block text-danger">{{ $errors->first('email') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Contract Address<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Contract Address']) }}
            @if($errors->has('address'))<span class="help-block text-danger">{{ $errors->first('address') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('bank_details') ? 'has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Bank Details<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('bank_details',null,['class'=>'form-control','placeholder'=>'Enter Bank Details']) }}
            @if($errors->has('bank_details'))<span class="help-block text-danger">{{ $errors->first('bank_details') }}</span>@endif
        </div>
    </div>
</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
