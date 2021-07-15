<br><br>
<div class="row">
    <div class="col-lg-12 card">
        {{--START BY AHMED --}}
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
            @php
                $num= 0;
            @endphp
            @foreach($cost_breakdown_other_trim as $other_trim)
                @php
                    $num++;
                @endphp
              <tr id="col{{$num}}">
                  <td>
                      <div class="form-group {{ $errors->has('provider'.$num) ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('provider'.$num,$repository->suppliers(),$other_trim ? $other_trim->provider :null,['id'=>'provider'.$num,'class'=>'form-control','placeholder'=>'Select Supplier']) }}
                          @if($errors->has('provider'.$num))
                              <span class="help-block">
                                <strong>{{ $errors->first('provider'.$num) }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>

                  <td>
                      <div class="form-group {{ $errors->has('other_trim_id'.$num) ? 'has-error' : '' }}">
                          {{--{{ Form::label('','Unit : ') }}--}}
                          {{ Form::select('other_trim_id'.$num,$repository->otherTrims(),$other_trim ? $other_trim->other_trim_id :null,['id'=>'other_trim_id'.$num,'class'=>'form-control','placeholder'=>'Select Fabric']) }}
                          @if($errors->has('other_trim_id'.$num))
                              <span class="help-block">
                                <strong>{{ $errors->first('other_trim_id'.$num) }}</strong>
                            </span>
                          @endif
                      </div>
                  </td>
                  
                    <td>
                        <div class="form-group {{ $errors->has('other_trim_description'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('other_trim_description'.$num,$other_trim ? $other_trim->other_trim_description :null,['id'=>'other_trim_description'.$num,'class'=>'form-control','placeholder'=>'Description']) }}
                            @if($errors->has('other_trim_description'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('other_trim_description'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('qty'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('qty'.$num,$other_trim ? $other_trim->qty :null,['id'=>'qty'.$num,'class'=>'form-control ','placeholder'=>'Required quantity']) }}
                            @if($errors->has('qty'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('qty'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('price'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('price'.$num,$other_trim ? $other_trim->price :null,['id'=>'price'.$num,'class'=>'form-control','placeholder'=>'Unit Price/mtr  ']) }}
                            @if($errors->has('price'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('price'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group {{ $errors->has('cost'.$num) ? 'has-error' : '' }}">
                            {{--{{ Form::label('','Unit : ') }}--}}
                            {{ Form::text('cost'.$num,$other_trim ? $other_trim->cost :null,['id'=>'cost'.$num,'class'=>'form-control last_salary','placeholder'=>'Appointed Trims Cost US$ With DZN ']) }}
                            @if($errors->has('cost'.$num))
                                <span class="help-block">
                                <strong>{{ $errors->first('cost'.$num) }}</strong>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                        {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow2()']) }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>{{-- row end --}}