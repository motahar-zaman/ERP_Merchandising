<form id="order_summary_details_form" method="POST" action="{{ url('actionPlan/reports/order-summary-details') }}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="order_no" value="{{ $order_summary_details->id }}">
        <div class="col-md-3">
            <div class="form-group">
                <label for="color_name">Color Name</label>
                <input type="text" name="color_name" value="{{ $order_summary_details->color_name }}" class="form-control" id="color_name">
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fob_price_pcs">APPROVED FOB PRICE(PCS)</label>
                <input type="text" name="fob_price_pcs" value="{{ $order_summary_details->fob_price_pcs }}" class="form-control" id="fob_price_pcs">
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cm_price_pcs">APPROVED CM PRICE(PCS)</label>
                <input type="text" name="cm_price_pcs" value="{{ $order_summary_details->cm_price_pcs }}" class="form-control" id="cm_price_pcs">
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="quantity_pcs">Quantity(PCS)</label>
                <input type="text" name="quantity_pcs" value="{{ $order_summary_details->quantity_pcs }}" class="form-control" id="quantity_pcs">
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="ship_date">Ship Date</label>
                <input type="date" name="ship_date" value="{{ $order_summary_details->ship_date }}" class="form-control" id="ship_date">
              </div>
        </div>
       
    </div>
</form>