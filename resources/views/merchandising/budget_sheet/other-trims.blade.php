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
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="door2">
            {{--start 1 row --}}
            {{--@if($cost_breakdown_other_trim->count() >1)--}}
                @foreach($cost_breakdown_other_trim as $pack)
                      <tr id="col{{$other_num}}">
                          <td>
                              <div class="form-group {{ $errors->has('provider'.$other_num) ? 'has-error' : '' }}">
                                  {{--{{ Form::label('','Unit : ') }}--}}
                                  {{ Form::select('provider'.$other_num,$repository->suppliers(),$pack->provider,['id'=>'provider'.$other_num,'class'=>'form-control','placeholder'=>'Select Supplier']) }}
                                  @if($errors->has('provider'.$other_num))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('provider'.$other_num) }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </td>

                          <td>
                              <div class="form-group {{ $errors->has('other_trim_id'.$other_num) ? 'has-error' : '' }}">
                                  {{--{{ Form::label('','Unit : ') }}--}}
                                  {{ Form::select('other_trim_id'.$other_num,$repository->otherTrims(),$pack->other_trim_id,['id'=>'other_trim_id'.$other_num,'class'=>'form-control','placeholder'=>'Select Fabric']) }}
                                  @if($errors->has('other_trim_id'.$other_num))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('other_trim_id'.$other_num) }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </td>

                            <td>
                                <div class="form-group {{ $errors->has('other_trim_description'.$other_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('other_trim_description'.$other_num,$pack->other_trim_description,['id'=>'other_trim_description'.$other_num,'class'=>'form-control','placeholder'=>'Description']) }}
                                    @if($errors->has('other_trim_description'.$other_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other_trim_description'.$other_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>


                            <td>
                                <div class="form-group {{ $errors->has('qty'.$other_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('qty'.$other_num,$pack->qty,['id'=>'qty'.$other_num,'class'=>'form-control ','placeholder'=>'Required quantity']) }}
                                    @if($errors->has('qty'.$other_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qty'.$other_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('price'.$other_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('price'.$other_num,$pack->price,['id'=>'price'.$other_num,'class'=>'form-control','placeholder'=>'Unit Price/mtr  ']) }}
                                    @if($errors->has('price'.$other_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price'.$other_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('cost'.$other_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('cost'.$other_num,$pack->cost,['id'=>'cost'.$other_num,'class'=>'form-control last_salary','placeholder'=>'Appointed Trims Cost US$ With DZN ']) }}
                                    @if($errors->has('cost'.$other_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cost'.$other_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','id'=>'add_more','onclick'=>'addRow2()']) }} </td>
                        </tr>
                      @php ++$other_num; @endphp
                    @endforeach
                {{--@endif--}}

            </tbody>
        </table>
    </div>


</div>{{-- row end --}}