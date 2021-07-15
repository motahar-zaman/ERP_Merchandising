<div class="card-body">

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="phone" class="col-md-2 offset-1 control-label">Name <span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
            @if($errors->has('name'))<span class="text-danger ">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}">
        <label for="phone" class="col-md-2 offset-1 control-label">Phone</label>
        <div class="col-md-8">
            {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone']) }}
            @if($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="col-md-2 offset-1 control-label">Email<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
            @if($errors->has('email'))<span class="help-block text-danger">{{ $errors->first('email') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
        <label for="address" class="col-md-2 offset-1 control-label">Address</label>
        <div class="col-md-8">
            {{ Form::textarea('address',null,['class'=>'form-control','placeholder'=>'Address']) }}
            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}

</div>
