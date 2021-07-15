<form id="all_acc_tna_form" method="POST" action="{{ url('actionPlan/reports/all-acc-tna') }}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="order_no" value="{{ $all_acc_tna->id }}">
    <div class="col-md-3">
        <div class="form-group">
            <label for="item_name">Item name</label>
              <select class="form-control" name="item_name" id="item_name">
                <option value="Select Item">Select Item</option>
                @php
                    $items = itemNames();    
                @endphp
                @foreach($items as $item)
                    <option value="{{ $item }}" @if($item == $all_acc_tna->item_name) selected @endif>{{ $item }}</option>
                @endforeach
            </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="date" name="booking_date" value="{{ $all_acc_tna->booking_date }}" class="form-control" id="booking_date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="inhouse_date">Inhouse Date</label>
            <input type="date" name="inhouse_date" value="{{ $all_acc_tna->inhouse_date }}" class="form-control" id="inhouse_date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="actual_inhouse_date">Actual Date</label>
            <input type="date" name="actual_inhouse_date" value="{{ $all_acc_tna->actual_inhouse_date }}" class="form-control" id="actual_inhouse_date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="org_country">Origin Country</label>
            <select class="form-control" id="org_country" name="org_country">
               <option value="No Country">Select Country</option>
               @if(isset($countries[0]->id))
               @foreach($countries as $country)
               <option value="{{ $country->name }}" @if($country->name == $all_acc_tna->org_country) selected @endif>{{  $country->name }}</option>
               @endforeach
               @endif
           </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="supplier_name">Supplier Name</label>
            <input type="text" name="supplier_name" value="{{ $all_acc_tna->supplier_name }}" class="form-control" id="supplier_name">
          </div>
    </div>
</div>