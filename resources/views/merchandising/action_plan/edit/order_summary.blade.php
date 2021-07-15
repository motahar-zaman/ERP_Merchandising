<form id="order_summary_form" method="POST" action="{{ url('actionPlan/reports/order-summary') }}">
  {{csrf_field()}}
  <div class="row">
    <input type="hidden" name="order_no" value="{{ $order_summary->id }}">
      <div class="col-md-3">
          <div class="form-group">
              <label for="input_date">Input Date</label>
              <input type="date" name="input_date" value="{{ $order_summary->input_date }}" class="form-control" id="input_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="merchant_team">Merchant Team</label>
              <input type="text" name="merchant_team" value="{{ $order_summary->merchant_team }}" class="form-control" id="merchant_team">
            </div>
      </div>
      
      <div class="col-md-3">
          <div class="form-group">
              <label for="unit_id">Unit</label>
              <select class="form-control" name="unit_id" id="unit_id">
                <option value="0">Select Unit</option>
                  @if(isset($units[0]->id))
                    @foreach($units as $unit)
                      <option value="{{ $unit->id }}" @if($unit->id == $order_summary->unit_id) selected @endif>{{ $unit->name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="buyer_id">Buyer Name</label>
              <select class="form-control" name="buyer_id" id="buyer_id">
                <option value="0">Select Buyer</option>
                  @if(isset($buyers[0]->id))
                    @foreach($buyers as $buyer)
                      <option value="{{ $buyer->id }}" @if($buyer->id == $order_summary->buyer_id) selected @endif>{{ $buyer->name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="payment_term">Payment Terms</label>
              <select class="form-control" name="payment_term" id="payment_term">
                <option value="0">Select Payment Term</option>
                  @if(isset($payment_terms[0]->id))
                    @foreach($payment_terms as $payment_term)
                      <option value="{{ $payment_term->id }}" @if($payment_term->id == $order_summary->payment_term) selected @endif>{{ $payment_term->name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="item">Item Name</label>
              <input type="text" name="item" value="{{ $order_summary->item }}" class="form-control" id="item">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="style_id">Style</label>
              <select class="form-control" name="style_id" id="style_id">
                <option value="0">Select Style</option>
                  @if(isset($styles[0]->id))
                    @foreach($styles as $style)
                      <option value="{{ $style->id }}" @if($style->id == $order_summary->style_id) selected @endif>{{ $style->style }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="spec_group">Spec Group</label>
              <input type="text" name="spec_group" value="{{ $order_summary->spec_group }}" class="form-control" id="spec_group">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="size_range">Size Range</label>
              <input type="text" name="size_range" value="{{ $order_summary->size_range }}" class="form-control" id="size_range">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="confirmation_date">Confirmation Date</label>
              <input type="date" name="confirmation_date" value="{{ $order_summary->confirmation_date }}" class="form-control" id="confirmation_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="po_issue_date">PO Issue Date</label>
              <input type="date" name="po_issue_date" value="{{ $order_summary->po_issue_date }}" class="form-control" id="po_issue_date">
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label for="lc_contract_rcv_date">LC Contract Receive Date</label>
              <input type="date" name="lc_contract_rcv_date" value="{{ $order_summary->lc_contract_rcv_date }}" class="form-control" id="lc_contract_rcv_date">
            </div>
      </div>

  </div>
</form>