
<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
    {{Form::label('name', 'Name', ['class'=>'label-control'])}}
    {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'','required']) }}
    @if ($errors->has('name'))
        <p class="text-danger" id="success-alert">
            {{ $errors->first('name') }}
        </p>
    @endif
</div>

<div class="form-group{{ $errors->has('other_trim_category_id') ? 'has-error' : '' }}">
    {{Form::label('other_trim_category_id', 'Category', ['class'=>'label-control'])}}
    {{ Form::select('other_trim_category_id',$repository->otherTrimsCategory(),null,['class'=>'form-control populate select2','placeholder'=>'Select Category','required']) }}
    @if ($errors->has('other_trim_category_id'))
        <span class="text-danger">
                <p>{{ $errors->first('trims_category_id') }}</p>
            </span>
    @endif
</div>

<div class="form-group{{ $errors->has('product_unit_id') ? 'has-error' : '' }}">
    {{Form::label('product_unit_id', 'Unit', ['class'=>'label-control'])}}
    {{ Form::select('product_unit_id',$repository->productUnits(),null,['class'=>'form-control populate select2','placeholder'=>'Select Unit','required']) }}
    @if ($errors->has('product_unit_id'))
        <span class="text-danger">
                <p>{{ $errors->first('product_unit_id') }}</p>
            </span>
    @endif
</div>

<div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
    {{Form::label('description', 'Description', ['class'=>'label-control'])}}
    {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'','rows'=>5,'cols'=>5,'required']) }}

    @if ($errors->has('description'))
        <span class="text-danger">
                <p>{{ $errors->first('description') }}</p>
            </span>
    @endif
</div>
{{ Form::submit($submitButtonText,['class'=>'btn btn-info pull-right','style'=>'margin:0 auto']) }}


@section('script')
    <script>
        $('.select2').select2();
    </script>
@endsection