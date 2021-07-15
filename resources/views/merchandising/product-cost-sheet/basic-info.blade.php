{{--basic info for product cost sheet--}}

<div class="row">

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('unit_id','Company Unit: ') }}
            {{ Form::select('unit_id',$repository->AllCompanyUnit(),$cost_breakdown ? $cost_breakdown->unit_id : '',['class'=>'form-control','placeholder'=>'Select Unit']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('country_id','Country: ') }}
            {{ Form::select('country_id',$repository->countries(),$cost_breakdown ? $cost_breakdown->country_id : '',['class'=>'form-control','placeholder'=>'Country']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Merchandiser : ') }}
            {{ Form::text('merchandiser_name',$cost_breakdown ? $cost_breakdown->merchandiser_name : '', ['class'=>'form-control ','placeholder'=>'Merchandiser']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Buyer: ') }}
            {{ Form::text('consumer_name',$cost_breakdown ? $cost_breakdown->consumer_name : '',['class'=>'form-control','placeholder'=>'Buyer Name']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Product Description : ') }}
            {{ Form::text('product_description',$cost_breakdown ? $cost_breakdown->product_description : '',['class'=>'form-control','placeholder'=>'Product Description  ']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Style: ') }}
            {{ Form::text('style',$cost_breakdown ? $cost_breakdown->style : '',['class'=>'form-control','placeholder'=>'Style']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Size Range : ') }}
            {{ Form::text('size_range',$cost_breakdown ? $cost_breakdown->size_range : '',['class'=>'form-control ','placeholder'=>'Size Range']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Specs: ') }}
            {{ Form::text('specs', $cost_breakdown ? $cost_breakdown->specs : null,['class'=>'form-control ','placeholder'=>'Specs']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Estimate Gmts Delivery : ') }}
            {{ Form::date('estimate_garments',$cost_breakdown ? $cost_breakdown->estimate_garments : null,['class'=>'form-control ','placeholder'=>'Estimate Gmts delivery']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('','Estimate Qty : ') }}
            {{ Form::number('estimate_qty',$cost_breakdown ? $cost_breakdown->estimate_qty : null,['class'=>'form-control ','placeholder'=>'Estimate Qty']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('quote_id','Select Price Quotation Type: ') }}
            {{ Form::select('quote_id',$repository->AllPriceQuote(),$cost_breakdown ? $cost_breakdown->quote_id : '',['class'=>'form-control','placeholder'=>'Select Type']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="from-group">
            {{ Form::label('payment_terms','Payment Terms : ') }}
            {{ Form::text('payment_terms',$cost_breakdown ? $cost_breakdown->payment_terms : null,['class'=>'form-control ','placeholder'=>'Payment Terms']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <br>
        <div class="from-group">
            {{ Form::label('','Sketch : ') }} &nbsp; &nbsp;&nbsp;
            @for($i=1;$i<=sizeof($repository->check_box());$i++)
                {{ Form::radio('has_sketch',$i,['class'=>'form-control']) }} {{ $repository->check_box()[$i] }}
            @endfor
        </div>
        <div class="from-group">
            {{ Form::label('','Size Ratio : ') }} &nbsp; &nbsp;
            @for($i=1;$i<=sizeof($repository->check_box());$i++)
                {{ Form::radio('has_size_ratio',$i,['class'=>'form-control']) }} {{ $repository->check_box()[$i] }}
            @endfor
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="form-group {{ $errors->has('front_image') ? 'has-error' : '' }}">
            {{ Form::label('front_image','Front Image:') }}
            {{ Form::file("front_image",['class'=>'form-control']) }}
            @if($errors->has("front_image"))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('front_image') }}
                    </strong>
            @endif
                </span>
        </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <br>
        <div class="form-group {{ $errors->has('back_image') ? 'has-error' : '' }}">
            {{ Form::label('back_image','Back Image:') }}
            {{ Form::file("back_image",['class'=>'form-control']) }}
            @if($errors->has("back_image"))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('back_image') }}
                    </strong>
                    @endif
                </span>
        </div>
    </div>
</div>
{{-- row end --}}