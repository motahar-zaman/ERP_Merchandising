
{{Form::label('company_name', 'Company Name', ['class'=>'label-control'])}}
<div class="form-group{{ $errors->has('from') ? 'has-error' : '' }}">
    {{ Form::text('company_name',null,['class'=>'form-control','placeholder'=>'']) }}
</div>
@if ($errors->has('company_name'))
    <p class="text-danger" id="success-alert">
        {{ $errors->first('company_name') }}
    </p>
@endif
<div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
    {{Form::label('address', 'Address', ['class'=>'label-control'])}}
    {{ Form::text('address',old('address'),['class'=>'form-control','placeholder'=>'']) }}

    @if ($errors->has('address'))
        <span class="text-danger">
                <p>{{ $errors->first('address') }}</p>
            </span>
    @endif
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
    {{Form::label('phone', 'Phone', ['class'=>'label-control'])}}
    {{ Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>'']) }}

    @if ($errors->has('phone'))
        <span class="text-danger">
                <p>{{ $errors->first('phone') }}</p>
            </span>
    @endif
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
    {{Form::label('email', 'Email', ['class'=>'label-control'])}}
    {{ Form::text('email',old('email'),['class'=>'form-control','placeholder'=>'']) }}

    @if ($errors->has('email'))
        <span class="text-danger">
                <p>{{ $errors->first('email') }}</p>
            </span>
    @endif
</div>
{{ Form::submit($submitButtonText,['class'=>'btn btn-info pull-right','style'=>'margin:0 auto']) }}