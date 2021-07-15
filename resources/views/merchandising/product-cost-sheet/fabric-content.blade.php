<br><br>
<div class="row">
    <div class="col-lg-12 card">
        {{--START BY AHMED --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Fabric Content</th>
                    <th>Fabric Width</th>
                    <th>Fabric Weight</th>
                    <th>Description</th>
                    <th>Fabric Type</th>
                    <th>Consumption</th>
                    <th>Unit</th>
                    <th>Unit Price </th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="door">
            {{--start 1 row --}}

              <tr id="product1">
                  <td>
                      <div class="form-group {{ $errors->has('supplier_id1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('supplier_id1',$repository->suppliers(),$cost_breakdown_fabric ? $cost_breakdown_fabric->supplier_id :null,['id'=>'supplier_id1','class'=>'form-control','placeholder'=>'Select Supplier']) }}
                          @if($errors->has('supplier_id1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('supplier_id1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>
                    {{--{{dd($cost_breakdown_fabric)}}--}}
                    <td>
                        <div class="form-group {{ $errors->has('fabric_content1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('fabric_content1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_content :null,['id'=>'fabric_content1','class'=>'form-control','style'=>'height:70px;width:325px','placeholder'=>'Fabric Content']) }}

                            @if($errors->has('fabric_content1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('fabric_content1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                  <td>
                      <div class="form-group {{ $errors->has('fabric_width1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::text('fabric_width1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_width :null,['id'=>'fabric_width1','class'=>'form-control','placeholder'=>'Fabric Width']) }}

                          @if($errors->has('fabric_width1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('fabric_width1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                  <td>
                      <div class="form-group {{ $errors->has('fabric_weight1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::text('fabric_weight1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_weight :null,['id'=>'fabric_weight1','class'=>'form-control','placeholder'=>'Fabric Weight']) }}

                          @if($errors->has('fabric_weight1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('fabric_weight1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                    <td>
                        <div class="form-group {{ $errors->has('fabric_description1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('fabric_description1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_content :null,['id'=>'fabric_description1','class'=>'form-control','placeholder'=>'Description']) }}
                            @if($errors->has('fabric_description1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('fabric_description1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('fabric_id1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::select('fabric_id1',$repository->fabrics(),$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_id :null,['id'=>'fabric_id1','class'=>'form-control','placeholder'=>'Select Fabric']) }}
                            @if($errors->has('fabric_id1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('fabric_id1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('fabric_consumption1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('fabric_consumption1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_consumption :null,['id'=>'fabric_consumption1','class'=>'form-control ','placeholder'=>'Consumption (mtr/yd/kg)']) }}
                            @if($errors->has('fabric_consumption1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('fabric_consumption1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                  <td>
                      <div class="form-group {{ $errors->has('unit_id1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('unit_id1',$repository->units(),$cost_breakdown_fabric ? $cost_breakdown_fabric->unit_id :null,['id'=>'unit_id1','class'=>'form-control','placeholder'=>'Select Unit']) }}
                          @if($errors->has('unit_id1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('unit_id1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                    <td>
                        <div class="form-group {{ $errors->has('unit_price1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('unit_price1',$cost_breakdown_fabric ? $cost_breakdown_fabric->unit_price :null,['id'=>'unit_price1','class'=>'form-control','placeholder'=>'Unit Price/mtr  ']) }}
                            @if($errors->has('unit_price'))
                                <span class="help-block">
                                <strong>{{ $errors->first('unit_price1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('fabric_cost1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('fabric_cost1',$cost_breakdown_fabric ? $cost_breakdown_fabric->fabric_cost :null,['id'=>'fabric_cost1','class'=>'form-control last_salary','placeholder'=>'Appointed Trims Cost US$ With DZN ']) }}
                            @if($errors->has('fabric_cost1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('fabric_cost1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow()']) }} </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>{{-- row end --}}