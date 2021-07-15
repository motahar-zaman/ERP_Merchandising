<br><br>
<div class="row">
    <div class="col-lg-12 card">
        {{--START BY AHMED --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Fabric Content</th>
                    <th>Description</th>
                    <th>Fabric Type</th>
                    <th>Consumption</th>
                    <th>Unit</th>
                    <th>Unit Price </th>
                    <th>Total Price </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="door">
            {{--start 1 row --}}
            @if($cost_breakdown_fabric->count() >1)
                @foreach($cost_breakdown_fabric as $fabric)
                        <tr id="product{{$num}}">
                            <td>
                                <div class="form-group {{ $errors->has('supplier_id'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::select('supplier_id'.$num,$repository->suppliers(),$fabric->supplier_id,['id'=>'supplier_id'.$num,'class'=>'form-control select2','placeholder'=>'Select Supplier']) }}
                                    @if($errors->has('supplier_id'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('supplier_id'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('fabric_content1') ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('fabric_content'.$num,$fabric->fabric_content,['id'=>'fabric_content1','class'=>'form-control','placeholder'=>'Fabric Content']) }}

                                    @if($errors->has('fabric_content'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fabric_content'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('fabric_description'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('fabric_description'.$num,$fabric->fabric_description,['id'=>'fabric_description'.$num,'class'=>'form-control','placeholder'=>'Description']) }}
                                    @if($errors->has('fabric_description'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fabric_description'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('fabric_id'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::select('fabric_id'.$num,$repository->fabrics(),$fabric->fabric_id,['id'=>'fabric_id'.$num,'class'=>'form-control select2','placeholder'=>'Select Fabric']) }}
                                    @if($errors->has('fabric_id'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fabric_id'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('fabric_consumption'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('fabric_consumption'.$num,$fabric->fabric_consumption,['id'=>'fabric_consumption'.$num,'class'=>'form-control ','placeholder'=>'Consumption (mtr/yd/kg)']) }}
                                    @if($errors->has('fabric_consumption'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fabric_consumption'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('unit_id'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::select('unit_id'.$num,$repository->units(),$fabric ? $fabric->unit_id :null,['id'=>'unit_id'.$num,'class'=>'form-control ','placeholder'=>'Select Unit']) }}
                                    @if($errors->has('unit_id'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unit_id'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('unit_price'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('unit_price'.$num,$fabric->unit_price,['id'=>'unit_price'.$num,'class'=>'form-control','placeholder'=>'Unit Price/mtr  ']) }}
                                    @if($errors->has('unit_price'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unit_price'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('fabric_cost'.$num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('fabric_cost'.$num,$fabric->fabric_cost,['id'=>'fabric_cost'.$num,'class'=>'form-control','placeholder'=>'Appointed Trims Cost US$ With DZN ']) }}
                                    @if($errors->has('fabric_cost'.$num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fabric_cost'.$num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }} </td>
                        </tr>
                    @php ++$num; @endphp
                @endforeach
              @endif
            </tbody>
        </table>
    </div>


</div>{{-- row end --}}