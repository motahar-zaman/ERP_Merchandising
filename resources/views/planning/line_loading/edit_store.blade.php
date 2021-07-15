<form id="booking_plan_form" method="POST" action="{{ url('bookingPlan/update') }}">
    {{csrf_field()}}
    <div class="row">
            <input type="hidden" name="order_no" value="{{ $booking_plan->id }}">
        @php 
            $bookingPlan = bookingPlan();
            $i = 0;
        @endphp
        @foreach($bookingPlan as $bookingKey => $tna)
         @php 
            if($i == 0){
                $plan_value = $booking_plan->lc_factory;
            }elseif($i == 1){
                $plan_value = $booking_plan->buyer_id;
            }else if($i == 2){
                $plan_value = $booking_plan->style_id;
            }else if($i == 3){
                $plan_value = $booking_plan->item;
            }else if($i == 4){
                $plan_value = $booking_plan->merchandiser;
            }else if($i == 5){
                $plan_value = $booking_plan->merchandiser_head;
            }else if($i == 6){
                $plan_value = $booking_plan->sketch_or_sample;
            }else if($i == 7){
                $plan_value = $booking_plan->smv;
            }else if($i == 8){
                $plan_value = $booking_plan->quantity;
            }else if($i == 9){
                $plan_value = $booking_plan->order_season;
            }else if($i == 10){
                $plan_value = $booking_plan->input_date;
            }else if($i == 11){
                $plan_value = $booking_plan->wash;
            }else if($i == 12){
                $plan_value = $booking_plan->wash;
            }else if($i == 13){
                $plan_value = $booking_plan->emblishment;
            }else if($i == 14){
                $plan_value = $booking_plan->remarks;
            }
        @endphp
            @if($i == 1)
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ $bookingKey }}">{{ $tna }}</label>
                        <select class="form-control" name="{{ $bookingKey }}" id="{{ $bookingKey }}">
                            <option value="">Select Buyer</option>
                            @if($buyers[0]->id)
                                @foreach($buyers as $value)
                                    <option value="{{ $value->id }}" @if($value->id == $plan_value) selected @endif>{{ $value->name }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                </div> 
            @elseif($i == 2)
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ $bookingKey }}">{{ $tna }}</label>
                        <select class="form-control" name="{{ $bookingKey }}" id="{{ $bookingKey }}">
                            <option value="">Select Style</option>
                            @if($styles[0]->id)
                                @foreach($styles as $value)
                                    <option value="{{ $value->id }}" @if($value->id == $plan_value) selected @endif>{{ $value->style }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                </div> 
            @elseif($i == 10)
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ $bookingKey }}">{{ $tna }}</label>
                        <input type="date" name="{{ $bookingKey }}" value="{{ $plan_value }}" class="form-control" id="{{ $bookingKey }}">
                      </div>
                </div> 
            @else
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ $bookingKey }}">{{ $tna }}</label>
                        <input type="text" name="{{ $bookingKey }}" value="{{ $plan_value }}" class="form-control" id="{{ $bookingKey }}">
                      </div>
                </div>
            @endif
            @php 
                $i++;
            @endphp
        @endforeach
    </div>
</form>