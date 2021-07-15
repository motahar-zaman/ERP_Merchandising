<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="color_name_edit">Color Name</label>
            <input type="text" name="color_name_edit" value="{{ explode('&', $data)[0] }}" class="form-control" id="color_name_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="fob_price_pcs_edit">APPROVED FOB PRICE(PCS)</label>
            <input type="text" name="fob_price_pcs_edit" value="{{ explode('&', $data)[1] }}" class="form-control" id="fob_price_pcs_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cm_price_pcs_edit">APPROVED CM PRICE(PCS)</label>
            <input type="text" name="cm_price_pcs_edit" value="{{ explode('&', $data)[2] }}" class="form-control" id="cm_price_pcs_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="quantity_pcs_edit">Quantity(PCS)</label>
            <input type="text" name="quantity_pcs_edit" value="{{ explode('&', $data)[3] }}" class="form-control" id="quantity_pcs_edit">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="ship_date_edit">Ship Date</label>
            <input type="date" name="ship_date_edit" value="{{ explode('&', $data)[4] }}" class="form-control" id="ship_date_edit">
          </div>
    </div>
   
</div>