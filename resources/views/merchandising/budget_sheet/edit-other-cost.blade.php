{{--other cost for product cost sheet--}}
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Cutting & Making: ') }}
            {{ Form::number('cutting_marking',$cost_breakdown ? $cost_breakdown->cutting_marking : null,['class'=>'form-control ','placeholder'=>'Cutting & Marking']) }}
        </div>
    </div>
</div>
<br>
<div class="heading">
    <h1 style="background-color: #0c5460;text-align: center;color: white">Embroidery</h1>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Embroidery 1: ') }}
            {{ Form::number('embroidery',$cost_breakdown ? $cost_breakdown->embroidery : null,['class'=>'form-control ','placeholder'=>'Embroidery']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Embroidery 2: ') }}
            {{ Form::number('embroidery_2',$cost_breakdown ? $cost_breakdown->embroidery_2 : null,['class'=>'form-control ','placeholder'=>'Embroidery']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Embroidery 3: ') }}
            {{ Form::number('embroidery_3',$cost_breakdown ? $cost_breakdown->embroidery_3 : null,['class'=>'form-control ','placeholder'=>'Embroidery']) }}
        </div>
    </div>
</div>
<br>
<div class="heading">
    <h1 style="background-color: #0c5460;text-align: center;color: white">Printing</h1>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Printing 1: ') }}
            {{ Form::number('printing',$cost_breakdown ? $cost_breakdown->printing : null,['class'=>'form-control','placeholder'=>'Printing']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Printing 2: ') }}
            {{ Form::number('printing_2',$cost_breakdown ? $cost_breakdown->printing_2 : null,['class'=>'form-control','placeholder'=>'Printing']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Printing 3: ') }}
            {{ Form::number('printing_3',$cost_breakdown ? $cost_breakdown->printing_3 : null,['class'=>'form-control','placeholder'=>'Printing']) }}
        </div>
    </div>
</div>

<br>
<div class="heading">
    <h1 style="background-color: #0c5460;text-align: center;color: white">Washing</h1>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('',' Washing 1: ') }}
            {{ Form::number('washing',$cost_breakdown ? $cost_breakdown->washing : null,['class'=>'form-control','placeholder'=>'Washing']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('',' Washing 2: ') }}
            {{ Form::number('washing_2',$cost_breakdown ? $cost_breakdown->washing_2 : null,['class'=>'form-control','placeholder'=>'Washing']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('',' Washing 3: ') }}
            {{ Form::number('washing_3',$cost_breakdown ? $cost_breakdown->washing_3 : null,['class'=>'form-control','placeholder'=>'Washing']) }}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('',' Washing 4: ') }}
            {{ Form::number('washing_4',$cost_breakdown ? $cost_breakdown->washing_4 : null,['class'=>'form-control','placeholder'=>'Washing']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('',' Washing 5: ') }}
            {{ Form::number('washing_5',$cost_breakdown ? $cost_breakdown->washing_5 : null,['class'=>'form-control','placeholder'=>'Washing']) }}
        </div>
    </div>
</div>
<br>
<div class="heading">
    <h1 style="background-color: #0c5460;text-align: center;color: white">Others</h1>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Testing Charge : ') }}
            {{ Form::text('testing_charge',$cost_breakdown ? $cost_breakdown->testing_charge : null,['class'=>'form-control','placeholder'=>'Testing Charge']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Other Charge : ') }}
            {{ Form::number('other_charge',$cost_breakdown ? $cost_breakdown->other_charge : null,['class'=>'form-control ','placeholder'=>'Other Charge']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Financial/Commercial charge/Bank (Consider in %): ') }}
            {{ Form::number('consider',$cost_breakdown ? $cost_breakdown->consider : null,['class'=>'form-control ','placeholder'=>'Example : 6']) }}
        </div>
    </div>
</div>

<div class="col-md-12"></div>


{{-- Personal Hrm End --}}