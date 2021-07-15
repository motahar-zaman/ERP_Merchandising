
<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
    {{Form::label('name', 'Name', ['class'=>'label-control'])}}
    {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'']) }}

    @if ($errors->has('name'))
        <span class="text-danger">
                <p>{{ $errors->first('name') }}</p>
            </span>
    @endif
</div>


<div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
    {{Form::label('description', 'Description', ['class'=>'label-control'])}}
    {{ Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'','rows'=>5,'cols'=>5]) }}

    @if ($errors->has('description'))
        <span class="text-danger">
                <p>{{ $errors->first('description') }}</p>
            </span>
    @endif
</div>

{{ Form::submit('Save', ['class'=>'btn btn-info pull-right','style'=>'margin:0 auto']) }}