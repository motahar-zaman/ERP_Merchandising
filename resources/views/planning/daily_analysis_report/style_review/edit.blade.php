<div class="row">
    @php 
        $bookingPlan = bookingPlan();
        $i = 0;
    @endphp
    @foreach($bookingPlan as $bookingKey => $tna)
        
        @if($i == 1)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ $bookingKey }}_edit">{{ $tna }}</label>
                    <select class="form-control" id="{{ $bookingKey }}_edit">
                        <option value="">Select Buyer</option>
                        @if($buyers[0]->id)
                            @foreach($buyers as $value)
                                <option value="{{ $value->id }}" @if($value->id == explode('&', $data)[$i]) selected @endif>{{ $value->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
            </div> 
        @elseif($i == 2)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ $bookingKey }}_edit">{{ $tna }}</label>
                    <select class="form-control" id="{{ $bookingKey }}_edit">
                        <option value="">Select Style</option>
                        @if($styles[0]->id)
                            @foreach($styles as $value)
                                <option value="{{ $value->id }}" @if($value->id == explode('&', $data)[$i]) selected @endif>{{ $value->style }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
            </div> 
        @elseif($i == 10)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ $bookingKey }}_edit">{{ $tna }}</label>
                    <input type="date" name="{{ $bookingKey }}_edit" value="{{ explode('&', $data)[$i] }}" class="form-control" id="{{ $bookingKey }}_edit">
                  </div>
            </div> 
        @else
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ $bookingKey }}_edit">{{ $tna }}</label>
                    <input type="text" name="{{ $bookingKey }}_edit" value="{{ explode('&', $data)[$i] }}" class="form-control" id="{{ $bookingKey }}_edit">
                  </div>
            </div>
        @endif
        @php 
            $i++;
        @endphp
    @endforeach
    
    
</div>