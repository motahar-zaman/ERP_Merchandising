
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <div class="form-group row {{ $errors->has('group_name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Group Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('group_name',null,['class'=>'form-control','placeholder'=>'Enter Name']) }}
            @if($errors->has('group_name'))<span class="help-block text-danger">{{ $errors->first('group_name') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
