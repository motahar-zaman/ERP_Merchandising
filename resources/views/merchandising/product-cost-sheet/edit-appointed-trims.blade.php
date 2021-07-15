<br><br>
<div class="row">
    <div class="col-lg-12 card">
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
            @php
                $num= 0;
            @endphp
                @foreach($cost_breakdown_trim as $trim)
                    @php
                        $num++;
                    @endphp
              <tr id="row{{$num}}">
                  <td>
                      <div class="form-group {{ $errors->has('distributor'.$num) ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('distributor'.$num,$repository->suppliers(),$trim ? $trim->distributor :null,['id'=>'distributor'.$num,'class'=>'form-control select2','placeholder'=>'Select Supplier']) }}
                          @if($errors->has('distributor'.$num))
                              <span class="help-block">
                                <strong>{{ $errors->first('distributor'.$num) }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>
                    <td>
                        <div class="form-group {{ $errors->has('trim_id'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::select('trim_id'.$num,$repository->trims(),$trim ? $trim->trim_id :null,['id'=>'trim_id'.$num,'class'=>'form-control select2','placeholder'=>'Select Trims']) }}

                            @if($errors->has('trim_id'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('trim_id'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('reference'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('reference'.$num,$trim ? $trim->reference :null,['id'=>'reference'.$num,'class'=>'form-control address','placeholder'=>'']) }}
                            @if($errors->has('reference'.$trim_num))
                                <span class="help-block">
                                <strong>{{ $errors->first('reference'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                  <td>
                      <div class="form-group {{ $errors->has('color'.$num) ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::text('color'.$num,$trim ? $trim->color :null,['id'=>'color'.$num,'class'=>'form-control telNo','placeholder'=>'Color']) }}
                          @if($errors->has('color'.$num))
                              <span class="help-block">
                                <strong>{{ $errors->first('color'.$num) }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>


                    <td>
                        <div class="form-group {{ $errors->has('trims_description'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_description'.$num,$trim ? $trim->trims_description :null,['id'=>'trims_description'.$num,'class'=>'form-control telNo','placeholder'=>'Ex. 52895']) }}
                            @if($errors->has('trims_description'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_description'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>


                    <td>
                        <div class="form-group {{ $errors->has('required_qty'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('required_qty'.$num,$trim ? $trim->required_qty :null,['id'=>'required_qty'.$num,'class'=>'form-control ','placeholder'=>'Experience To']) }}
                            @if($errors->has('required_qty'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('required_qty'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('trims_price'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_price'.$num,$trim ? $trim->trims_price :null,['id'=>'trims_price'.$num,'class'=>'form-control','placeholder'=>'Ex. Leave Reason']) }}
                            @if($errors->has('trims_price'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_price'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('trims_cost'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('trims_cost'.$num,$trim ? $trim->trims_cost :null,['id'=>'trims_cost'.$num,'class'=>'form-control','placeholder'=>'Trim Cost']) }}
                            @if($errors->has('trims_cost'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('trims_cost'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','onclick'=>'addRow1()']) }} </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>{{-- row end --}}