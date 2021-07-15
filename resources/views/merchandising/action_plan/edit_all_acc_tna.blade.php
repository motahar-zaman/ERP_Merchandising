<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="item_name_edit">Item name</label>
              <select class="form-control" name="item_name_edit" id="item_name_edit">
                <option value="Select Item">Select Item</option>
                @php
                    $items = itemNames();    
                @endphp
                @foreach($items as $item)
                    <option value="{{ $item }}" @if($item == explode('&', $data)[0]) selected @endif>{{ $item }}</option>
                @endforeach
            </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="booking_date_edit">Booking Date</label>
            <input type="date" name="booking_date_edit" value="{{ explode('&', $data)[1] }}" class="form-control" id="booking_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="inhouse_date_edit">Inhouse Date</label>
            <input type="date" name="inhouse_date_edit" value="{{ explode('&', $data)[2] }}" class="form-control" id="inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="actual_inhouse_date_edit">Actual Date</label>
            <input type="date" name="actual_inhouse_date_edit" value="{{ explode('&', $data)[3] }}" class="form-control" id="actual_inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="org_country_edit">Origin Country</label>
            <select class="form-control" id="org_country_edit" name="org_country_edit">
               <option value="No Country">Select Country</option>
               @if(isset($countries[0]->id))
               @foreach($countries as $country)
               <option value="{{ $country->name }}" @if($country->name == explode('&', $data)[4]) selected @endif>{{  $country->name }}</option>
               @endforeach
               @endif
           </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="supplier_name_edit">Supplier Name</label>
            <input type="text" name="supplier_name_edit" value="{{ explode('&', $data)[5] }}" class="form-control" id="supplier_name_edit">
          </div>
    </div>
</div>