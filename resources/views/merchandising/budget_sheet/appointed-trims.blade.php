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
                <th>Total Cost </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="door1">
            {{--start 1 row --}}
            {{--@if($cost_breakdown_trim->count() >1)--}}
                @foreach($cost_breakdown_trim as $trim)
                      <tr id="row{{$trim_num}}">
                          <td>
                              <div class="form-group {{ $errors->has('distributor'.$trim_num) ? 'has-error' : '' }}">
                                  {{--{{ Form::label('','Unit : ') }}--}}
                                  {{ Form::select('distributor'.$trim_num,$repository->suppliers(),$trim->distributor,['id'=>'distributor'.$trim_num,'class'=>'form-control','placeholder'=>'Select Supplier']) }}
                                  @if($errors->has('distributor'.$trim_num))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('distributor'.$trim_num) }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </td>
                            <td>
                                <div class="form-group {{ $errors->has('trim_id'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::select('trim_id'.$trim_num,$repository->trims(),$trim->trim_id,['id'=>'trim_id'.$trim_num,'class'=>'form-control','placeholder'=>'Select Trims']) }}

                                    @if($errors->has('trim_id'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('trim_id'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('reference'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('reference'.$trim_num,$trim->reference,['id'=>'reference'.$trim_num,'class'=>'form-control address','placeholder'=>'']) }}
                                    @if($errors->has('reference'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reference'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                          <td>
                              <div class="form-group {{ $errors->has('color'.$trim_num) ? 'has-error' : '' }}">
                                  {{--{{ Form::label('','Unit : ') }}--}}
                                  {{ Form::text('color'.$trim_num,$trim->color,['id'=>'color'.$trim_num,'class'=>'form-control telNo','placeholder'=>'Color']) }}
                                  @if($errors->has('color'.$trim_num))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('color'.$trim_num) }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </td>


                            <td>
                                <div class="form-group {{ $errors->has('trims_description'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('trims_description'.$trim_num,$trim->trims_description,['id'=>'trims_description'.$trim_num,'class'=>'form-control telNo','placeholder'=>'Ex. 52895']) }}
                                    @if($errors->has('trims_description'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('trims_description'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>


                            <td>
                                <div class="form-group {{ $errors->has('required_qty'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('required_qty'.$trim_num,$trim->required_qty,['id'=>'required_qty'.$trim_num,'class'=>'form-control ','placeholder'=>'Req. Qty']) }}
                                    @if($errors->has('required_qty'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('required_qty'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('trims_price'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('trims_price'.$trim_num,$trim->trims_price,['id'=>'trims_price'.$trim_num,'class'=>'form-control','placeholder'=>'Ex. Leave Reason']) }}
                                    @if($errors->has('trims_price'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('trims_price'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-group {{ $errors->has('trims_cost'.$trim_num) ? 'has-error' : '' }}">
                                    {{--{{ Form::label('','Unit : ') }}--}}
                                    {{ Form::text('trims_cost'.$trim_num,$trim->trims_cost,['id'=>'trims_cost'.$trim_num,'class'=>'form-control','placeholder'=>'Trim Cost']) }}
                                    @if($errors->has('trims_cost'.$trim_num))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('trims_cost'.$trim_num) }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td> {{ Form::button('',['class'=>'far fa-trash-alt btn btn-danger',"id"=>'remove']) }} ||
                                {{ Form::button("",['class'=>'btn btn-primary far fa-plus-square','onclick'=>'addRow1()']) }} </td>
                        </tr>
                      @php ++$trim_num; @endphp
                @endforeach
            {{--@endif--}}
            </tbody>
        </table>
    </div>


</div>{{-- row end --}}