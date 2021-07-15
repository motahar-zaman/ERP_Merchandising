
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Supplier Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name']) }}
            @if($errors->has('name'))<span class="help-block text-danger">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="col-md-2 offset-1 control-label">Supplier E-Mail</label>
        <div class="col-md-8">
            {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email Address']) }}
            @if($errors->has('email'))<span class="help-block text-danger">{{ $errors->first('email') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Supplier Address</label>
        <div class="col-md-8">
            {{ Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Address']) }}
            @if($errors->has('address'))<span class="help-block text-danger">{{ $errors->first('address') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Supplier Phone</label>
        <div class="col-md-8">
            {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'Enter Phone']) }}
            @if($errors->has('phone'))<span class="help-block text-danger">{{ $errors->first('phone') }}</span>@endif
        </div>
    </div>
</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
