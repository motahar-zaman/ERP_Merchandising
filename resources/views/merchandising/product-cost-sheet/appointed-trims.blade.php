<br><br>
<div class="row">
    <div class="col-lg-12 card">
        {{--START BY AHMED --}}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Supplier</th>
                <th>Trims Items</th>
                <th>REF</th>
                <th>Color</th>
                <th>Description</th>
                <th>Required QTY</th>
                <th>Unit Price(US$)</th>
                <th>Total Price </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="door1">
            {{--start 1 row --}}

              <tr id="row1">
                  <td>
                      <div class="form-group {{ $errors->has('distributor1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('distributor1',$repository->suppliers(),$cost_breakdown_trim ? $cost_breakdown_trim->supplier_id :null,['id'=>'distributor1','class'=>'form-control','placeholder'=>'Select Supplier']) }}
                          @if($errors->has('distributor1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('distributor1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>
                    <td>
                        <div class="form-group {{ $errors->has('trim_id1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::select('trim_id1',$repository->trims(),$cost_breakdown_trim ? $cost_breakdown_trim->trim_id :null,['id'=>'trim_id1','class'=>'form-control','placeholder'=>'Select Trims']) }}

                            @if($errors->has('trim_id1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('trim_id1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('reference1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('reference1',$cost_breakdown_trim ? $cost_breakdown_trim->reference :null,['id'=>'reference1','class'=>'form-control address','placeholder'=>'']) }}
                            @if($errors->has('reference1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('reference1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                  <td>
                      <div class="form-group {{ $errors->has('color1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::text('color1',$cost_breakdown_trim ? $cost_breakdown_trim->color :null,['id'=>'color1','class'=>'form-control telNo','placeholder'=>'Color']) }}
                          @if($errors->has('color1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('color1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>


                    <td>
                        <div class="form-group {{ $errors->has('trims_description1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_description1',$cost_breakdown_trim ? $cost_breakdown_trim->trims_description :null,['id'=>'trims_description1','class'=>'form-control telNo','placeholder'=>'Ex. 52895']) }}
                            @if($errors->has('trims_description1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_description1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>


                    <td>
                        <div class="form-group {{ $errors->has('required_qty1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('required_qty1',$cost_breakdown_trim ? $cost_breakdown_trim->required_qty :null,['id'=>'required_qty1','class'=>'form-control ','placeholder'=>'Req. Qty']) }}
                            @if($errors->has('required_qty1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('required_qty1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('trims_price1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_price1',$cost_breakdown_trim ? $cost_breakdown_trim->trims_price :null,['id'=>'trims_price1','class'=>'form-control','placeholder'=>'Unit Price']) }}
                            @if($errors->has('trims_price1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_price1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('trims_cost1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_cost1',$cost_breakdown_trim ? $cost_breakdown_trim->trims_cost :null,['id'=>'trims_cost1','class'=>'form-control','placeholder'=>'Trim Cost']) }}
                            @if($errors->has('trims_cost1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_cost1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','onclick'=>'addRow1()']) }} </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>{{-- row end --}}