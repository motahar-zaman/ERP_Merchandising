<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="color_name_edit">color name</label>
            <input type="text" name="color_name_edit" value="{{ explode('&', $data)[0] }}" class="form-control" id="color_name_edit" placeholder="">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="shell_booking_date_edit">Shell Booking Date</label>
            <input type="date" name="shell_booking_date_edit" value="{{ explode('&', $data)[1] }}" class="form-control" id="shell_booking_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="shell_plan_inhouse_date_edit">Shell Plan Inhouse Date</label>
            <input type="date" name="shell_plan_inhouse_date_edit" value="{{ explode('&', $data)[2] }}" class="form-control" id="shell_plan_inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="shell_actual_inhouse_date_edit">Shell Actual Date</label>
            <input type="date" name="shell_actual_inhouse_date_edit" value="{{ explode('&', $data)[3] }}" class="form-control" id="shell_actual_inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="shell_origin_country_edit">Shell Origin</label>
            <select class="form-control" id="shell_origin_country_edit" name="shell_origin_country_edit">
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
            <label for="shell_app_supplier_name_edit">Shell Supplier Name</label>
            <input type="text" name="shell_app_supplier_name_edit" value="{{ explode('&', $data)[5] }}" class="form-control" id="shell_app_supplier_name_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="trims_booking_date_edit">trims Booking Date</label>
            <input type="date" name="trims_booking_date_edit" value="{{ explode('&', $data)[6] }}" class="form-control" id="trims_booking_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="trims_plan_inhouse_date_edit">trims Plan Inhouse Date</label>
            <input type="date" name="trims_plan_inhouse_date_edit" value="{{ explode('&', $data)[7] }}" class="form-control" id="trims_plan_inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="trims_actual_inhouse_date_edit">trims Actual Date</label>
            <input type="date" name="trims_actual_inhouse_date_edit" value="{{ explode('&', $data)[8] }}" class="form-control" id="trims_actual_inhouse_date_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="trims_origin_country_edit">trims Origin</label>
            <select class="form-control" id="trims_origin_country_edit" name="trims_origin_country_edit">
               <option value="No Country">Select Country</option>
               @if(isset($countries[0]->id))
               @foreach($countries as $country)
               <option value="{{ $country->name }}" @if($country->name == explode('&', $data)[9]) selected @endif>{{  $country->name }}</option>
               @endforeach
               @endif
           </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="trims_app_supplier_name_edit">trims Supplier Name</label>
            <input type="text" name="trims_app_supplier_name_edit" value="{{ explode('&', $data)[10] }}" class="form-control" id="trims_app_supplier_name_edit">
          </div>
    </div>
</div>