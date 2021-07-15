
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{--<div class="form-group row {{ $errors->has('merchandiser_id') ? 'has-error' : '' }}">--}}
        {{--<label for="name" class="col-md-2 offset-1 control-label">Merchandiser Id<span class="text-danger">*</span></label>--}}
        {{--<div class="col-md-8">--}}
            {{--{{ Form::text('merchandiser_id',null,['class'=>'form-control','placeholder'=>'Merchandiser ID:']) }}--}}
            {{--@if($errors->has('merchandiser_id'))<span class="help-block text-danger">{{ $errors->first('merchandiser_id') }}</span>@endif--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="form-group row {{ $errors->has('merchandiser_name') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Name<span class="text-danger">*</span></label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_name',null,['class'=>'form-control','placeholder'=>'Enter Name']) }}
            @if($errors->has('merchandiser_name'))<span class="help-block text-danger">{{ $errors->first('merchandiser_name') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('merchandiser_address') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Address</label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_address',null,['class'=>'form-control','placeholder'=>'Enter Address']) }}
            @if($errors->has('merchandiser_address'))<span class="help-block text-danger">{{ $errors->first('merchandiser_address') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('merchandiser_phone') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Phone</label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_phone',null,['class'=>'form-control','placeholder'=>'Enter Phone']) }}
            @if($errors->has('merchandiser_phone'))<span class="help-block text-danger">{{ $errors->first('merchandiser_phone') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('merchandiser_mobile') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Mobile</label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_mobile',null,['class'=>'form-control','placeholder'=>'Enter Mobile No.']) }}
            @if($errors->has('merchandiser_mobile'))<span class="help-block text-danger">{{ $errors->first('merchandiser_mobile') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('merchandiser_fax') ? 'has-error' : '' }}">
        <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Fax</label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_fax',null,['class'=>'form-control','placeholder'=>'Enter Fax No.']) }}
            @if($errors->has('merchandiser_fax'))<span class="help-block text-danger">{{ $errors->first('merchandiser_fax') }}</span>@endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('merchandiser_email') ? 'has-error' : '' }}">
        <label for="email" class="col-md-2 offset-1 control-label">Merchandiser E-Mail</label>
        <div class="col-md-8">
            {{ Form::text('merchandiser_email',null,['class'=>'form-control','placeholder'=>'Enter Email Address']) }}
            @if($errors->has('merchandiser_email'))<span class="help-block text-danger">{{ $errors->first('merchandiser_email') }}</span>@endif
        </div>
    </div>

</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>
