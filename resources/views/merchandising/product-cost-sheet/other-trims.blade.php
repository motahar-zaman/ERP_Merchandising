<br><br>
<div class="row">
    <div class="col-lg-12 card">
        {{--START BY Nishat --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Other Trims Name</th>
                    <th>Description</th>
                    <th>Required Quantity</th>
                    <th>Unit Price</th>
                    <th>Other Trim Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="door2">
            {{--start 1 row --}}

              <tr id="col1">
                  <td>
                      <div class="form-group {{ $errors->has('provider1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('provider1',$repository->suppliers(),$cost_breakdown_other_trim ? $cost_breakdown_other_trim->provider :null,['id'=>'provider1','class'=>'form-control','placeholder'=>'Select Supplier']) }}
                          @if($errors->has('provider1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('provider1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                  <td>
                      <div class="form-group {{ $errors->has('other_trim_id1') ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('other_trim_id1',$repository->otherTrims(),$cost_breakdown_other_trim ? $cost_breakdown_other_trim->other_trim_id :null,['id'=>'other_trim_id1','class'=>'form-control','placeholder'=>'Select Fabric']) }}
                          @if($errors->has('other_trim_id1'))
                              <span class="help-block">
                                <strong>{{ $errors->first('other_trim_id1') }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                    <td>
                        <div class="form-group {{ $errors->has('other_trim_description1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('other_trim_description1',$cost_breakdown_other_trim ? $cost_breakdown_other_trim->other_trim_description :null,['id'=>'other_trim_description1','class'=>'form-control','placeholder'=>'Description']) }}
                            @if($errors->has('other_trim_description1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('other_trim_description1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('qty1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('qty1',$cost_breakdown_other_trim ? $cost_breakdown_other_trim->qty :null,['id'=>'qty1','class'=>'form-control ','placeholder'=>'Required quantity']) }}
                            @if($errors->has('qty1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('qty1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('price1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('price1',$cost_breakdown_other_trim ? $cost_breakdown_other_trim->price :null,['id'=>'price1','class'=>'form-control','placeholder'=>'Unit Price/mtr  ']) }}
                            @if($errors->has('price1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('price1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('cost1') ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('cost1',$cost_breakdown_other_trim ? $cost_breakdown_other_trim->cost :null,['id'=>'cost1','class'=>'form-control last_salary','placeholder'=>'Appointed Trims Cost US$ With DZN ']) }}
                            @if($errors->has('cost1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('cost1') }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow2()']) }} </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>{{-- row end --}}