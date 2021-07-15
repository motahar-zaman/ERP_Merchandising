
<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
        {{Form::label('', 'Item Code', ['class'=>'label-control'])}}
        {{ Form::text('code',old('code'),['class'=>'form-control','placeholder'=>'00015','autofocus','required','readonly']) }}

        @if ($errors->has('code'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{Form::label('details', 'Item Name', ['class'=>'label-control'])}}
        {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'1 No Amper Tube','autofocus','required']) }}

        @if ($errors->has('name'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>



<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{Form::label('', 'Department Name', ['class'=>'label-control'])}}
        {{ Form::select('name',[
        "1"=>"Well-Department 1",
        "2"=>"Well-Department 2",
        "3"=>"Well-Department 3",
        "4"=>"Swing",
        ],null,['class'=>'form-control','autofocus','required']) }}

        @if ($errors->has('name'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>




<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{Form::label('', 'Group Name', ['class'=>'label-control'])}}
        {{ Form::select('name',[
        "1"=>"Electrical",
        "2"=>"Hardware",
        "3"=>"Swing",
        ],null,['class'=>'form-control','autofocus','required']) }}

        @if ($errors->has('name'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>



<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{Form::label('', 'Unit Name', ['class'=>'label-control'])}}
        {{ Form::select('name',[
        "1"=>"PCS",
        "2"=>"SET",
        "3"=>"BOX",
        ],null,['class'=>'form-control','autofocus','required']) }}

        @if ($errors->has('name'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>



<div class="col-lg-6 col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{Form::label('', 'Price', ['class'=>'label-control'])}}
        {{ Form::text('price',null,['class'=>'form-control','autofocus','required','placeholder'=>'Ex. 120 tk']) }}

        @if ($errors->has('name'))
            <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>

