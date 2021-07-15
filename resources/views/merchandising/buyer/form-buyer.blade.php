
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group row {{ $errors->has('buyer_code') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Buyer Code<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('buyer_code',null,['class'=>'form-control','placeholder'=>'Buyer Code']) }}
            @if($errors->has('buyer_code'))<span class="help-block text-danger">{{ $errors->first('buyer_code') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name']) }}
            @if($errors->has('name'))<span class="help-block text-danger">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">E-Mail<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email Address']) }}
            @if($errors->has('email'))<span class="help-block text-danger">{{ $errors->first('email') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
