
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Unit Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Unit Name Here.']) }}
            @if($errors->has('name'))<span class="help-block text-danger">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
