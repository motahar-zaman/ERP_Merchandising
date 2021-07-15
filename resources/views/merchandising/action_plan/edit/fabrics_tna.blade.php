<form id="fabrics_tna_form" method="POST" action="{{ url('actionPlan/reports/fabrics-tna') }}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="order_no" value="{{ $fabrics_tna->id }}">
      <div class="col-md-3">
          <div class="form-group">
              <label for="color_name">color name</label>
              <input type="text" name="color_name" value="{{ $fabrics_tna->color_name }}" class="form-control" id="color_name" placeholder="">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="shell_booking_date">Shell Booking Date</label>
              <input type="date" name="shell_booking_date" value="{{ $fabrics_tna->shell_booking_date }}" class="form-control" id="shell_booking_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="shell_plan_inhouse_date">Shell Plan Inhouse Date</label>
              <input type="date" name="shell_plan_inhouse_date" value="{{ $fabrics_tna->shell_plan_inhouse_date }}" class="form-control" id="shell_plan_inhouse_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="shell_actual_inhouse_date">Shell Actual Date</label>
              <input type="date" name="shell_actual_inhouse_date" value="{{ $fabrics_tna->shell_actual_inhouse_date }}" class="form-control" id="shell_actual_inhouse_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="shell_origin_country">Shell Origin</label>
              <select class="form-control" id="shell_origin_country" name="shell_origin_country">
                 <option value="No Country">Select Country</option>
                 @if(isset($countries[0]->id))
                 @foreach($countries as $country)
                 <option value="{{ $country->name }}" @if($country->name == $fabrics_tna->shell_origin_country ) selected @endif>{{  $country->name }}</option>
                 @endforeach
                 @endif
             </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="shell_app_supplier_name">Shell Supplier Name</label>
              <input type="text" name="shell_app_supplier_name" value="{{ $fabrics_tna->shell_app_supplier_name }}" class="form-control" id="shell_app_supplier_name">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="trims_booking_date">trims Booking Date</label>
              <input type="date" name="trims_booking_date" value="{{ $fabrics_tna->trims_booking_date }}" class="form-control" id="trims_booking_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="trims_plan_inhouse_date">trims Plan Inhouse Date</label>
              <input type="date" name="trims_plan_inhouse_date" value="{{ $fabrics_tna->trims_plan_inhouse_date }}" class="form-control" id="trims_plan_inhouse_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="trims_actual_inhouse_date">trims Actual Date</label>
              <input type="date" name="trims_actual_inhouse_date" value="{{ $fabrics_tna->trims_actual_inhouse_date }}" class="form-control" id="trims_actual_inhouse_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="trims_origin_country">trims Origin</label>
              <select class="form-control" id="trims_origin_country" name="trims_origin_country">
                 <option value="No Country">Select Country</option>
                 @if(isset($countries[0]->id))
                 @foreach($countries as $country)
                 <option value="{{ $country->name }}" @if($country->name == $fabrics_tna->trims_origin_country) selected @endif>{{  $country->name }}</option>
                 @endforeach
                 @endif
             </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="trims_app_supplier_name">trims Supplier Name</label>
              <input type="text" name="trims_app_supplier_name" value="{{ $fabrics_tna->trims_app_supplier_name }}" class="form-control" id="trims_app_supplier_name">
            </div>
      </div>
  </div>
</div>