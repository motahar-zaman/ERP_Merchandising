<div class="card-body">

    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Accessories Category <span class="text-danger">*</span></label>
        <div class="col-md-6">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
            @if($errors->has('name'))<span class="text-danger ">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
