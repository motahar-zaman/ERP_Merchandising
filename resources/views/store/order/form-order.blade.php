
<div class="card-body">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row {{ $errors->has('order_no') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Order No.<span class="text-danger">*</span></label>
                <div class="col-md-8">
                    {{ Form::text('order_no',null,['class'=>'form-control','placeholder'=>'Order No:']) }}
                    @if($errors->has('order_no'))<span class="help-block text-danger">{{ $errors->first('order_no') }}</span>@endif
                </div>
            </div>

            <div class="form-group row {{ $errors->has('style_no') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Style No.<span class="text-danger">*</span></label>
                <div class="col-md-8">
                    {{ Form::text('style_no',null,['class'=>'form-control','placeholder'=>'Style No:']) }}
                    @if($errors->has('style_no'))<span class="help-block text-danger">{{ $errors->first('style_no') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('order_date') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Order Date</label>
                <div class="col-md-8">
                    {{ Form::date('order_date',null,['class'=>'form-control','placeholder'=>'Order Date.']) }}
                    @if($errors->has('order_date'))<span class="help-block text-danger">{{ $errors->first('order_date') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('shipment_date') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Shipment Date</label>
                <div class="col-md-8">
                    {{ Form::date('shipment_date',null,['class'=>'form-control','placeholder'=>'Shipment Date.']) }}
                    @if($errors->has('shipment_date'))<span class="help-block text-danger">{{ $errors->first('shipment_date') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('size_range') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Size Range</label>
                <div class="col-md-8">
                    {{ Form::text('size_range',null,['class'=>'form-control','placeholder'=>'Size Range Here.']) }}
                    @if($errors->has('size_range'))<span class="help-block text-danger">{{ $errors->first('size_range') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Unit Price</label>
                <div class="col-md-8">
                    {{ Form::text('unit_price',null,['id'=>'unit_price','class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'Unit Price Here.']) }}
                    @if($errors->has('unit_price'))<span class="help-block text-danger">{{ $errors->first('unit_price') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('order_qty') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Order Qty.</label>
                <div class="col-md-8">
                    {{ Form::text('order_qty',null,['id'=>'ord_qty','class'=>'form-control','onKeyup'=>'qty_calculate()','placeholder'=>'Order Qty.']) }}
                    @if($errors->has('order_qty'))<span class="help-block text-danger">{{ $errors->first('order_qty') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('order_value') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Order Value</label>
                <div class="col-md-8">
                    {{ Form::text('order_value',null,['id'=>'ord_value','class'=>'form-control','placeholder'=>'Order Value Here.']) }}
                    @if($errors->has('order_value'))<span class="help-block text-danger">{{ $errors->first('order_value') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('price_curr') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Price Currency</label>
                <div class="col-md-8">
                    {{ Form::text('price_curr',null,['class'=>'form-control','placeholder'=>'Price Currency Here.']) }}
                    @if($errors->has('price_curr'))<span class="help-block text-danger">{{ $errors->first('price_curr') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('buyer') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Buyer Name</label>
                <div class="col-md-8">
                    {{ Form::select('buyer',$buyer_list,null,['class'=>'form-control','placeholder'=>'Select Buyer']) }}
                    @if($errors->has('buyer'))<span class="help-block text-danger">{{ $errors->first('buyer') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('merchandiser') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Merchandiser Name</label>
                <div class="col-md-8">
                    {{ Form::select('merchandiser',$merchandiser_list,null,['class'=>'form-control select_multiple','placeholder'=>'Select Merchandiser']) }}
                    @if($errors->has('merchandiser'))<span class="help-block text-danger">{{ $errors->first('merchandiser') }}</span>@endif
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group row {{ $errors->has('item_desc') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Item Description</label>
                <div class="col-md-8">
                    {{ Form::text('item_desc',null,['class'=>'form-control','placeholder'=>'Item Description Here.']) }}
                    @if($errors->has('item_desc'))<span class="help-block text-danger">{{ $errors->first('item_desc') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('shell_fabric') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Shell Fabric</label>
                <div class="col-md-8">
                    {{ Form::text('shell_fabric',null,['class'=>'form-control','placeholder'=>'Shell Fabric Here.']) }}
                    @if($errors->has('shell_fabric'))<span class="help-block text-danger">{{ $errors->first('shell_fabric') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('master_lc_no') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Master L/C No.</label>
                <div class="col-md-8">
                    {{ Form::text('master_lc_no',null,['class'=>'form-control','placeholder'=>'Master LC No Here.']) }}
                    @if($errors->has('master_lc_no'))<span class="help-block text-danger">{{ $errors->first('master_lc_no') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('master_lc_date') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Master L/C Date</label>
                <div class="col-md-8">
                    {{ Form::date('master_lc_date',null,['class'=>'form-control','placeholder'=>'Master L/C Date Here.']) }}
                    @if($errors->has('master_lc_date'))<span class="help-block text-danger">{{ $errors->first('master_lc_date') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('wash_type') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Wash Type</label>
                <div class="col-md-8">
                    {{ Form::text('wash_type',null,['class'=>'form-control','placeholder'=>'Wash Type Here.']) }}
                    @if($errors->has('wash_type'))<span class="help-block text-danger">{{ $errors->first('wash_type') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('embroidery') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Embroidery</label>
                <div class="col-md-8">
                    {{ Form::text('embroidery',null,['class'=>'form-control','placeholder'=>'Embroidery Here.']) }}
                    @if($errors->has('embroidery'))<span class="help-block text-danger">{{ $errors->first('embroidery') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('printing') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Printing</label>
                <div class="col-md-8">
                    {{ Form::text('printing',null,['class'=>'form-control','placeholder'=>'Printing Here.']) }}
                    @if($errors->has('printing'))<span class="help-block text-danger">{{ $errors->first('printing') }}</span>@endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('remarks') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 offset-1 control-label">Remarks</label>
                <div class="col-md-8">
                    {{ Form::textarea('remarks',null,['class'=>'form-control','placeholder'=>'Remarks Here.']) }}
                    @if($errors->has('remarks'))<span class="help-block text-danger">{{ $errors->first('remarks') }}</span>@endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-center">
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {{Form::reset('Reset',['class'=>'btn btn-danger'])}}
</div>

<script>
    function qty_calculate(){
        var unit_price = document.getElementById('unit_price').value;
        var ord_qty = document.getElementById('ord_qty').value;
        var result = document.getElementById('ord_value');
        var myResult = unit_price * ord_qty;
        result.value = myResult;
    }
</script>
